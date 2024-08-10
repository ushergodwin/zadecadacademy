<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::post('/register', [UserController::class, 'register'])->name('register');

Route::post('/login', [UserController::class, 'login'])->name('login');




