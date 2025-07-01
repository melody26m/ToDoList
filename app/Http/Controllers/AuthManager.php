<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    function login()
    {
        return view('auth.login');
    }

    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
           return redirect()->route('task.add')->with('success', 'Login successful');

        }

        return redirect(route('login'))->with('error', 'Invalid email or password');
    }

    function register()
    {
        return view('auth.register');
    }

    function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = new \App\Models\User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password; // consider hashing this, e.g., Hash::make($request->password)

        if ($user->save()) {
            Auth::login($user);
        } else {
            return redirect(route('register'))->with('error', 'Registration failed, please try again');
        }

        return redirect(route('login'))->with('success', 'Registration successful, please login');
    }
}
