<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }

    public function loginAction(LoginRequest $request) {
        $data = $request->validated();

        if (auth()->attempt($data)) {
            session()->flash('success', 'Вітаю, ' . auth()->user()->name);
            return redirect()->route('home');
        }
        
        return redirect()->route('login')->withErrors([
            'email' => 'Невірний логін або пароль',
            'password' => ''
        ]);
    }

    public function registerAction(RegisterRequest $request) {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        
        $user = User::create($data);
    
        if ($user) auth()->login($user);
        session()->flash('success', 'Вітаю, ваш акаунт успішно створено');

        return redirect()->route('home');
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('home');
    }
}
