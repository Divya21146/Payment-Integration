<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request) {
        $var=$request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirmpassword' => 'required'
        ]);
        dd($var);
    }
}
