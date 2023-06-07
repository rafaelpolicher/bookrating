@extends('site.layout')
@section('title', 'Update')
@section('content')

     <!-- Modal Structure -->
  <div id="modal" class="modal">
    <div class="modal-content">
      <h4>Atualize seu perfil</h4>
      <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <div class="input-field">
            <input type="hidden" name="id" value="{{$user->id}}">
            <input type="text" id="firstname" name="firstname" value="{{$user->firstname}}" required>
            <label for="firstname">Nome</label>
        </div>
    
        <div class="input-field">
            <input type="text" id="lastname" name="lastname" value="{{$user->lastname}}" required>
            <label for="lastname">Sobrenome</label>
        </div>

        <div class="input-field">
            <input type="email" id="email" name="email" value="{{$user->email}}" readonly>
            <label for="email">Email</label>
        </div>
    
        <div class="file-field input-field">
            <div class="btn">
                <span>Foto de perfil</span>
                <input type="file" name="image">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
    
        <div class="input-field">
            <textarea id="bio" name="bio"  class="materialize-textarea">{{$user->bio}}</textarea>
            <label for="bio">Bio</label>
        </div>
        <button class="btn waves-effect waves-light" type="submit">Atualizar</button>
        

    </form>
    </div>
  </div>

</div>  
@endsection