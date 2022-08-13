<?php

use App\Http\Controllers\frontend\FrontController;
use App\Http\Controllers\backend\BackController;
use App\Http\Controllers\backend\TrainingConsultingController;
use App\Http\Controllers\backend\CourseContentController;
use App\Http\Controllers\backend\ProjectController;
use App\Http\Controllers\backend\GalleryController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\MailController;
use App\Http\Controllers\backend\TeamController;
use App\Http\Controllers\frontend\ForumAnswerController;
use App\Http\Controllers\frontend\ForumController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [FrontController::class, 'index'])->name('homepage');
Route::get('/about', [FrontController::class, 'about'])->name('aboutpage');
Route::get('/project', [FrontController::class, 'project'])->name('projectpage');
Route::get('/gallery', [FrontController::class, 'gallery'])->name('gallerypage');
Route::resource('forum', ForumController::class);
Route::resource('answer', ForumAnswerController::class);
// Route::get('/forum/forum-name-here', [FrontController::class, 'forum_single'])->name('forum_single_page');
Route::get('/training_and_consulting/{slug}', [FrontController::class, 'training_consulting_single'])->name('training_consulting_single');
Route::get('/blog', [FrontController::class, 'blog'])->name('blogpage');
Route::get('/blog/{slug}', [FrontController::class, 'blog_single'])->name('blog_single');
Route::get('/team/{id}', [FrontController::class, 'team_single'])->name('team_single');
Route::get('/contact', [FrontController::class, 'contact'])->name('contactpage');
Route::post('/contact/store', [FrontController::class, 'store_contact'])->name('store_contact');



/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
*/

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [BackController::class, 'index'])->name('admin_dashboard');
    Route::get('/profile', [BackController::class, 'admin_profile'])->name('admin_profile');
    Route::post('/profile/update', [BackController::class, 'update_admin_profile'])->name('update_admin_profile');
    Route::post('/update-password', [BackController::class, 'updatePassword'])->name('updatePassword');
    Route::resource('training_consulting', TrainingConsultingController::class);
    Route::resource('course_content', CourseContentController::class);
    Route::get('course_content/showModal/{id}', [CourseContentController::class, 'showModal']);
    Route::resource('project', ProjectController::class);
    Route::resource('team', TeamController::class);
    Route::resource('/blog', BlogController::class);
    Route::resource('/gallery', GalleryController::class);
    Route::resource('/mail', MailController::class);
});

require __DIR__ . '/auth.php';
