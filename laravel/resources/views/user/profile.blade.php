@extends('site.layout')
@section('title', 'Profile')
@section('content')

@auth
<section class="profile container">
    <div class="row ">
        <div class="col s12 m6 center">
            @if ($user->image =='')
                <img class="responsive-img" src="{{asset('images/user.png')}}" style="width: 300px;">                    
            @else
                <img src="{{ asset('laravel/storage/app/public/' . $user->image) }}" alt="" class="responsive-img" style="width: 300px;">
            @endif

        </div>

        <div class="col s12 m6 center">
            <h3>
                <span>{{auth()->user()->firstname}} {{auth()->user()->lastname}}</span>
            </h3>
        </div>

        <div class="col s12 m6">
            <span>{{auth()->user()->email}}</span>
        </div>

        <div class="col s12 m6">
            <span>{{auth()->user()->role}}</span>
        </div>


        <div class="">
            <p>{{auth()->user()->bio}}</p>
        </div>
        <div class="center">
            <a class="waves-effect waves-light btn " href="{{route('user.edit')}}">Atualizar perfil</a>
        </div>
        
    </div>    
    @if (auth()->user()->role != 'user')
        <div class="">
        <h4 class="center">Meus livros cadastrados</h4>
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
                @if ($book->id_user == auth()->user()->id)
                    <tr>
                        <td>@if ($book->image =='')
                            <img class="responsive-img" src="{{asset('images/cover.jpg')}}"  style="width: 50px;">                    
                        @else
                            <img src="{{ asset('laravel/storage/app/public/' . $book->image) }}" alt="" class="responsive-img" style="width: 50px;">
                        @endif    
                        <td><a href="{{ route('site.details', ['slug' => $book->slug]) }}">{{$book->title}}</a></td>
                        <td>{{$book->author}}</td>
                        <td>{{$book->genre}}</td>
                        <td>{{$book->editor_rating}} /10</td>
                        <td>{{$book->updated_at}}</td>
                    </tr>
                    </tr>
                    </tr>
                @endif
            @endforeach    
            </tbody>
          </table>
        
    </div>
    @endif
    
        
</section>
 
@endauth

@endsection