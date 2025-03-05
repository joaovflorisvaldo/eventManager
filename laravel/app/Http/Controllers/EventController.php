<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index()
    {
        $search = request('search');
        if($search) {
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $events = Event::all();
        }
        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $event = new Event;
        $event->title = $request->title;
        $event->date = $request->date;
        $event->location = $request->location;
        $event->max_capacity = $request->max_capacity;
        $event->description = $request->description;
        $event->status = 'aberto para inscrições';

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $event->image = $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();
        $event['ownerName'] = $eventOwner['name'];

        if($event->user_id == auth()->user()->id) {
            $event['isOwner'] = true;
        } else {
            $event['isOwner'] = false;
        }

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }

    public function dashboard()
    {
        $user = auth()->user();
        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard', ['events' => $events, 'eventsAsParticipant' => $eventsAsParticipant]);
    }   

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
    
        $event->title = $request->input('title');
        $event->date = $request->input('date');
        $event->location = $request->input('location');
        $event->max_capacity = $request->input('max_capacity');
        $event->description = $request->input('description');
    
        if(request ()->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $event['image'] = $imageName;
        }
    
        $event->save();
    
        return redirect('/dashboard')->with('msg', 'Evento atualizado com sucesso!');
    }

    public function joinEvent($id)
    {
        $event = Event::findOrFail($id);
        $user = auth()->user();
        $event->users()->attach($user->id);
        return redirect('/dashboard')->with('msg', 'Presença confirmada no evento ' . $event->title);
    }

    public function leaveEvent($id)
    {
        $event = Event::findOrFail($id);
        $user = auth()->user();
        $event->users()->detach($user->id);
        return redirect('/dashboard')->with('msg', 'Presença cancelada no evento ' . $event->title);
    }
}
