@extends('layouts.main')

@section('title', 'Budmol Eventos')

@section('content')
<header class="banner">
    <img src="/img/festival.jpg?v=1" class="banner-img" alt="Banner">
    <div class="banner-overlay">
        <form action="/" method="GET" class="search-form">
            <input class="form-control" type="text" name="search" placeholder="Pesquisar eventos..." aria-label="Search">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </form>
    </div>
</header>

<section class="container my-4">
    @if ($search)
        <h2 class="text-center mb-4">Resultados para "{{ $search }}"</h2>
    @endif

    <div class="row g-4">
        @foreach ($events as $event)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="event-card">
                    <img src="/img/events/{{ $event->image }}" class="event-img" alt="{{ $event->title }}">
                    <div class="event-body">
                        <h5 class="event-title">{{ $event->title }}</h5>
                        <p class="event-date"><i class="bi bi-calendar-event"></i> {{ date('d/m/Y', strtotime($event->date)) }}</p>
                        <p class="event-location"><i class="bi bi-geo-alt"></i> {{ $event->location }}</p>
                        <p class="event-participants"><i class="bi bi-people"></i> {{ count($event->users) }} participantes</p>
                        <a href="/events/{{ $event->id }}" class="btn btn-primary w-100">Saber mais</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if (count($events) == 0 && $search)
        <p class="text-center mt-4">Não foi possível encontrar nenhum evento com "{{ $search }}". <a href="/">Ver todos</a></p>
    @elseif (count($events) == 0)
        <p class="text-center mt-4">Não há eventos disponíveis.</p>
    @endif
</section>
@endsection
