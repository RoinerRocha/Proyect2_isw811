<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    // public function create()
    // {
    //     return view('auth.login');
    // }
    // public function store()
    // {
    //     $attributes = request()->validate([
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     if(! auth()->attempt($attributes)) {

    //         throw ValidationException::withMessages([
    //             'email' => 'los datos ingresados no son correctos'
    //         ]);
    //     }
    //     session()->regenerate();
        
    //     return redirect('/')->with('success', 'Bienvenido de vuelta');
    // }
    public function destroy()
    {
        auth()->logout();
        return redirect('/welcome')->with('success', 'Goodbye!');
    }
}
