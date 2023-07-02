<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        auth()->logout();
        return view('sessions.create')->with('success','Adios');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (auth()->attempt($attributes)) {
            return redirect('/')->with('success', 'Bienvenido de nuevo');
        }
        
        throw ValidationException::withMessages(['email' => 'Credenciales inválidas']);     
    }
    
    
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success','Adios');
    }
}