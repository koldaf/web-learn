<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function login(){
        // Validator(request()->all(),[
        //     'username' => ['required', 'name'],
        //     'password' => ['required']
        // ])->validate();
        request()->validate([
            'username' => ['required'],
            'password' => ['required']

        ]);
        if(auth()->attempt(
                    request()->only(['username','password']),
                    request()->filled('remember'))){
            return redirect('/dashboard');

        }
        // $user = User::where('username', request()->get('username'))->first();
        // if(!$user) return ;
        // if(Hash::check(request()->get('password'), $user->password)){
        // $token = $user->generateToken()->plainTextToken;

        // }
        return redirect()->back()->withErrors(['username'=>'Invalid Credentials']);

    }

    public function logout(){
        auth()->logout();

        return redirect('/');

    }
}
