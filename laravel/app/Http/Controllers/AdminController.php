<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $users = User::paginate(50);

            if(!auth()->check() || auth()->user()->role != 'admin'){
                return redirect()->back()->with('error', 'Você nao tem autorização para acessar essa página');
            } else{
                return view('admin.panel', compact('users'));
            }
        
    }

    public function updateRole(Request $request, $id)
{
    $user = User::find($id);
    $user->role = $request->input('role');
    $user->save();

    // Redirecionar ou retornar a resposta adequada

    return redirect()->back()->with('success', 'Função do usuário atualizada com sucesso');
}

}
