@extends('layoults.main')
@section('title', 'Editando: ' . $event->title)

@section('content')
    <div class="col-md-6 offset-md-3" id="event-creat-container">
        <h1>Editando: {{ $event->title }}</h1>
        <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image">Imagem do evento:</label>
                <input type="file" id="image" name="image" class="from-control-file">
                <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
            </div> 
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento:" value="{{ $event->title }}" required>
            </div> 
            <div class="date">
                <label for="title">Data do evento:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $event->date->format('Y-m-d') }}" required>
            </div> 
            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do cidade:" value="{{ $event->city }}" required>
            </div>
            <div class="form-group">
                <label for="private">O evento é privado?</label>
                <select class="form-control" name="private" id="private" required>
                    <option value="0">Não</option>
                    <option value="1" {{ $event->private == 1 ? "selected='selected'" : ""}}>Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Adicione itens de infraestrutura</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras 
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco"> Palco 
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis 
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open food"> Open food 
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Brindes"> Brindes 
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Sorteios"> Sorteios 
                </div>
            </div>
            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea class="form-control" id="description" name="description" placeholder="Descrição do evento:" cols="30" rows="10" required>{{ $event->description }}</textarea>
            </div>
            <input type="submit" class="botao-form" value="Atualizar o Evento">
        </form>
    </div>
@endsection