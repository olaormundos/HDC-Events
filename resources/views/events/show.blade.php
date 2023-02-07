@extends('layoults.main')
@section('title', $event->title)

@section('content')
    <div class="col-md-10 offset-md-1 event">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $event->title }}</h1>
                <p class="events-date">
                    <ion-icon name="calendar-outline"></ion-icon> 
                    {{ date('d/m/Y', strtotime($event->date)) }}
                </p>
                <p class="event-city">
                    <ion-icon name="location-outline"></ion-icon>
                    {{ $event->city }}
                </p>
                <p class="events-participants">
                    <ion-icon name="people-outline"></ion-icon>
                    {{ count($event->users) }} Participantes
                </p>
                <p class="event-owner">
                    <ion-icon name="star-outline"></ion-icon>
                    {{ $eventOwner['name'] }}
                </p>
                @if(!$hasUserJoined)
                    <form action="/events/join/{{ $event->id }}" method="POST">
                        @csrf
                        <a href="/events/join/{{ $event->id }}" 
                            id="event-submit" 
                            onclick="event.preventDefualt(); 
                            this.closest('form').submit();">
                            <button>Confirmar presença</button>
                        </a>
                    </form>
                @else
                    <p class="already-joined-msg">Você já está participando desse evento</p>
                @endif
                <h3>O Evento conta com:</h3>
                <ul id="items-list">
                    @foreach($event->items as $item)
                    
                        <li><ion-icon name="play-outline"></ion-icon> <span>{{ $item }}</span></li>
                    
                    @endforeach
                </ul>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o evento:</h3>
                <p class="event-description">
                    {{ $event->description }}
                </p>
            </div>
        </div>
    </div>
@endsection