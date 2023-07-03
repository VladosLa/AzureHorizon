<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Авторизация успешна
            return redirect()->intended('/'); // Перенаправление на главную страницу
        } else {
            // Неверные учетные данные
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    
    


    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

}
