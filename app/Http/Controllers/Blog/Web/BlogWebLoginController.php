<?php

namespace App\Http\Controllers\Blog\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogWebLoginController extends Controller
{
    public function indexView()
    {
        if(Auth::check()){
            return redirect()->route('blog.home');
        }

        return view('Blog.Auth.login', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'=> ['required','email','exists:users,email'],
            'password'=> ['required','string'],
        ],
        [
            'email.exists'=>'Este email não está cadastrado no sistema.',
            'email.required'=>'O campo email é obrigatório.',
            'email.email'=>'O campo email deve ser um email válido.',
            'password.required'=>'O campo senha é obrigatório.',
        ]);

        $auth = Auth::attempt($request->only('email','password'));

        if(!$auth){
            return
                redirect()
                ->back()
                ->withErrors(['password'=>'Senha ou email inválidos.'])
                ->withInput();
        }
        return redirect()->intended(route('blog.home'));
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'email'=> ['required','email','string'],
            'password'=> ['required','string']
        ]);

        $User = User::create($request->only('email','password'));

        if($User){
            Auth::login($User);
            return redirect()->route('blog.home');
        } else {
            return
                redirect()
                ->back()
                ->withErrors(['error'=>'Erro ao cadastrar usuário.'])
                ->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('blog.auth.loginView');
    }
}
