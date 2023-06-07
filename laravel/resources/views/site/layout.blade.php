<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
  
<nav>
    <div class="nav-wrapper row">
        <div class="logo-container ">
            <a href="{{route('site.home')}}" class="brand-logo">
                <img class="logo" src="{{asset('images/logo.png')}}" alt="Book Rating logo">
            </a>
            <a href="#" data-target="mobile-menu" class="sidenav-trigger">
                <i class="material-icons">menu</i>
            </a>
        </div>

        <div class="link-container ">
            <ul class="right hide-on-med-and-down">
                <li><a href="{{route('site.allBooks')}}"><i class="fa-solid fa-magnifying-glass"></i> Explorar</a></li>
                <li>
                    <a class="dropdown-trigger" href="#" data-target="dropdown-genre"><i class="fa-solid fa-book-open"></i> Gêneros<i class="material-icons right">arrow_drop_down</i></a>
                </li>

                @auth
                    @if (auth()->user()->role === 'admin')
                        <li><a href="{{route('admin.panel')}}"><i class="fa-regular fa-hard-drive"></i> Painel</a></li> 
                    @endif
                    @if (auth()->user()->role != 'user')
                        <li><a href="{{route('site.addBook')}}"><i class="fa-regular fa-square-plus"></i> Adicionar livro</a></li> 
                    @endif
                      
                    <li><a href="{{route('user.profile')}}"><i class="fa-regular fa-user"></i>  {{auth()->user()->firstname}}</a></li>
                    <li><a href="{{route('login.logout')}}"> <i class="fa-regular fa-circle-right"></i>  Sair</a></li>
                @else
                    <li><a href="{{route('login.login')}}"> <i class="fa-regular fa-circle-right"></i> Entrar/ Registrar</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
  
<!-- Dropdown Structure -->
@php
    $genres = ["Acadêmico", "Aventura", "Biografia", "Clássico", "Drama", "Ficção", "HQ", "Infantil", "Não-Ficção", "Novela", "Romance", "Religioso", "Terror"];
@endphp

<ul id="dropdown-genre" class="dropdown-content">
    @foreach ($genres as $genre)
        <li><a href="{{route('books.genre', $genre)}}">{{$genre}}</a></li>
    @endforeach
</ul>

<ul class="sidenav" id="mobile-menu">
  <li><a href="{{route('site.allBooks')}}"><i class="fa-solid fa-magnifying-glass"></i> Explorar</a></li>

  @auth
      @if (auth()->user()->role === 'admin')
          <li><a href="{{route('admin.panel')}}"><i class="fa-regular fa-hard-drive"></i> Painel</a></li> 
      @endif
      @if (auth()->user()->role != 'user')
          <li><a href="{{route('site.addBook')}}"><i class="fa-regular fa-square-plus"></i> Adicionar livro</a></li> 
      @endif
        
      <li><a href="{{route('user.profile')}}"><i class="fa-regular fa-user"></i>  {{auth()->user()->firstname}}</a></li>
      <li><a href="{{route('login.logout')}}"> <i class="fa-regular fa-circle-right"></i>  Sair</a></li>
  @else
      <li><a href="{{route('login.login')}}"> <i class="fa-regular fa-circle-right"></i> Entrar/ Registrar</a></li>
  @endauth

</ul>

@include('custom.messages')

@yield('content')

<footer class="row page-footer">
    <div class="col s4 center">
        <ul>
            <li><a href="{{ url('https://www.linkedin.com/in/rafael-policher-36651724a/') }}" target="_blank"><i class="fa-brands fa-linkedin-in"></i> Linkedin</a></li>
            <li><a href="{{ url('https://github.com/rafaelpolicher') }}" target="_blank"><i class="fa-brands fa-github"></i> Github</a></li>
            <li></li>
        </ul>
    </div>
  
    <div class="col s4 center">
        <p>BookRating &#169 2023</p>
    </div>

    <div class="col s4 center">
        <p>Desenvolvido por Rafael Policher</p>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);

        var dropdowns = document.querySelectorAll('.dropdown-trigger');
        var options = {
            constrainWidth: false,
            coverTrigger: false // opcional, se você deseja que o dropdown seja aberto na posição do link
        };
        M.Dropdown.init(dropdowns, options);
    });
</script>
</body>
</html>
