<?php

namespace App\Http\Controllers;

use App\Models\ChooseUs;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Gallery;
use App\Models\Image;
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
            // $user->save();
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





    // 
    public function dashboardData()
        {
            // $user = Auth::user();

            // if ($user && $user->role == 'admin') {
                $enrollmentCount = Enrollment::count();
                $contactCount = Contact::count(); // Assuming you have a Contact model
                $programCount = Program::count();
                $galleryCount = Gallery::count();
                
                return view('admin.dashboard', compact( 'enrollmentCount', 'contactCount', 'programCount', 'galleryCount'));
            // }
        
            // Redirect to login or an error page if the user is not authenticated or not an admin
            // return redirect()->route('auth.login')->with('error', 'Please login to access the dashboard.');
        }

    public function sliderPhotos(){
        $slider_photos = Gallery::all();

        return view('admin.slider_photos', compact('slider_photos'));
    }

    public function sliderDelete($id){
        $slider_photo = Gallery::findOrFail($id);

        $slider_photo->delete();

        return redirect()->route('slider-photos')->with('success', 'Image deleted successfully.');
    }

    public function galleryPhotos(){
        $gallery_photos = Image::all();

        return view('admin.gallery_photos', compact('gallery_photos'));
    }

    public function galleryDelete($id){
        $gallery_photo = Image::findOrFail($id);

        $gallery_photo->delete();

        return redirect()->route('gallery-photos')->with('success', 'Image deleted successfully.');
    }

    public function whyChooseUs(){
        $why_choose_us = ChooseUs::all();

        return view('admin.why_choose_us', compact('why_choose_us'));
    }

    public function contactMessages(){
        $contact_messages = Contact::all();

        return view('admin.contact_messages', compact('contact_messages'));
    }

    public function messageDelete($id){
        $message = Contact::findOrFail($id);

        $message->delete();

        return redirect()->route('contact-messages')->with('success', 'Message deleted successfully.');
    }

    public function enrolledStudents()
        {
            // Fetch all enrolled students with their associated program names in descending order by id
            $enrolled_students = Enrollment::with('program')->orderBy('id', 'desc')->get();

            return view('admin.enrolled_students', compact('enrolled_students'));
        }


    public function viewCourses()
        {
            // Fetch all enrolled students with their associated program names in descending order by id
            $courses = Program::orderBy('pg_name', 'asc')->get();

            return view('admin.view_courses', compact('courses'));
        }

        public function courseDelete($id){
            $course = Program::findOrFail($id);
    
            $course->delete();
    
            return redirect()->route('view-courses')->with('success', 'Message deleted successfully.');
        }

        public function viewAttachments()
        {
            // Fetch all enrolled students with their associated program names in descending order by id
            $outlines = Course::orderBy('cs_name', 'asc')->get();

            return view('admin.view_attachments', compact('outlines'));
        }

        public function outlineDelete($id){
            $outline = Course::findOrFail($id);
    
            $outline->delete();
    
            return redirect()->route('view-attachments')->with('success', 'Message deleted successfully.');
        }



}
