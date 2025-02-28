@extends('layouts.main')

@section('title', 'Budmol Eventos')
    
@section('content')
    <header class="position-relative text-white text-center">
        <img src="/img/festival.jpg?v=1" class="img-fluid w-100" alt="Banner" style="height: 300px; object-fit: cover;">
        <div class="position-absolute top-50 start-50 translate-middle w-75">
            <form action="/" method="GET" class="d-flex">
                <input class="form-control me-2" type="text" name="search" placeholder="Pesquisar..." aria-label="Search">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </form>
        </div>
    </header>

    <section class="container my-4">
        <div class="row g-4">
            @if ($search)
                <h2>Resultados para "{{ $search }}"</h2>
            @endif
            @foreach ($events as $event)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card p-3 shadow-sm">
                        <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
                        <h5>{{ $event->title }}</h5>
                        <p>{{ $event->description }}</p>
                        <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
            @if (count($events) == 0 && $search)
                <p>Não foi possível encontrar nenhum evento com "{{ $search }}". <a href="/">Ver todos</a></p>
            @elseif (count($events) == 0)
                <p>Não há eventos disponíveis.</p>
            @endif
        </div>
    </section>
@endsection
