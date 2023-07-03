<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|string|email|max:255|unique:users,email',
            'guest_password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $validatedData['guest_name'],
            'email' => $validatedData['guest_email'],
            'password' => bcrypt($validatedData['guest_password']),
        ]);

        Auth::login($user);

        // Дополнительная логика после регистрации

        return redirect('/')->with('success', 'Registration successful');
    }
}
