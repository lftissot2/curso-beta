<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request) {
        $authenticated = auth()->attempt($request->validated());

        if ($authenticated) {
            return redirect('/dashboard');
        }

        $request->session()->flash('login', 'Usuário ou senha inválidos');
        return redirect('/login');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
