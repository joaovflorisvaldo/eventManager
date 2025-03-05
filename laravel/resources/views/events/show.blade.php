@extends('layouts.main')

@section('title', 'Detalhes do Evento')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center fs-5 fw-bold">
                        {{ $event->titulo }}
                    </div>
                    <div class="card-body text-center">
                        <img src="/img/events/{{ $event->image }}" class="img-fluid rounded mb-3" alt="{{ $event->title }}">
                        <p class="card-text"><strong>Responsável:</strong> {{ $eventOwner['name'] }}</p>
                        <p class="card-text"><strong>Data:</strong> {{ date('d/m/Y', strtotime($event->date)) }}</p>
                        <p class="card-text"><strong>Local:</strong> {{ $event->location }}</p>
                        <p class="card-text"><strong>Capacidade:</strong> {{ $event->max_capacity }}</p>
                        <p class="card-text"><strong>Participantes:</strong> {{ count($event->users) }}</p>
                        <p class="card-text"><strong>Descrição:</strong> {{ $event->description }}</p>
                        
                        <div class="d-grid gap-2">
                            @if ($event->user_id == auth()->user()->id)
                                <a href="/events/edit/{{ $event->id }}" class="btn btn-warning">Editar Evento</a>
                            @elseif (in_array(auth()->user()->id, $event->users->pluck('id')->toArray()))
                                <a href="/events/leave/{{ $event->id }}" class="btn btn-danger">Sair do Evento</a>
                            @else
                                <form action="/events/join/{{ $event->id }}" method="POST">
                                    @csrf
                                    <a href="/events/join/{{ $event->id }}" id="event-submit" onclick="event.preventDefault(); this.closest('form').submit();" class="btn btn-primary">Participar</a>
                                </form>
                            @endif
                            
                            <a href="/" class="btn btn-secondary">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
