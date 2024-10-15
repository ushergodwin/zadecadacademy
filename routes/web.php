<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramSoftwareController;
use App\Http\Controllers\SoftwareDocumentController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TrainingCalenderController;
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

Route::get('/blog-list', [BlogController::class, 'fetchBlogs'])->name('blogs-list');

Route::get('/{id}/blog', [BlogController::class, 'show'])->name('blog.show');

Route::post('blogs/{id}/comment', [BlogController::class, 'comment'])->name('blogs.comment');

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

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


Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');


// Public route for viewing the training calendar
Route::get('/training-calendar', [TrainingCalenderController::class, 'fetchCalendars'])->name('view-training-calendar');


Route::get('/software/{id}/documents', [SoftwareDocumentController::class, 'showDocuments'])->name('software.documents');












Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboardData'])->name('admin.dashboard');
    // 
    Route::get('/slider-photos', [AdminController::class, 'sliderPhotos'])->name('slider-photos');

    Route::post('/add-slider-photo', [AdminController::class, 'addSliderPhoto'])->name('add-slider-photo');

    Route::get('/slider/delete/{id}', [AdminController::class, 'sliderDelete'])->name('slider.delete');

    Route::get('/gallery-photos', [AdminController::class, 'galleryPhotos'])->name('gallery-photos');

    Route::post('/add-gallery-photo', [AdminController::class, 'addGalleryPhoto'])->name('add-gallery-photo');

    Route::get('/gallery/delete/{id}', [AdminController::class, 'galleryDelete'])->name('gallery.delete');

    Route::get('/why-choose-us', [AdminController::class, 'whyChooseUs'])->name('why-choose-us');

    Route::post('/add-why-choose-us', [AdminController::class, 'addWhyChooseUs'])->name('add-why-choose-us');

    Route::post('/why-choose-us/update/{id}', [AdminController::class, 'updateWhyChooseUs'])->name('why-choose-us.update');

    route::delete('/admin/why-choose-us/{id}', [AdminController::class, 'deleteWhyChooseUs'])->name('delete-why-choose-us');

    Route::get('/add-course', function () {
        return view('admin.add_course');
    })->name('add-course');

    Route::post('/add-course', [AdminController::class, 'addCourse'])->name('admin.add_course');

    Route::get('/view-courses', [AdminController::class, 'viewCourses'])->name('view-courses');

    Route::get('/course/delete/{id}', [AdminController::class, 'courseDelete'])->name('course.delete');

    route::put('/admin/update-course-image/{id}', [AdminController::class, 'updateCourseImage'])->name('admin.update_course_image');

    // Route::get('/new-attachment', [AdminController::class , 'newAttachment'])->name('new-attachment');

    Route::get('/new-attachment', function () {
        return view('admin.new_attachment');
    })->name('new-attachment');

    Route::get('/view-attachments', [AdminController::class, 'viewAttachments'])->name('view-attachments');

    Route::post('/add-outline', [AdminController::class, 'addDownloadFile'])->name('admin.add_outline');

    Route::get('/outline/delete/{id}', [AdminController::class, 'outlineDelete'])->name('outline.delete');

    Route::get('/contact-messages', [AdminController::class, 'contactMessages'])->name('contact-messages');

    Route::get('/message/delete/{id}', [AdminController::class, 'messageDelete'])->name('message.delete');

    Route::get('/enrolled-students', [AdminController::class, 'enrolledStudents'])->name('enrolled-students');


    Route::get('/update-profile', function () {
        return view('admin.update_profile');
    })->name('update-profile');

    Route::post('/update-profile', [AdminController::class, 'updateProfile'])->name('admin.update_profile');

    Route::get('blogs', [BlogController::class, 'index'])->name('admin.blogs');

    Route::post('blogs', [BlogController::class, 'store'])->name('admin.blogs.store');

    Route::post('blogs/{id}', [BlogController::class, 'update'])->name('admin.blogs.edit');

    Route::get('blogs/{id}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');

    Route::get('blogs/{id}/comments', [BlogController::class, 'showComments'])->name('admin.blogs.comments');

    Route::get('blogs/comments/delete/{id}', [BlogController::class, 'deleteComment'])->name('admin.comment.delete');

    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::resource('software', ProgramSoftwareController::class);


    // Training calender


    Route::get('/admin/training-calendar', [TrainingCalenderController::class, 'index'])->name('admin.training_calendar.index');

    Route::post('admin/training-calendar', [TrainingCalenderController::class, 'store'])->name('admin.training_calendar.store');

    Route::get('/admin/training-calendar/{id}/edit', [TrainingCalenderController::class, 'edit'])->name('admin.training_calendar.edit');

    Route::post('/admin/training-calendar/{id}', [TrainingCalenderController::class, 'update'])->name('admin.training_calendar.update');

    Route::get('/admin/training-calendar/{id}/destroy', [TrainingCalenderController::class, 'destroy'])->name('admin.training_calendar.destroy');


    // PARTNERS


    Route::get('/admin/partners', [PartnerController::class, 'index'])->name('admin.partners');

    Route::post('admin/partners/add', [PartnerController::class, 'store'])->name('admin.partners.store');

    Route::get('/admin/partner/{id}/destroy', [PartnerController::class, 'partnerDelete'])->name('admin.partners.delete');


    // Software documents

    Route::get('software-documents', [SoftwareDocumentController::class, 'index'])->name('admin.software_documents.index');

    Route::post('software-documents/add', [SoftwareDocumentController::class, 'store'])->name('admin.software_documents.store');

    Route::get('software-documents/delete/{id}', [SoftwareDocumentController::class, 'destroy'])->name('admin.software_documents.destroy');

    Route::get('get-softwares-by-program/{program}', [SoftwareDocumentController::class, 'getSoftwaresByProgram'])->name('software_documents.get_softwares_by_program');

    Route::get('/admin/gallery/categories', [AdminController::class, 'manageCategories'])->name('add-categories');
    Route::post('/admin/gallery/categories', [AdminController::class, 'manageCategories'])->name('save-gallery-category');
    Route::get('/admin/gallery/categories/delete', [AdminController::class, 'manageCategories'])->name('delete-gallery-category');
    Route::get('/admin/testimonial', [AdminController::class, 'testimonials'])->name('testimonial.index');
    Route::post('/admin/testimonial', [AdminController::class, 'testimonials'])->name('testimonial.store');
    // SYSTEM ROUTES
    Route::get('/admin/system-task/{task}', [SystemController::class, 'handleSystemTask'])->name('admin.system-task');

    Route::get('/system/operations', function () {
        return view('admin.systems');
    })->name('admin.system.operations');
});