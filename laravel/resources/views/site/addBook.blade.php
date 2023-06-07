@extends('site.layout')
@section('title', 'Add Book')
@section('content')

<div class="container center">
    <h3>Adicionar Livro</h3>
    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
        @csrf
        <label class="left" for="title" >Título:</label>
        <input type="text" name="title" class="input-field" placeholder="Digite o título">

        <label class="left" for="author" >Autor:</label>
        <input type="text" name="author" class="input-field" placeholder="Digite o nome do autor">
        <label class="left" for="genre" >Gênero:</label>   
        <div class="input-field">
            <select name="genre">
                <option value="" selected disabled>Escolha o gênero</option>
                @foreach ($genres as $genre)
                    <option value="{{$genre}}">{{$genre}}</option>
                @endforeach   
            </select>
        </div>

        <div class="file-field">
            <div class="btn">
                <span>Imagem</span>
                <input type="file" name="image">
                </div>
            <div class="file-path-wrapper">
                <input class="file-path validate input-field" type="text">
            </div>
        </div>

        <label class="left" for="editor_rating" >Nota(1 a 10): </label>
        <input placeholder="Digite a sua nota" type="number" name="editor_rating" id="rating" min="1" max="10" step="1">
            
        <label class="left" for="review" >Avaliação: </label>
        <textarea class="materialize-textarea" name="review" placeholder="O que você achou do livro" cols="30" rows="10"></textarea>

            
        <button class="btn green" type="submit">Adicionar Livro</button>
    </form>
</div>


    

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var sel = document.querySelectorAll('select');
    var instances = M.FormSelect.init(sel);
    });
</script>
@endsection 