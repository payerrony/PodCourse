<?php

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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/contact', [App\Http\Controllers\WelcomeController::class, 'contact'])->name('contact');
Route::get('/about', [App\Http\Controllers\WelcomeController::class, 'about'])->name('about');
Route::get('/course', [App\Http\Controllers\WelcomeController::class, 'course'])->name('course');

Route::get('/course_detail/{id}', [App\Http\Controllers\WelcomeController::class, 'course_detail'])->name('course_detail');
Route::get('/refund', [App\Http\Controllers\WelcomeController::class, 'refund'])->name('refund');
Route::get('/privacy', [App\Http\Controllers\WelcomeController::class, 'privacy'])->name('privacy');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function() {
Route::get('/admin', [App\Http\Controllers\WelcomeController::class, 'admin'])->name('admin');
Route::get('/mycourse', [App\Http\Controllers\WelcomeController::class, 'Userdash'])->name('mycourse');
Route::get('/coursewatch/{id}', [App\Http\Controllers\WelcomeController::class, 'CourseWatch'])->name('coursewatch');

Route::post('/markComplete', [App\Http\Controllers\WatchHistoryController::class, 'store'])->name('markComplete');

//user

Route::get('/user', [App\Http\Controllers\Controller::class, 'index'])->name('user');


//course  admin area
Route::get('/course_index', [App\Http\Controllers\CourseController::class, 'index'])->name('course_index');
Route::post('/courseStore', [App\Http\Controllers\CourseController::class, 'store'])->name('courseStore');
Route::get('/course_update/{id}', [App\Http\Controllers\CourseController::class, 'edit'])->name('course_update');

Route::post('/courseEdit/{id}', [App\Http\Controllers\CourseController::class, 'update'])->name('courseEdit');

Route::post('/courseDelete/{id}', [App\Http\Controllers\CourseController::class, 'destroy'])->name('courseDelete');
//section
Route::get('/section_index', [App\Http\Controllers\SectionController::class, 'index'])->name('section_index');
Route::post('/sectionStore', [App\Http\Controllers\SectionController::class, 'store'])->name('sectionStore');
Route::post('/sectionEdit/{id}', [App\Http\Controllers\SectionController::class, 'update'])->name('sectionEdit');

Route::post('/sectionDelete/{id}', [App\Http\Controllers\SectionController::class, 'destroy'])->name('sectionDelete');


//class
Route::get('/class_index', [App\Http\Controllers\ClassController::class, 'index'])->name('class_index');

Route::post('/classStore', [App\Http\Controllers\ClassController::class, 'store'])->name('classStore');
Route::post('/classEdit/{id}', [App\Http\Controllers\ClassController::class, 'update'])->name('classEdit');

Route::post('/classDelete/{id}', [App\Http\Controllers\ClassController::class, 'destroy'])->name('classDelete');


});