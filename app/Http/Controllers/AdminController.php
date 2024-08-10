<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Gallery;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        if (Auth::check()) {
            $fname = Auth::user()->first_name;
            $lname = Auth::user()->last_name;
            $names = $fname . ' ' . $lname;
            $role = Auth::user()->role;

            return view('admin.dashboard', compact('names', 'role'));
        } else {
            return redirect()->route('auth.login')->with('error', 'Please login to access this page.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'oldpass' => 'required|string',
            'newpass' => 'required|string|confirmed',
        ]);

        $user = Auth::user();
        if (Hash::check($request->oldpass, $user->password)) {
            $user->password = Hash::make($request->newpass);
            $user->save();
            return redirect()->route('admin.logout');
        } else {
            return redirect()->route('admin.profile')->with('error', 'Old password is incorrect.');
        }
    }

    public function registerUser(Request $request)
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
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users')->with('success', 'User registered successfully.');
    }

    public function addProgram(Request $request)
    {
        $request->validate([
            'pg_name' => 'required|string|max:255',
            'software' => 'required|string|max:255',
            'editor' => 'required|string',
            'imgfile' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $filename = time() . '.' . $request->imgfile->extension();
        $request->imgfile->move(public_path('uploads'), $filename);

        Program::create([
            'pg_name' => $request->pg_name,
            'pg_image' => $filename,
            'description' => $request->editor,
            'software' => $request->software,
        ]);

        return redirect()->route('admin.view.programs')->with('success', 'Program added successfully.');
    }

    public function addCourse(Request $request)
    {
        $request->validate([
            'cs_name' => 'required|string|max:255',
            'imgfile' => 'required|mimes:pdf|max:2048',
        ]);

        $filename = time() . '.' . $request->imgfile->extension();
        $request->imgfile->move(public_path('uploads'), $filename);

        Course::create([
            'cs_name' => $request->cs_name,
            'attachment' => $filename,
        ]);

        return redirect()->route('admin.view.courses')->with('success', 'Course added successfully.');
    }

    public function addImage(Request $request)
    {
        $request->validate([
            'imgfile' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'caption' => 'nullable|string|max:255',
            'status' => 'required|string|max:10',
        ]);

        $filename = time() . '.' . $request->imgfile->extension();
        $request->imgfile->move(public_path('uploads'), $filename);

        Gallery::create([
            'image' => $filename,
            'caption' => $request->caption,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.add.slider')->with('success', 'Image added successfully.');
    }

}
