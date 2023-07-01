<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        //var_dump(request()->all());
        //return request()->all();
        $attributes=request()->validate([
            'name'=>'required|max:255',
            'username'=>'required|max:255|min:3|unique:users,username',
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>'required|min:6|max:255'
        ]);
        //$attributes['password']=bcrypt($attributes['password']);
        User::create($attributes);      
        return redirect('/');
    }
}
