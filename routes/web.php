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

Route::get('/course/details', [CourseController::class, 'details'])->name('course.details');

Route::get('/program/details', [ProgramController::class, 'show'])->name('program.details');

Route::get('/enrol', [ProgramController::class, 'enrol'])->name('enrol');

Route::get('/course-outlines', [CourseController::class, 'index'])->name('course.outlines');

Route::get('/enrol', [EnrollmentController::class, 'show'])->name('enrol.show');

Route::post('/enrol', [EnrollmentController::class, 'store'])->name('enrol.store');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::post('/register', [UserController::class, 'register'])->name('register');

Route::post('/login', [UserController::class, 'login'])->name('login');






// ADMIN


Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');



Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::post('/update-profile', [AdminController::class, 'updateProfile'])->name('admin.update_profile');

Route::post('/register-user', [AdminController::class, 'registerUser'])->name('admin.register');

Route::post('/add-program', [AdminController::class, 'addProgram'])->name('admin.add_program');

Route::post('/add-course', [AdminController::class, 'addCourse'])->name('admin.add_course');

Route::post('/add-image', [AdminController::class, 'addImage'])->name('admin.add_image');




