@extends('layouts.main')

@section('title', 'Budmol Eventos')
    
@section('content')
    <header class="position-relative text-white text-center">
        <img src="/img/festival.jpg?v=1" class="img-fluid w-100" alt="Banner" style="height: 300px; object-fit: cover;">
        <div class="position-absolute top-50 start-50 translate-middle w-75">
            <form action="" method="GET" class="d-flex">
                <input class="form-control me-2" type="search" name="query" placeholder="Pesquisar..." aria-label="Search">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </form>
        </div>
    </header>

    <section class="container my-4">
        <div class="row g-4">
            {{-- @foreach ($blocos as $bloco)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card p-3 shadow-sm">
                        <h5>{{ $bloco->titulo }}</h5>
                        <p>{{ $bloco->descricao }}</p>
                    </div>
                </div>
            @endforeach --}}
        </div>
    </section>
@endsection
