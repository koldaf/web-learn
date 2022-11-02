<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function register(){
        // $data = request()->all();

        // $validator = Validator::make($data,
        //             ['username' => ['required', Rule::unique('users', 'name')],
        //             'phone' => 'required|numeric|max:11',
        //             'gender' => 'required',
        //             'password' => 'required|confirmed'],
        //             );

        // dd($validator);

        $data = request()->validate([
            'username' => ['string', Rule::unique('users','username')],
            'phone' => ['string'],
            'gender'=> ['string'],
            'password'=> ['string','confirmed', 'min:8']
        ],[
            'username.unique' => 'Username already in use',
            'password.confirmed'=>'Password not matched'
        ]);
        //dd($data);
        $pass = Hash::make($data['password']);
        User::create([
            'username' => $data['username'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'password' => $pass
        ]);

        return redirect('/')->withSuccess('Your account was created successfully, you can now login');
    }
}
