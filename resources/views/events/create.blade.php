@extends('layoults.main')
@section('title', 'Create Event')

@section('content')
    <div class="col-md-6 offset-md-3" id="event-creat-container">
        <h1>Crie o seu evento</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Imagem do evento:</label>
                <input type="file" id="image" name="image" class="from-control-file">
            </div> 
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento:" required>
            </div> 
            <div class="date">
                <label for="title">Data do evento:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div> 
            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do cidade:" required>
            </div>
            <div class="form-group">
                <label for="private">O evento é privado?</label>
                <select class="form-control" name="private" id="private" required>
                    <option value="" hidden></option>
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
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
                <textarea class="form-control" id="description" name="description" placeholder="Descrição do evento:" cols="30" rows="10" required></textarea>
            </div>
            <input type="submit" class="botao-form" value="Criar Evento">
        </form>
    </div>
@endsection