<?php

namespace App\Http\Controllers;

use App\Models\ChooseUs;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Gallery;
use App\Models\GallerySection;
use App\Models\Image;
use App\Models\Program;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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
            'imgfile' => 'required|image|mimes:jpeg,png,jpg|max:80000',
        ]);

        $filename = uniqid() . '.' . $request->imgfile->extension();
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
        // Validate the incoming request
        $request->validate([
            'pg_name' => 'required|string|max:255',
            'imgfile' => 'required|image|mimes:jpeg,png,jpg|max:80000',
            'software' => 'required|string|max:255',
            'editor' => 'required|string',
        ]);

        // Handle the file upload
        if ($request->hasFile('imgfile')) {
            $filename = uniqid() . '.' . $request->imgfile->getClientOriginalExtension();
            $request->imgfile->move(public_path('uploads'), $filename);

            // Remove all HTML tags from the description
            $description = strip_tags($request->editor);

            // Create a new record in the database
            Program::create([
                'pg_name' => $request->pg_name,
                'pg_image' => $filename,
                'description' => $description,
                'software' => $request->software,
            ]);

            return redirect()->route('view-courses')->with('success', 'Course added successfully.');
        }

        return redirect()->route('add-course')->with('error', 'Failed to upload image.');
    }







    // 
    public function dashboardData()
    {
        // $user = Auth::user();

        // if ($user && $user->role == 'admin') {
        $enrollmentCount = Enrollment::count();
        $contactCount = Contact::count();
        $programCount = Program::count();
        $galleryCount = Gallery::count();

        return view('admin.dashboard', compact('enrollmentCount', 'contactCount', 'programCount', 'galleryCount'));
        // }

        // Redirect to login or an error page if the user is not authenticated or not an admin
        // return redirect()->route('auth.login')->with('error', 'Please login to access the dashboard.');
    }

    public function sliderPhotos()
    {
        $slider_photos = Gallery::all();

        return view('admin.slider_photos', compact('slider_photos'));
    }

    public function addSliderPhoto(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'imgfile' => 'required|image|mimes:jpeg,png,jpg',
            'caption' => 'nullable|string|max:255',
        ]);

        // Handle the file upload
        if ($request->hasFile('imgfile')) {
            $filename = uniqid() . '.' . $request->imgfile->getClientOriginalExtension();
            $request->imgfile->move(public_path('uploads'), $filename);
            // Create a new record in the database
            Gallery::create([
                'image' => $filename,
                'caption' => $request->caption,
                'status' => $request->status, // Set status as provided in the form,
                'section_id' => 1
            ]);

            return redirect()->route('slider-photos')->with('success', 'Slider photo added successfully.');
        }

        return redirect()->route('slider-photos')->with('error', 'Failed to upload image.');
    }

    public function sliderDelete($id)
    {
        $slider_photo = Gallery::findOrFail($id);

        $slider_photo->delete();

        return redirect()->route('slider-photos')->with('success', 'Image deleted successfully.');
    }

    public function galleryPhotos()
    {
        $gallery_photos = Gallery::all();
        $sections = GallerySection::all();

        return view('admin.gallery_photos', compact('gallery_photos', 'sections'));
    }

    public function addGalleryPhoto(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'imgfile' => 'required|image|mimes:jpeg,png,jpg',
            'caption' => 'nullable|string|max:255',
            'status' => 'required|string|max:3', // Validating status field
        ]);

        // Handle the file upload
        if ($request->hasFile('imgfile')) {
            $filename = uniqid() . '.' . $request->imgfile->getClientOriginalExtension();
            $request->imgfile->move(public_path('uploads'), $filename);
            $category = $request->category;
            // Create a new record in the database
            Gallery::create([
                'image' => $filename,
                'caption' => $request->caption,
                'status' => $request->status, // Set status as provided in the form,
                'section_id' => $category
            ]);

            return redirect()->route('gallery-photos')->with('success', 'Gallery photo added successfully.');
        }

        return redirect()->route('gallery-photos')->with('error', 'Failed to upload image.');
    }

    public function galleryDelete($id)
    {
        $gallery_photo = Image::findOrFail($id);

        $gallery_photo->delete();

        return redirect()->route('gallery-photos')->with('success', 'Image deleted successfully.');
    }

    public function whyChooseUs()
    {
        $why_choose_us = ChooseUs::all();

        return view('admin.why_choose_us', compact('why_choose_us'));
    }

    public function addWhyChooseUs(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'imgfile' => 'required|image|mimes:jpeg,png,jpg',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Handle the file upload
        if ($request->hasFile('imgfile')) {
            $filename = uniqid() . '.' . $request->imgfile->getClientOriginalExtension();
            $request->imgfile->move(public_path('uploads'), $filename);

            // Create a new record in the database
            ChooseUs::create([
                'image' => $filename,
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return redirect()->route('why-choose-us')->with('success', 'Item added to "Why Choose Us" section successfully.');
        }

        return redirect()->route('why-choose-us')->with('error', 'Failed to upload image.');
    }


    public function deleteWhyChooseUs($id)
    {
        $item = ChooseUs::findOrFail($id);

        // Optionally, delete the image file
        if ($item->imgfile && file_exists(public_path('uploads/' . $item->imgfile))) {
            unlink(public_path('uploads/' . $item->imgfile));
        }

        // Delete the item from the database
        $item->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Item deleted successfully.');
    }


    public function contactMessages()
    {
        $contact_messages = Contact::all();

        return view('admin.contact_messages', compact('contact_messages'));
    }

    public function messageDelete($id)
    {
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

    public function courseDelete($id)
    {
        $course = Program::findOrFail($id);

        $course->delete();

        return redirect()->route('view-courses')->with('success', 'Course deleted successfully.');
    }

    public function viewAttachments()
    {
        // Fetch all enrolled students with their associated program names in descending order by id
        $outlines = Course::orderBy('cs_name', 'asc')->get();

        return view('admin.view_attachments', compact('outlines'));
    }

    public function addDownloadFile(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'cs_name' => 'required|string|max:255',
            'imgfile' => 'required|mimes:pdf',
        ]);

        // Handle the file upload
        if ($request->hasFile('imgfile')) {
            $filename = strtolower(uniqid() . '.' . $request->imgfile->getClientOriginalExtension());
            $request->imgfile->move(public_path('uploads'), $filename);

            $thumbnail = "";
            if ($request->hasFile('thumbnail')) {
                //thumbnail
                $thumbnail = strtolower(uniqid() . '.' . $request->thumbnail->getClientOriginalExtension());
                $request->thumbnail->move(public_path('uploads'), $thumbnail);
            }
            // Create a new record in the database
            Course::create([
                'cs_name' => $request->cs_name,
                'attachment' => $filename,
                'thumbnail' => $thumbnail
            ]);

            return redirect()->route('view-attachments')->with('success', 'Download file added successfully.');
        }

        return redirect()->route('new-attachment')->with('error', 'Failed to upload file.');
    }


    public function updateCourse(Request $request, $id)
    {
        $course = Program::findOrFail($id);

        $request->validate([
            'pg_name' => 'required|string|max:255',
            'software' => 'required|string|max:255',
            'editor' => 'required|string',
            'imgfile' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        // Update course details
        $course->pg_name = $request->pg_name;
        $course->software = $request->software;
        $course->description = $request->editor;

        // Handle file upload
        if ($request->hasFile('imgfile')) {
            $filename = uniqid() . '.' . $request->imgfile->extension();
            $request->imgfile->move(public_path('uploads'), $filename);
            $course->pg_image = $filename;
        }

        $course->save();

        return redirect()->back()->with('success', 'Course updated successfully.');
    }

    public function updateCourseImage(Request $request, $id)
    {
        $course = Program::findOrFail($id);

        $request->validate([
            'imgfile' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        // Handle file upload
        if ($request->hasFile('imgfile')) {
            // Delete the old image if it exists
            if ($course->pg_image && file_exists(public_path('uploads/' . $course->pg_image))) {
                unlink(public_path('uploads/' . $course->pg_image));
            }

            // Store the new image
            $filename = uniqid() . '.' . $request->imgfile->extension();
            $request->imgfile->move(public_path('uploads'), $filename);

            // Update the course image
            $course->pg_image = $filename;
            $course->save();
        }

        return redirect()->back()->with('success', 'Course image updated successfully.');
    }



    public function outlineDelete($id)
    {
        $outline = Course::findOrFail($id);

        $outline->delete();

        return redirect()->route('view-attachments')->with('success', 'Message deleted successfully.');
    }



    public function updateProfile(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'new_email' => 'required|string|email|max:255|unique:users,email,' . $request->user_id,
            'oldpass' => 'required|string',
            'newpass' => 'required|string|min:8',
        ]);



        // Retrieve the user by ID
        $user = User::findOrFail($request->user_id);



        // Check if the old password is correct
        if (Hash::check($request->oldpass, $user->password)) {
            // Update the user's email and password
            $user->email = $request->new_email;
            $user->password = Hash::make($request->newpass);
            $user->save();

            // Update session with new email if it was changed
            if (Session::get('email') !== $user->email) {
                Session::put('email', $user->email);
            }



            return redirect()->route('update-profile')->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->route('update-profile')->with('error', 'Old password is incorrect.');
        }
    }


    public function updateWhyChooseUs(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'imgfile' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $chooseUs = ChooseUs::findOrFail($id);

        if ($request->hasFile('imgfile')) {
            // Handle the file upload
            $filename = uniqid() . '.' . $request->imgfile->getClientOriginalExtension();
            $request->imgfile->move(public_path('uploads'), $filename);

            // Delete the old image if it exists
            if ($chooseUs->image) {
                $oldImage = public_path('uploads/' . $chooseUs->image);
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }

            $chooseUs->image = $filename;
        }

        $chooseUs->title = $request->title;
        $chooseUs->description = $request->description;
        $chooseUs->save();

        return redirect()->route('why-choose-us')->with('success', 'Item updated successfully.');
    }

    public function manageCategories(Request $request)
    {

        $is_edit = $request->boolean('is_edit');
        $section_name = "";
        $section_id = $request->query('id');

        //is_edit_request
        if ($request->post('is_edit_request')) {
            $category = $request->post('category_name');
            $section_id = $request->post('section_id');
            GallerySection::where('id', $section_id)->update(['section_name' => $category]);
            return redirect()->route('add-categories')->with('success', 'Category Updated successfully.');
        }
        if ($request->post('category_name')) {
            $category = $request->post('category_name');
            GallerySection::updateOrCreate(['section_name' => $category], ['section_name' => $category]);
            return redirect()->back()->with('success', 'Category Saved successfully.');
        }
        if ($request->query('category_id')) {
            $category_id = $request->query('category_id');
            GallerySection::where('id', $category_id)->delete();
            // delete corresponding galley photos 
            Gallery::where('section_id', $category_id)->delete();
            return redirect()->back()->with('success', 'Category Deleted successfully.');
        }

        if ($is_edit) {
            $section_name = GallerySection::find($section_id)->section_name;
        }
        $categories = GallerySection::orderBy('created_at', 'desc')->get();
        return view('admin.view_gallery_categories', compact('categories', 'is_edit', 'section_name', 'section_id'));
    }

    public function testimonials(Request $request)
    {

        if ($request->post('content')) {
            //dd($request->all());

            // Handle the file upload
            if ($request->hasFile('video')) {
                $filename = uniqid() . '.' . $request->video->getClientOriginalExtension();
                $request->video->move(public_path('uploads'), $filename);

                // Create a new record in the database
                Testimonial::updateOrCreate(['id' => 1], [
                    'video_link' => $filename,
                    'video_caption' => $request->video_caption,
                    'content' => $request->content,
                ]);

                return redirect()->back()->with('success', 'Testimonial changes saved successfully.');
            }
        } else {
            $testimonial = Testimonial::where('id', 1)->first();
            return view('admin.testimonial', compact('testimonial'));
        }
    }
}
