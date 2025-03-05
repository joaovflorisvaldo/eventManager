@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="container mt-4">
        <div class="dashboard-section">
            <h2 class="text-center">Meus Eventos</h2>
            @if(count($events) > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Participantes</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><a href="/events/{{ $event->id }}" class="fw-bold">{{ $event->title }}</a></td>
                                    <td>{{ count($event->users) }}</td>
                                    <td class="d-flex gap-2 justify-content-center">
                                        <a href="/events/edit/{{ $event->id }}" class="btn btn-info text-white">
                                            <ion-icon name="create-outline"></ion-icon> Editar
                                        </a>
                                        <form action="/events/{{ $event->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja cancelar o evento?')">
                                                <ion-icon name="trash-outline"></ion-icon> Deletar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center mt-3">Você ainda não criou eventos. <a href="/events/create">Criar evento</a></p>
            @endif
        </div>

        <div class="dashboard-section mt-5">
            <h2 class="text-center">Eventos Confirmados</h2>
            @if(count($eventsAsParticipant) > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Participantes</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($eventsAsParticipant as $event)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><a href="/events/{{ $event->id }}" class="fw-bold">{{ $event->title }}</a></td>
                                    <td>{{ count($event->users) }}</td>
                                    <td>
                                        <form action="/events/leave/{{ $event->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja sair do evento?')">
                                                <ion-icon name="trash-outline"></ion-icon> Sair
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else  
                <p class="text-center mt-3">Você não está participando de nenhum evento. <a href="/">Ver todos os eventos</a></p>
            @endif
        </div>
    </div>
@endsection
