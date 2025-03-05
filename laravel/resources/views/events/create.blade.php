@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')
    <div class="container mt-5">
        <div class="card p-4 shadow-lg">
            <h2 class="text-center">Crie o seu evento</h2>
            <form action="/events" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                
                <div class="mb-3">
                    <label for="image" class="form-label">Imagem do evento:</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                    <img id="image-preview" class="mt-2 d-none img-thumbnail" style="max-width: 100%; height: auto;">
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Nome do Evento:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Digite o nome do evento" required>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Data:</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Local do evento:</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Digite o local do evento" required>
                </div>

                <div class="mb-3">
                    <label for="max_capacity" class="form-label">Capacidade máxima:</label>
                    <input type="number" class="form-control" id="max_capacity" name="max_capacity" placeholder="Número máximo de participantes" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrição:</label>
                    <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Criar Evento</button>
            </form>  
        </div>
    </div>

    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('image-preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
