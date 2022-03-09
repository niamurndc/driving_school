<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('welcome');
Route::get('/course', [App\Http\Controllers\FrontController::class, 'course'])->name('course');
Route::get('/road-sign', [App\Http\Controllers\FrontController::class, 'roadSign']);
Route::get('/dash-icon', [App\Http\Controllers\FrontController::class, 'dashIcon']);
Route::get('/notice', [App\Http\Controllers\FrontController::class, 'notice']);
Route::get('/youtube', [App\Http\Controllers\FrontController::class, 'youtube']);

Route::get('/course/{slug}', [App\Http\Controllers\FrontController::class, 'viewCourse']);
Route::get('/course/{slug}/content/{id}', [App\Http\Controllers\FrontController::class, 'content']);

// front page route
// ************************
Route::get('/profile', [App\Http\Controllers\FrontUserController::class, 'profile'])->name('profile');
Route::post('/profile', [App\Http\Controllers\FrontUserController::class, 'profileUpdate']);
Route::get('/my-course', [App\Http\Controllers\FrontUserController::class, 'mycourse'])->name('my-course');
Route::get('/certificate', [App\Http\Controllers\FrontUserController::class, 'certificate'])->name('my-course');
Route::get('/get-certificate/{id}', [App\Http\Controllers\FrontUserController::class, 'getcertificate'])->name('my-course');

Route::get('/enrollment/{id}', [App\Http\Controllers\FrontUserController::class, 'enrollment']);
Route::post('/enrollment/{id}', [App\Http\Controllers\FrontUserController::class, 'submitOrder']);

Route::get('/exam/{id}', [App\Http\Controllers\FrontUserController::class, 'exam']);
Route::get('/exam-question/{id}', [App\Http\Controllers\FrontUserController::class, 'examQuestion']);
Route::post('/exam/{id}', [App\Http\Controllers\FrontUserController::class, 'submitExam']);


// front page route
// ************************

Route::get('/contact', [App\Http\Controllers\FrontController::class, 'contact'])->name('contact');
Route::get('/terms', [App\Http\Controllers\FrontController::class, 'terms'])->name('terms');
Route::get('/privacy', [App\Http\Controllers\FrontController::class, 'privacy'])->name('privacy');
Route::get('/return', [App\Http\Controllers\FrontController::class, 'return'])->name('return');

Route::get('/home', [App\Http\Controllers\FrontUserController::class, 'mycourse'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('admin');

Auth::routes();
Route::get('/forgot-password', [App\Http\Controllers\Auth\UserPassController::class, 'index'])->name('forgot');
Route::post('/forgot-password', [App\Http\Controllers\Auth\UserPassController::class, 'makeCode'])->name('forgot.post');
Route::post('/reset-pass', [App\Http\Controllers\Auth\UserPassController::class, 'resetPass'])->name('reset.pass');
Route::get('/verify', [App\Http\Controllers\Auth\UserPassController::class, 'varify'])->middleware('auth');
Route::post('/verify', [App\Http\Controllers\Auth\UserPassController::class, 'varifyCode'])->middleware('auth')->name('verify');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// admin road sign route
// ************************

Route::get('/admin/icons', [App\Http\Controllers\RoadSignController::class, 'index']);
Route::post('/admin/icon/create', [App\Http\Controllers\RoadSignController::class, 'store']);
Route::get('/admin/icon/edit/{id}', [App\Http\Controllers\RoadSignController::class, 'edit']);
Route::post('/admin/icon/edit/{id}', [App\Http\Controllers\RoadSignController::class, 'update']);
Route::get('/admin/icon/delete/{id}', [App\Http\Controllers\RoadSignController::class, 'delete']);

// admin dash sign route
// ************************

Route::get('/admin/dashicons', [App\Http\Controllers\DashIconController::class, 'index']);
Route::post('/admin/dashicon/create', [App\Http\Controllers\DashIconController::class, 'store']);
Route::get('/admin/dashicon/edit/{id}', [App\Http\Controllers\DashIconController::class, 'edit']);
Route::post('/admin/dashicon/edit/{id}', [App\Http\Controllers\DashIconController::class, 'update']);
Route::get('/admin/dashicon/delete/{id}', [App\Http\Controllers\DashIconController::class, 'delete']);

// admin course route
// ************************

Route::get('/admin/courses', [App\Http\Controllers\CourseController::class, 'index']);
Route::get('/admin/course/create', [App\Http\Controllers\CourseController::class, 'create']);
Route::post('/admin/course/create', [App\Http\Controllers\CourseController::class, 'store']);
Route::get('/admin/course/edit/{id}', [App\Http\Controllers\CourseController::class, 'edit']);
Route::post('/admin/course/edit/{id}', [App\Http\Controllers\CourseController::class, 'update']);
Route::get('/admin/course/delete/{id}', [App\Http\Controllers\CourseController::class, 'delete']);

// admin course view route
// ************************

Route::get('/admin/course/view/{id}', [App\Http\Controllers\CourseViewController::class, 'index']);
Route::get('/admin/course/student/{id}', [App\Http\Controllers\CourseViewController::class, 'student']);

// admin content route
// ************************

Route::get('/admin/content/add/{id}', [App\Http\Controllers\ContentController::class, 'add']);
Route::post('/admin/content/add/{id}', [App\Http\Controllers\ContentController::class, 'store']);
Route::get('/admin/content/edit/{id}', [App\Http\Controllers\ContentController::class, 'edit']);
Route::post('/admin/content/edit/{id}', [App\Http\Controllers\ContentController::class, 'update']);
Route::get('/admin/content/delete/{id}', [App\Http\Controllers\ContentController::class, 'delete']);

// admin exam route
// ************************

Route::get('/admin/exams', [App\Http\Controllers\ExamController::class, 'index']);
Route::get('/admin/exam/add', [App\Http\Controllers\ExamController::class, 'add']);
Route::post('/admin/exam/add', [App\Http\Controllers\ExamController::class, 'store']);
Route::get('/admin/exam/view/{id}', [App\Http\Controllers\ExamController::class, 'view']);
Route::get('/admin/exam/edit/{id}', [App\Http\Controllers\ExamController::class, 'edit']);
Route::post('/admin/exam/edit/{id}', [App\Http\Controllers\ExamController::class, 'update']);
Route::get('/admin/exam/delete/{id}', [App\Http\Controllers\ExamController::class, 'delete']);

// admin exam question route
// ************************

Route::post('/admin/exam-question/add/{id}', [App\Http\Controllers\ExamQuestionController::class, 'store']);
Route::get('/admin/exam-question/delete/{id}', [App\Http\Controllers\ExamQuestionController::class, 'delete']);

// admin exam route
// ************************

Route::get('/admin/enrollments', [App\Http\Controllers\EnrollmentController::class, 'index']);
Route::get('/admin/enrollment/edit/{id}', [App\Http\Controllers\EnrollmentController::class, 'edit']);
Route::get('/admin/enrollment/delete/{id}', [App\Http\Controllers\EnrollmentController::class, 'delete']);

// admin link route
// ************************

Route::get('/admin/links', [App\Http\Controllers\UsefulLinkController::class, 'index']);
Route::get('/admin/link/create', [App\Http\Controllers\UsefulLinkController::class, 'create']);
Route::post('/admin/link/create', [App\Http\Controllers\UsefulLinkController::class, 'store']);
Route::get('/admin/link/edit/{id}', [App\Http\Controllers\UsefulLinkController::class, 'edit']);
Route::post('/admin/link/edit/{id}', [App\Http\Controllers\UsefulLinkController::class, 'update']);
Route::get('/admin/link/delete/{id}', [App\Http\Controllers\UsefulLinkController::class, 'delete']);


// admin link route
// ************************

Route::get('/admin/youtubes', [App\Http\Controllers\YoutubeController::class, 'index']);
Route::get('/admin/youtube/create', [App\Http\Controllers\YoutubeController::class, 'create']);
Route::post('/admin/youtube/create', [App\Http\Controllers\YoutubeController::class, 'store']);
Route::get('/admin/youtube/edit/{id}', [App\Http\Controllers\YoutubeController::class, 'edit']);
Route::post('/admin/youtube/edit/{id}', [App\Http\Controllers\YoutubeController::class, 'update']);
Route::get('/admin/youtube/delete/{id}', [App\Http\Controllers\YoutubeController::class, 'delete']);

// admin notice route
// ************************

Route::get('/admin/notices', [App\Http\Controllers\NoticeController::class, 'index']);
Route::get('/admin/notice/create', [App\Http\Controllers\NoticeController::class, 'create']);
Route::post('/admin/notice/create', [App\Http\Controllers\NoticeController::class, 'store']);
Route::get('/admin/notice/edit/{id}', [App\Http\Controllers\NoticeController::class, 'edit']);
Route::post('/admin/notice/edit/{id}', [App\Http\Controllers\NoticeController::class, 'update']);
Route::get('/admin/notice/delete/{id}', [App\Http\Controllers\NoticeController::class, 'delete']);

// Admin Backup Route
// ************************

Route::get('/admin/backups', [App\Http\Controllers\BackupController::class, 'index']);
Route::get('/admin/backup/create', [App\Http\Controllers\BackupController::class, 'store']);
Route::get('/admin/backup/download/{file_name}', [App\Http\Controllers\BackupController::class, 'download']);
Route::get('/admin/backup/delete/{file_name}', [App\Http\Controllers\BackupController::class, 'delete']);

// Admin Slider Route
// ************************

Route::get('/admin/sliders', [App\Http\Controllers\SliderController::class, 'index']);
Route::post('/admin/slider/create', [App\Http\Controllers\SliderController::class, 'store']);
Route::get('/admin/slider/edit/{id}', [App\Http\Controllers\SliderController::class, 'edit']);
Route::post('/admin/slider/edit/{id}', [App\Http\Controllers\SliderController::class, 'update']);
Route::get('/admin/slider/delete/{id}', [App\Http\Controllers\SliderController::class, 'delete']);

// Admin Setting Route
// ************************

Route::get('/admin/settings', [App\Http\Controllers\SettingController::class, 'index']);
Route::post('/admin/setting/edit', [App\Http\Controllers\SettingController::class, 'edit']);

// Admin profile Route
// ************************

Route::get('/admin/profile', [App\Http\Controllers\AdminProfileController::class, 'index']);
Route::post('/admin/profile/edit', [App\Http\Controllers\AdminProfileController::class, 'edit']);

// Admin Page Route
// ************************

Route::get('/admin/pages', [App\Http\Controllers\PageController::class, 'index']);
Route::post('/admin/page/edit', [App\Http\Controllers\PageController::class, 'edit']);

// Admin Feature Route
// ************************

Route::get('/admin/feature', [App\Http\Controllers\FeatureController::class, 'index']);
Route::post('/admin/feature/edit', [App\Http\Controllers\FeatureController::class, 'edit']);