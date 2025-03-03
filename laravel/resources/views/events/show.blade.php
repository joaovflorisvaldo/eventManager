@extends('layouts.main')

@section('title', 'Criar Evento')
    
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">Detalhes do Evento</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->titulo }}</h5>
                        <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
                        <p class="card-text"><strong>Responsável:</strong> {{ $eventOwner['name'] }}</p>
                        <p class="card-text"><strong>Data:</strong> {{ date('d/m/Y', strtotime($event->date)) }}</p>
                        <p class="card-text"><strong>Local:</strong> {{ $event->location }}</p>
                        <p class="card-text"><strong>Capacidade:</strong> {{ $event->max_capacity }}</p>
                        <p class="card-text"><strong>Participantes confirmados:</strong> {{ $event->current_capacity }}</p>
                        <p class="card-text"><strong>Descrição:</strong> {{ $event->description }}</p>
                        <a href="#" class="btn btn-primary">Confirmar Presença</a>
                        <a href="/" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection