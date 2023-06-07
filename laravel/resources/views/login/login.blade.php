@extends('site.layout')
@section('title', 'Login')
@section('content')

<div class="container center">
    <div >
        <h3 >Entrar</h3>
        <form action="{{route('login.auth')}}" method="post">
            @csrf
            <label class="left" for="email" >Email</label>
            <input type="email" name="email" class="input-field" placeholder="Digite seu email cadastrado">

            <label class="left" for="password">Senha:</label>
            <input type="password" name="password" class="input-field" placeholder="Digite sua senha">
            <button class="btn green" type="submit">Entrar</button>
        </form>
        <a href="{{route('login.register')}}">Ainda não tenho uma conta</a>
    </div>
</div>
@endsection