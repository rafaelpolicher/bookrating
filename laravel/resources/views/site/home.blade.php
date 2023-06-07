@extends('site.layout')
@section('title', 'Home')
@section('content')
<section id="home">
    <h3 class="center">
        <span>Ultimos adicionados</span>
    </h3>
    <div class="carousel">
        @foreach ($books as $book)
            <a class="carousel-item" href="{{route('site.details', $book->slug)}}"><span>{{$book->editor_rating}} /10</span>
                @if ($book->image =='')
                    <img class="responsive-img" src="{{asset('images/cover.jpg')}}"  style="width: 200px;">                    
                @else
                    <img src="{{ asset('laravel/storage/app/public/' . $book->image) }}" alt="" class="responsive-img" style="width: 200px;">
                @endif    
                    <span>{{$book->title}}</span></a>
        @endforeach
    </div>

    <h3 class="center">
        <span>Melhores</span>
    </h3>
    <div class="carousel">
        @foreach ($books as $book)
            @if ($book->editor_rating == 10)
                <a class="carousel-item" href="{{route('site.details', $book->slug)}}"><span>{{$book->editor_rating}} /10</span>@if ($book->image =='')
                    <img class="responsive-img" src="{{asset('images/cover.jpg')}}"  style="width: 200px;">                    
                @else
                    <img src="{{ asset('laravel/storage/app/public/' . $book->image) }}" alt="" class="responsive-img" style="width: 200px;">
                @endif    
                    <span>{{$book->title}}</span></a>
            @endif
        @endforeach
    </div>
    
    <h3 class="center">
        <span>Biografia</span>
    </h3>
    <div class="carousel">
        @foreach ($books as $book)
            @if ($book->genre=="Biografia")
                <a class="carousel-item" href="{{route('site.details', $book->slug)}}"><span>{{$book->editor_rating}} /10</span>@if ($book->image =='')
                    <img class="responsive-img" src="{{asset('images/cover.jpg')}}"  style="width: 200px;">                    
                @else
                    <img src="{{ asset('laravel/storage/app/public/' . $book->image) }}" alt="" class="responsive-img" style="width: 200px;">
                @endif   <p>{{$book->title}}</p></a>
            @endif
        @endforeach
    </div>
    
    <h3 class="center">
        <span>Ficção</span>
    </h3>
    <div class="carousel">
        @foreach ($books as $book)
            @if ($book->genre=="Ficção")
                <a class="carousel-item" href="{{route('site.details', $book->slug)}}"><span>{{$book->editor_rating}} /10</span>@if ($book->image =='')
                    <img class="responsive-img" src="{{asset('images/cover.jpg')}}"  style="width: 200px;">                    
                @else
                    <img src="{{ asset('laravel/storage/app/public/' . $book->image) }}" alt="" class="responsive-img" style="width: 200px;">
                @endif   <p>{{$book->title}}</p></a>
            @endif
        @endforeach
    </div>
    
    <h3 class="center">
        <span>Drama</span>
    </h3>
    <div class="carousel">
        @foreach ($books as $book)
            @if ($book->genre=="Drama")
                <a class="carousel-item" href="{{route('site.details', $book->slug)}}"><span>{{$book->editor_rating}} /10</span>@if ($book->image =='')
                    <img class="responsive-img" src="{{asset('images/cover.jpg')}}"  style="width: 200px;">                    
                @else
                    <img src="{{ asset('laravel/storage/app/public/' . $book->image) }}" alt="" class="responsive-img" style="width: 200px;">
                @endif   <p>{{$book->title}}</p></a>
            @endif
        @endforeach
    </div>
    
    <h3 class="center">
        <span>Novela</span>
    </h3>
    <div class="carousel">
        @foreach ($books as $book)
            @if ($book->genre=="Novela")
                <a class="carousel-item" href="{{route('site.details', $book->slug)}}"><span>{{$book->editor_rating}} /10</span>@if ($book->image =='')
                    <img class="responsive-img" src="{{asset('images/cover.jpg')}}"  style="width: 200px;">                    
                @else
                    <img src="{{ asset('laravel/storage/app/public/' . $book->image) }}" alt="" class="responsive-img" style="width: 200px;">
                @endif   <p>{{$book->title}}</p></a>
            @endif
        @endforeach
    </div>
    
    <h3 class="center">
        <span>HQ</span>
    </h3>
    <div class="carousel">
        @foreach ($books as $book)
            @if ($book->genre=="HQ")
                <a class="carousel-item" href="{{route('site.details', $book->slug)}}"><span>{{$book->editor_rating}} /10</span>@if ($book->image =='')
                    <img class="responsive-img" src="{{asset('images/cover.jpg')}}"  style="width: 200px;">                    
                @else
                    <img src="{{ asset('laravel/storage/app/public/' . $book->image) }}" alt="" class="responsive-img" style="width: 200px;">
                @endif   <p>{{$book->title}}</p></a>
            @endif
        @endforeach
    </div>
    
    <h3 class="center">
        <span>Infantil</span>
    </h3>
    <div class="carousel">
        @foreach ($books as $book)
            @if ($book->genre=="Infantil")
                <a class="carousel-item" href="{{route('site.details', $book->slug)}}"><span>{{$book->editor_rating}} /10</span>@if ($book->image =='')
                    <img class="responsive-img" src="{{asset('images/cover.jpg')}}"  style="width: 200px;">                    
                @else
                    <img src="{{ asset('laravel/storage/app/public/' . $book->image) }}" alt="" class="responsive-img" style="width: 200px;">
                @endif   <p>{{$book->title}}</p></a>
            @endif
        @endforeach
    </div>
    
    <h3 class="center">
        <span>Romance</span>
    </h3>
    <div class="carousel">
        @foreach ($books as $book)
            @if ($book->genre=="Romance")
                <a class="carousel-item" href="{{route('site.details', $book->slug)}}"><span>{{$book->editor_rating}} /10</span>@if ($book->image =='')
                    <img class="responsive-img" src="{{asset('images/cover.jpg')}}"  style="width: 200px;">                    
                @else
                    <img src="{{ asset('laravel/storage/app/public/' . $book->image) }}" alt="" class="responsive-img" style="width: 200px;">
                @endif   <p>{{$book->title}}</p></a>
            @endif
        @endforeach
    </div>
    
    <h3 class="center">
        <span>Terror</span>
    </h3>
    <div class="carousel">
        @foreach ($books as $book)
            @if ($book->genre=="Terror")
                <a class="carousel-item" href="{{route('site.details', $book->slug)}}"><span>{{$book->editor_rating}} /10</span>@if ($book->image =='')
                    <img class="responsive-img" src="{{asset('images/cover.jpg')}}"  style="width: 200px;">                    
                @else
                    <img src="{{ asset('laravel/storage/app/public/' . $book->image) }}" alt="" class="responsive-img" style="width: 200px;">
                @endif   <p>{{$book->title}}</p></a>
            @endif
        @endforeach
    </div>
    
    <h3 class="center">
        <span>Acadêmico</span>
    </h3>
    <div class="carousel">
        @foreach ($books as $book)
            @if ($book->genre=="Acadêmico")
                <a class="carousel-item" href="{{route('site.details', $book->slug)}}"><span>{{$book->editor_rating}} /10</span>@if ($book->image =='')
                    <img class="responsive-img" src="{{asset('images/cover.jpg')}}"  style="width: 200px;">                    
                @else
                    <img src="{{ asset('laravel/storage/app/public/' . $book->image) }}" alt="" class="responsive-img" style="width: 200px;">
                @endif   <p>{{$book->title}}</p></a>
            @endif
        @endforeach
    </div>
    
    <h3 class="center">
        <span>Religioso</span>
    </h3>
    <div class="carousel">
        @foreach ($books as $book)
            @if ($book->genre=="Religioso")
                <a class="carousel-item" href="{{route('site.details', $book->slug)}}"><span>{{$book->editor_rating}} /10</span>@if ($book->image =='')
                    <img class="responsive-img" src="{{asset('images/cover.jpg')}}"  style="width: 200px;">                    
                @else
                    <img src="{{ asset('laravel/storage/app/public/' . $book->image) }}" alt="" class="responsive-img" style="width: 200px;">
                @endif   <p>{{$book->title}}</p></a>
            @endif
        @endforeach
    </div>
    
    <h3 class="center">
        <span>Clássico</span>
    </h3>
    <div class="carousel ">
        @foreach ($books as $book)
            @if ($book->genre=="Clássico")
                <a class="carousel-item" href="{{route('site.details', $book->slug)}}"><span>{{$book->editor_rating}} /10</span>@if ($book->image =='')
                    <img class="responsive-img" src="{{asset('images/cover.jpg')}}"  style="width: 200px;">                    
                @else
                    <img src="{{ asset('laravel/storage/app/public/' . $book->image) }}" alt="" class="responsive-img" style="width: 200px;">
                @endif   <p>{{$book->title}}</p></a>
            @endif
        @endforeach
    </div>
    
    
</section>


<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems, {
      // specify options here
    });
  });
</script>
@endsection 