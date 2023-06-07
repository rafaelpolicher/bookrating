@extends('site.layout')
@section('title', 'Explore')
@section('content')


<div class="container">
    <h4 class="center">Todos os livros</h4>
    @include('custom.search')
    @include('custom.sort')
    <table>        
      <thead>
        <tr>
          <th>Imagem</th>
          <th>Título <i class="fas fa-sort"></i></th>
          <th>Autor <i class="fas fa-sort"></th>
          <th>Gênero <i class="fas fa-sort"></th>
          <th>Avaliação <i class="fas fa-sort"></i></th>
          <th>Última atualização <i class="fas fa-sort"></i></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($books as $book)
          <tr>
            <td>
              @if ($book->image =='')
                <img class="responsive-img" src="{{asset('images/cover.jpg')}} " style="width: 50px;" >                    
              @else
                <img src="{{ asset('laravel/storage/app/public/' . $book->image) }}" alt="" class="responsive-img" style="width: 50px;">
              @endif
            </td>
            <td><a href="{{ route('site.details', ['slug' => $book->slug]) }}">{{$book->title}}</a></td>
            <td>{{$book->author}}</td>
            <td>{{$book->genre}}</td>
            <td>{{$book->editor_rating}} /10</td>
            <td>{{$book->updated_at}}</td>
          </tr>
        @endforeach    
      </tbody>
    </table> 
    <div class="center">
        {{$books->links('custom.pagination')}}
    </div>
</div>  
  @endsection 
