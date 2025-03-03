@extends('layouts.main')

@section('title', 'Editando Evento')
    
@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Edite Seu Evento</h1>
        <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $event->id }}">
            <div class="form-group">
                <label for="image">Imagem do evento:</label>
                <input type="file" id="image" name="image" class="form-control-file">
                <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{ $event->title }}">
            </div>
            <div class="form-group">
                <label for="date">Data:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $event->date->format('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label for="location">Local do evento:</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Local do evento" value="{{ $event->location }}">
            </div>
            <div class="form-group">
                <label for="max_capacity">Capacidade máxima:</label>
                <input type="number" class="form-control" id="max_capacity" name="max_capacity" placeholder="Número máximo de participantes" value="{{ $event->max_capacity }}">
            </div>
            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?">{{ $event->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Salvar Evento</button>
        </form>  
    </div>
@endsection
