@extends('layouts.main')

@section('title', 'Editando Evento')

@section('content')
    <div id="event-edit-container" class="col-lg-6 col-md-8 mx-auto mt-4 p-4 shadow-sm rounded bg-white">
        <h2 class="text-center mb-4">Edite Seu Evento</h2>
        <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $event->id }}">

            <div class="mb-3 text-center">
                <label for="image" class="form-label">Imagem do evento:</label>
                <input type="file" id="image" name="image" class="form-control">
                <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview mt-3 rounded shadow-sm">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{ $event->title }}">
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Data:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $event->date->format('Y-m-d') }}">
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Local do evento:</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Local do evento" value="{{ $event->location }}">
            </div>

            <div class="mb-3">
                <label for="max_capacity" class="form-label">Capacidade máxima:</label>
                <input type="number" class="form-control" id="max_capacity" name="max_capacity" placeholder="Número máximo de participantes" value="{{ $event->max_capacity }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?" rows="4">{{ $event->description }}</textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Salvar Evento</button>
            </div>
        </form>  
    </div>
@endsection
