<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function register(){
        $data = request()->validate([
            'username' => ['string', Rule::unique('users','name')],
            'phone' =>['string'],
            'gender'=>['string'],
            'password' => ['string' ]
        ],[
            'username.unique' => 'Username already in use'
        ]);
        //password check
        if(request()->get('password') == request()->get('password2')){
            $error = 'Password not matched';
        }
    }
}
