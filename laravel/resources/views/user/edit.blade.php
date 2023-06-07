@extends('site.layout')
@section('title', 'Edit')
@section('content')


<div class="container center">
    <h3>Editar usuário</h3>
    <form method="POST" action="{{route('user.update')}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label class="left" for="firtname" >Nome:</label>
        <input type="text" name="firstname" class="input-field" value="{{$user->firstname}}" placeholder="Digite seu nome">

        <label class="left" for="lastname" >Sobrenome:</label>
        <input type="text" name="lastname" class="input-field" value="{{$user->lastname}}" placeholder="Digite seu sobrenome">

        <label class="left" for="email" >Email</label>
        <input type="text" name="email" class="input-field" value="{{$user->email}}" readonly>

        <div class="file-field">
          <div class="btn">
            <span>Foto de perfil</span>
            <input type="file" name="image" value="{{ $user->image }}">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate input-field" type="text">
          </div>
        </div>
        
        <label class="left" for="bio" >Bio:</label>
        <textarea class="materialize-textarea" name="bio" placeholder="Conte mais sobre você" row="10">{{$user->bio}}</textarea>

        
        <button class="btn green" type="submit">Atualizar perfil</button>
    </form>
</div>

@endsection