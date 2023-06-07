<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect()->back()->with('error', 'Você já está logado');
        }else{
            return view('login.login');
        }

    }

    public function register(){
            if(Auth::check()){
                return redirect()->back()->with('error', 'Você já está logado');
            }else{
                return view('login.register');
            }
    }

    public function auth(Request $request){
        $credecials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],[
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'Digite um email válido',

            'password.required' => 'O campo senha é obrigatório',
        ]);
        
        if(Auth::attempt($credecials, $request->remember)){
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Seja bem vindo!');
        }else{
            return redirect()->back()->with('error', 'Email ou senha inválidos');
        }

        
    }

    public function create(Request $request){
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'firstname.required' => 'O campo Primeiro nome é obrigatório',
            'lastname.required' => 'O campo Sobrenome é obrigatório',
            'email.required' => 'O campo Email é obrigatório',
            'email.email' => 'O campo Email deve ser um endereço de email válido',
            'password.required' => 'O campo Senha é obrigatório',
        ]);
    
        $user = new User();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        
        $user->save();
    
        Auth::login($user);
        
        return redirect()->route('site.home')->with('success', 'Sua conta foi criada');
    }
    

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/')->with('success', 'Você foi deslogado');
    }

}
