@extends('site.layout')
@section('title', 'Register')
@section('content')

<div class="container center">
    <h3>Criar conta</h3>
    <form action="{{route('login.create')}}" method="post">
        @csrf
        <label class="left" for="firstname" >Nome:</label>
        <input type="text" name="firstname" class="input-field" placeholder="Digite seu primeiro nome">

        <label class="left" for="lastname" >Sobrenome:</label>
        <input type="text" name="lastname" class="input-field" placeholder="Digite seu sobrenome">

        <label class="left" for="email" >Email:</label>
        <input type="email" name="email" class="input-field" placeholder="Digite seu email">

        <label class="left" for="password" >Senha:</label>
        <input type="password" name="password" class="input-field" placeholder="Digite sua senha">
        <button class="btn green" type="submit">Registrar</button>
    </form>
    <a href="{{route('login.login')}}">Já tenho uma conta</a>
</div>

@endsection