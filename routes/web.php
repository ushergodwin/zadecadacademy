<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/404', function () {
    return view('404');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/clientele', function () {
    return view('clientele');
});

Route::get('/downloads', [CourseController::class, 'downloads'])->name('downloads');

Route::get('/about', function () {
    return view('about');
});

Route::get('/deliverables', function () {
    return view('deliverables');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/payment-details', function () {
    return view('payment-details');
})->name('payment.details');

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

Route::get('/course/details/{id}', [CourseController::class, 'details'])->name('course.details');

Route::get('/program/details/{id}', [ProgramController::class, 'show'])->name('program.details');

Route::get('/program/enrol/{id}', [ProgramController::class, 'enrol'])->name('program.enrol');

Route::get('/course-outlines', [CourseController::class, 'indexFunc'])->name('course.outlines');

Route::get('/enrol/{id}', [EnrollmentController::class, 'show'])->name('enrol.show');

Route::post('/enrol', [EnrollmentController::class, 'store'])->name('enrol.store');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::post('/register', [UserController::class, 'register'])->name('register');

Route::post('/login', [UserController::class, 'login'])->name('login');

// ADMIN

Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/login', function () {
    return view('admin'); 
})->name('login');


Route::post('/profile', [AdminController::class, 'dashboard'])->name('admin.profile');

Route::get('/register', function () {
    return view('auth.login');
})->name('auth.register');

Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

Route::get('/forgot', function () {
    return view('auth.login');
})->name('auth.forgot');

Route::post('/forgot', [AuthController::class, 'forgot'])->name('auth.forgot');

Route::get('/reset', function () {
    return view('auth.login');
})->name('auth.reset');

Route::post('/reset', [AuthController::class, 'reset'])->name('auth.reset');


Route::post('/register-user', [AdminController::class, 'registerUser'])->name('admin.register');







Route::middleware(['auth'])->group(function (){

    Route::get('/dashboard', [AdminController::class, 'dashboardData'])->name('admin.dashboard');
    // 
    Route::get('/slider-photos', [AdminController::class , 'sliderPhotos'])->name('slider-photos');

    Route::post('/add-slider-photo', [AdminController::class, 'addSliderPhoto'])->name('add-slider-photo');

    Route::get('/slider/delete/{id}', [AdminController::class , 'sliderDelete'])->name('slider.delete');

    Route::get('/gallery-photos', [AdminController::class , 'galleryPhotos'])->name('gallery-photos');

    Route::post('/add-gallery-photo', [AdminController::class, 'addGalleryPhoto'])->name('add-gallery-photo');

    Route::get('/gallery/delete/{id}', [AdminController::class , 'galleryDelete'])->name('gallery.delete');

    Route::get('/why-choose-us', [AdminController::class , 'whyChooseUs'])->name('why-choose-us');

    Route::post('/add-why-choose-us', [AdminController::class, 'addWhyChooseUs'])->name('add-why-choose-us');


    // Route::get('/add-course', [AdminController::class , 'add-course'])->name('add-course');

    Route::get('/add-course', function () {
        return view('admin.add_course');
    })->name('add-course');

    Route::post('/add-course', [AdminController::class, 'addCourse'])->name('admin.add_course');

    Route::get('/view-courses', [AdminController::class , 'viewCourses'])->name('view-courses');

    Route::get('/course/delete/{id}', [AdminController::class , 'courseDelete'])->name('course.delete');

    // Route::get('/new-attachment', [AdminController::class , 'newAttachment'])->name('new-attachment');

    Route::get('/new-attachment', function () {
        return view('admin.new_attachment');
    })->name('new-attachment');

    Route::get('/view-attachments', [AdminController::class , 'viewAttachments'])->name('view-attachments');

    Route::post('/add-outline', [AdminController::class, 'addCourseOutline'])->name('admin.add_outline');

    Route::get('/outline/delete/{id}', [AdminController::class , 'outlineDelete'])->name('outline.delete');

    Route::get('/contact-messages', [AdminController::class , 'contactMessages'])->name('contact-messages');

    Route::get('/message/delete/{id}', [AdminController::class , 'messageDelete'])->name('message.delete');

    Route::get('/enrolled-students', [AdminController::class , 'enrolledStudents'])->name('enrolled-students');


    Route::get('/update-profile', function () {
        return view('admin.update_profile');
    })->name('update-profile');

    Route::post('/update-profile', [AdminController::class, 'updateProfile'])->name('admin.update_profile');

    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

});



