<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            Session::regenerate();
            // Authentication passed, redirect to the dashboard
            $user = Auth::user();
            $names = $user->first_name . ' ' . $user->last_name;
    
            Session::put('interface', $user->role);
            Session::put('names', $names);
            Session::put('email', $user->email);
            Session::put('first', $user->first_name);
            Session::put('last', $user->last_name);
            Session::put('userid', $user->id);
    
            return redirect()->route('admin.dashboard')->with('success', "Welcome {$user->first_name} (Administrator)!!");
        } else {
            // Authentication failed, redirect back to login with an error
            return redirect()->route('auth.login')->with('error', 'Username or password is incorrect. Try again');
        }
    }
    

    public function register(Request $request)
    {
        $request->validate([
            'first' => 'required|string|max:255',
            'last' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'first_name' => $request->first,
            'last_name' => $request->last,
            'email' => $request->email,
            'password' => md5($request->password),
        ]);

        return redirect()->route('auth.login')->with('success', 'You have successfully registered.');
    }

    public function forgot(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $code = rand(10000, 99999);
            $user->reset_code = $code;
            $user->save();

            $subject = "Password Reset";
            $message = "You requested password reset for your account (Email: $request->email). If you really want to reset your password, 
                        Here is the Reset Code : <b> $code </b>. If you are not interested in password resetting, please ignore this email and do not share the code with others. Thank you.";
            // Call the SendMail function here
            // SendMail($request->email, $subject, $message);

            return redirect()->route('auth.reset', ['user' => base64_encode($request->email)]);
        } else {
            return redirect()->route('auth.forgot')->with('error', 'Email address does not match with any account...');
        }
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'code' => 'required|string|max:10',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && $user->reset_code == $request->code) {
            $user->password = md5($request->password);
            $user->reset_code = null;
            $user->save();

            return redirect()->route('auth.login')->with('success', 'Your password was reset successfully.. You can now login.');
        } else {
            return redirect()->route('auth.forgot')->with('error', 'Your password reset code is incorrect.');
        }
    }
}
