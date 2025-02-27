@extends('layouts.main')

@section('title', 'Criar Evento')
    
@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie o seu evento</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Imagem do evento:</label>
                <input type="file" id="image" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
            </div>
            <div class="form-group">
                <label for="date">Data:</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="location">Local do evento:</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Local do evento">
            </div>
            <div class="form-group">
                <label for="max_capacity">Capacidade máxima:</label>
                <input type="number" class="form-control" id="max_capacity" name="max_capacity" placeholder="Número máximo de participantes">
            </div>
            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Criar Evento</button>
        </form>  
    </div>
@endsection
