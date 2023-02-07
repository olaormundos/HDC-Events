@extends('layoults.main')
@section('title', 'Dashboard')

@section('content')

    <div class="col-md10 offset-md-1 dashboard-title-container">
        <h1>Meus eventos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count($events) > 0)
            <table class="table table-striped table-dark table-hover">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td scope="row">
                                {{ $loop->index + 1 }}
                                <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                                <td>
                                    {{ count($event->users) }}
                                </td>
                                <td style="display: flex;">
                                    <a href="/events/edit/{{ $event->id }}">
                                        <button class="edit-btn">
                                            <ion-icon name="create-outline"></ion-icon> Editar
                                        </button>
                                    </a> 
                                    <form action="/events/{{ $event->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn">
                                            <ion-icon name="trash-outline"></ion-icon> Deletar
                                        </button>
                                    </form>
                                </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Você ainda não tem eventos, <a href="/events/create" rel="noopener noreferrer">Criar evento</a></p>

        @endif    
    </div>
    <div class="col-md10 offset-md-1 dashboard-title-container">
        <h1>Eventos que estou participando</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count($eventsasparticipant) > 0 )
        <table class="table table-striped table-dark table-hover">
            <thead class="">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventsasparticipant as $event)
                    <tr>
                        <td scope="row">
                            {{ $loop->index + 1 }}
                            <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                            <td>
                                {{ count($event->users) }}
                            </td>
                            <td>
                               <form action="/events/leave/{{ $event->id }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                        <button type="submit" class="botao-sair-evento">
                                            <ion-icon name="trash-outline"></ion-icon>
                                            Sair do evento
                                        </button>
                               </form>
                            </td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>Você não está participando de nenhum evento, <a href="/">Veja todos os eventos</a></p>
        @endif
    </div>
@endsection
