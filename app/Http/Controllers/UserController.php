<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:site_users,username',
            'email' => 'required|string|email|max:255|unique:site_users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:15',
            'names' => 'required|string|max:255',
            'gender' => 'required|string|max:6',
        ]);

        $code = rand(111111, 999999);

        DB::table('site_users')->insert([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'code' => $code,
            'phone' => $request->phone,
            'names' => $request->names,
            'gender' => $request->gender,
            'created_at' => now(),
        ]);

        return Redirect::to('/')->with('success', 'You have successfully registered with ZadeCAD Academy.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = DB::table('site_users')
            ->where('email', $request->email)
            ->orWhere('username', $request->email)
            ->where('password', Hash::make($request->password))
            ->first();

        if ($user) {
            Session::put('email', $user->email);
            Session::put('username', $user->username);
            Session::put('userid', $user->id);

            return Redirect::to('/');
        } else {
            return Redirect::to('/')->with('error', 'Username or email and password is incorrect');
        }
    }
}
