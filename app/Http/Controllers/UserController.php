<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function register(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
        ]);

        $token = $user->createToken('mytoken')->plainTextToken;

   // dd($token);
        return response([
            'user' =>$user,
            'token' =>$token,
        ]);

    }

    public function logout()
    {
       // dd(auth()->user());
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'you are successfully logout',
        ]);
    }

    public function Login(Request $request)
    {
        $request-> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || Hash::check($request->password,
                                  $user->password))
                {
                    return response([
                        'message' => 'Provided data are incorrect',
                    ]);
                }

            $token = $user->createToken('mytoken')->plainTextToken;

   // dd($token);
        return response([
            'user' =>$user,
            'token' =>$token,
        ]);


    }




}
