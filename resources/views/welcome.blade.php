@extends('layoults.main')
@section('title', 'Dashboard - HDC Events')

@section('content')

{{-- Este é um comentário com Blade --}}

<!-- Seção banner -->
<section class="banner-home">
    <div class="container">
        <div class="banner">
            <h1>HDC EVENTS</h1>
        </div>
    </div>
</section>
<!-- Seção loop dos eventos -->
<section class="eventos">
    <div class="container">
        <div class="row">
                    @if($search)
                        <h2>Resultado da busca por: {{ $search }}</h2>
                    @else
                        <h2>Confira os próximos eventos</h2>
                    @endif
                <div class="col-12" id="search-container">
                    <h1>Busque um evento</h1>
                    <form action="/" method="GET">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Procurar evento...">
                    </form>
                </div>
            @foreach($events as $event)
                <div class="col-md-3 col-12 colunaeventos">
                    <div class="card card-evento">
                        <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
                        <div class="card-body">
                            <h1>
                                {{ $event->title }}
                            </h1>
                            <p class="card-date">
                                <ion-icon name="calendar-outline"></ion-icon> 
                                {{ date('d/m/Y', strtotime($event->date)) }}
                            </p>
                            <p class="card-participants"><ion-icon name="people-outline"></ion-icon> {{ count($event->users) }} participantes</p>
                            <small>
                                <ion-icon name="location-outline"></ion-icon> 
                                {{ $event->city }}
                            </small>
                            <br />
                            <div class="card-footer">
                                <a href="/events/{{ $event->id }}" target="_blank" rel="noopener noreferrer">
                                    <button>Saber mais</button>
                                </a>    
                            </div>
                        </div>    
                    </div>
                </div>
            @endforeach
            @if(count($events) == 0 && $search)
                <div class="aviso">
                    <p>
                        Não foi possível encontrar nunhum evento com {{ $search }}! 
                        <a href="/">Veja todos os eventos disponíveis.</a>
                    </p>
                </div>
            @elseif(count($events) == 0)
                <div class="aviso">
                    <p>
                        Não há eventos disponíveis no momento!
                    </p>
                </div>    
            @endif
        </div>
    </div>
</section>
<!-- Fim Seção loop dos eventos -->

@endsection

