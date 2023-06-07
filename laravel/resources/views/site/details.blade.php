@extends('site.layout')
@section('title', 'Book')
@section('content')

<div class="details">
    <div class="row">
        <div class="col s12 m6 center">
            @if ($book->image =='')
                <img class="responsive-img" src="{{asset('images/cover.jpg')}}" >                    
            @else
                <img src="{{ asset('laravel/storage/app/public/' . $book->image) }}" alt="" class="responsive-img">
            @endif
        </div>

        <div class="col s12 m6 center">
            <h3>
                <span>{{$book->title}}</span>
            </h3>
        </div>

        <div class="col s12 m6">
            <span>{{$book->genre}}</span>
        </div>

        <div class="col s12 m6">
            <span>{{$book->editor_rating}} /10</span>
        </div>

        <div class="col s12 m6">
            <h5>{{$book->author}}</h5><br>
        </div>

        <div class="">
            <p>{{$book->review}}</p>
        </div>
    </div>

    <div>
        @if (auth()->check() && $book->id_user == auth()->user()->id)
            <a class="modal-trigger btn blue" href="#modal-update-{{$book->slug}}">Editar</a>
            <a class="modal-trigger btn red" href="#modal-delete-{{$book->slug}}">Excluir</a>
            
        @endif
    </div>

    <div class="row editor container">
        <div class="col s6 m3">
            <h4 class="center">{{$book->user->firstname}} {{$book->user->lastname}}</h4>
        </div>
        <div class="col s6 m3">
          @if ($book->user->image =='')
                <img class="responsive-img circle" src="{{asset('images/user.png')}}" style="width: 300px;">                    
            @else
                <img src="{{ asset('laravel/storage/app/public/' . $book->user->image) }}" alt="" class="responsive-img circle" style="width: 300px;">
            @endif
        </div>
        <div class="">
            <p>{{$book->user->bio}}</p>
        </div> 
    </div>
    
<!--modal excluir-->
    <div id="modal-delete-{{$book->slug}}" class="modal">
        <div class="modal-content">
            <h4>Confirmação de exclusão</h4>
            <p>Deseja realmente excluir o livro {{$book->title}}?</p>
        </div>
        <div class="modal-footer">
            <form action="{{ route('book.delete', ['slug' => $book->slug]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn red">Excluir</button>
            </form>
        </div>
    </div>

    <!--modal editar-->
    <div id="modal-update-{{$book->slug}}" class="modal">
        <div class="modal-content">
        <!-- Conteúdo do modal -->
        <h4>Editar Livro</h4>
        <form action="{{ route('book.update', ['slug' => $book->slug]) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Campos de edição do livro -->
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" value="{{ $book->title }}">
            
            <label for="author">Autor:</label>
            <input type="text" id="author" name="author" value="{{ $book->author }}">

            <label for="editor_rating">Nota:</label>
            <input placeholder="Digite a sua nota" type="number" name="editor_rating" id="rating" min="1" max="10" step="1" value="{{ $book->editor_rating }}">
                
            <label for="review">Avaliação:</label>
            <textarea class="materialize-textarea" name="review" placeholder="O que você achou do livro">{{$book->review}}</textarea>
            
            <!-- Outros campos de edição -->
            
            <button class="btn green" type="submit btn green">Atualizar</button>
        </form>
        </div>
    </div>
  
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      var modals = document.querySelectorAll('.modal');
      M.Modal.init(modals);
    });
  </script>
  
@endsection 

