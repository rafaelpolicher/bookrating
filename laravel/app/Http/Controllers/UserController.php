<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        $books = Book::all();     
        if (!auth()->check()) {
            return redirect()->route('login.login')->with('error', 'Você precisa estar autenticado para acessar esta página.');
        } else {
            return view('user.profile', compact('user', 'books'));
        }
        
    }

    public function edit(){
        $user = Auth::user();
        if (!auth()->check()) {
            return redirect()->route('login.login')->with('error', 'Você precisa estar autenticado para acessar esta página.');
        } else {
            return view('user.edit', compact('user'));
        }
        
    }

    public function update(Request $request)
{
        $user = Auth::user();
        $user = User::findOrFail($user->id);

    // Validar os dados recebidos do formulário
    $request->validate([
        'firstname' => ['required', 'firstname'],
        'lastname' => ['required', 'lastname'],
        'email' => ['required', 'email'],
        'image' => 'image',
    ],[
        'firstname.required' => 'O campo Nome é obrigatório',
        'lastname.required' => 'O campo Sobrenome é obrigatório',
        'email.email' => 'Digite um email válido',
    ]);

    // Localizar o usuário pelo ID
    
    // Atualizar os campos desejados
    $user->firstname = $request->input('firstname');
    $user->lastname = $request->input('lastname');
    $user->image = $request->input('image');
    $user->bio = $request->input('bio');

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('public/images/user', 'public');
        $user->image = $imagePath;
    }
    
    /*// Atualizar outros campos do usuário, se necessário

    // Salvar as alterações no banco de dados*/
    $user->save();

    // Redirecionar ou retornar uma resposta adequada
    return redirect()->route('user.profile')->with('success', 'Usuário atualizado com sucesso!');
}



}
