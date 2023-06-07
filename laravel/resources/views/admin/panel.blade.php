@extends('site.layout')
@section('title', 'Panel')
@section('content')

    <div class="container">
        <h4 class="center">Usuarios cadastrados</h4>
        @include('custom.search')
        @include('custom.sort')
        <table>
            <thead>
              <tr>
                <th>Imagem</th>
                <th>Nome <i class="fas fa-sort"></i></th>
                <th>Sobrenome <i class="fas fa-sort"></th>
                <th>Email <i class="fas fa-sort"></th>
                <th>Função <i class="fas fa-sort"></i></th>
                <th>Usuário desde: <i class="fas fa-sort"></i></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                    <tr>
                        <td>@if ($user->image =='')
                            <img class="responsive-img" src="{{asset('images/user.png')}}" style="width: 50px;">                    
                        @else
                            <img src="{{ asset('laravel/storage/app/public/' . $user->image) }}" alt="" class="responsive-img" style="width: 50px;">
                        @endif</td>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->created_at}}</td>
                        @if ($user->role != "admin")
                            <td><a class="modal-trigger btn" href="#modal-updateRole-{{$user->id}}">Alterar função</a></td>
                        @endif
                    </tr>
            @endforeach    
            </tbody>
          </table>
          <div class="center">
            {{$users->links('custom.pagination')}}
          </div>
    </div>

    @foreach ($users as $user)
    <!-- Modal para alterar a função do usuário -->
    <div id="modal-updateRole-{{$user->id}}" class="modal">
        <div class="modal-content">
            <h4>Alterar função do usuário - {{$user->firstname}} {{$user->lastname}}</h4>
            <form action="{{ route('user.updateRole', ['id' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="input-field">
                    <p>
                        <label>
                            <input type="radio" name="role" value="admin" />
                            <span>Admin</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input type="radio" name="role" value="editor" />
                            <span>Editor</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input type="radio" name="role" value="user" />
                            <span>User</span>
                        </label>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="modal-close waves-effect waves-green btn-flat green">Salvar</button>
                    <a href="#!" class="modal-close waves-effect waves-red btn-flat red">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endforeach


<script>
  document.addEventListener('DOMContentLoaded', function() {
    var modals = document.querySelectorAll('.modal');
    M.Modal.init(modals);
  });
</script>


 
@endsection