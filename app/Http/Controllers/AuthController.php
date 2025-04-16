<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function showLogin()
    {
        return view('back.login');
    }

    function login(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password', 'name');
        $user = User::where(function($query) use ($credentials) {
            $query->where('email' , $credentials['email'])
            ->orWhere('name' , $credentials['name']);
        })->first();

        // $user = User::where('email' , $credentials['email'])
        // ->where('name' , $credentials['name'])->first();
        dd($user);
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            return redirect()->route('admin.index');
        }

        flash('The Email Is Not Correct', 'warning');
        return back();


    }

    function logout(){
        Auth::logout();
        return redirect()->route('visiter.index');

    }
}
