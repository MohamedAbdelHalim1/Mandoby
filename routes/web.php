<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\BasicServiceController;
use App\Http\Controllers\SubServiceController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Auth::routes();


//Route::get('/nationalities', [NationalityController::class, 'index'])->name('nationalities.index');
        // ->middleware(['auth', 'admin'])
        
Route::get('/', function () {
    return view('index');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard',[HomeController::class , 'index'])->name('dashboard.index');
    Route::get('/user-profile',[HomeController::class , 'get_user'])->name('dashboard.user');
    Route::post('/user-profile',[HomeController::class , 'update_user'])->name('update.dashboard.user');
    Route::post('/user-profile-photo',[HomeController::class , 'update_user_photo'])->name('dashboard.user.photo.upload');
    Route::get('/user-logout',[HomeController::class , 'logout'])->name('dashboard.logout');

    

    //Nationalities routes
    Route::get('/nationalities', [NationalityController::class, 'index'])->name('nationalities.index');
    Route::post('/nationalities', [NationalityController::class, 'store'])->name('nationality.store');
    Route::get('/nationality/{id}', [NationalityController::class, 'show'])->name('nationality.show');
    Route::post('/nationality/{id}', [NationalityController::class, 'store_universities'])->name('nationality.university.store');
    Route::get('/nationalities/{id}/edit', [NationalityController::class, 'edit']);
    Route::post('/nationalities/update', [NationalityController::class, 'update'])->name('nationality.upload');
    Route::delete('/nationalities/{id}', [NationalityController::class, 'delete']);
    Route::delete('/nationality/university/{nationalityId}/{universityId}', [NationalityController::class, 'delete_university']);


    //Bacic Services routes
    Route::get('/basic-service', [BasicServiceController::class, 'index'])->name('basic.service.index');
    Route::post('/basic-service', [BasicServiceController::class, 'store'])->name('basic.service.store');
    Route::get('/basic-service/{id}/edit', [BasicServiceController::class, 'edit']);
    Route::post('/basic-service/update', [BasicServiceController::class, 'update'])->name('basic.service.upload');
    Route::delete('/basic-service/{id}', [BasicServiceController::class, 'delete']);

    //Sub Services routes
    Route::get('/sub-service', [SubServiceController::class, 'index'])->name('sub.service.index');
    Route::post('/sub-service', [SubServiceController::class, 'store'])->name('sub.service.store');
    Route::get('/sub-service/{id}/edit', [SubServiceController::class, 'edit']);
    Route::post('/sub-service/update', [SubServiceController::class, 'update'])->name('sub.service.upload');
    Route::delete('/sub-service/{id}', [SubServiceController::class, 'delete']);


    //University routes
    Route::get('/university', [UniversityController::class, 'index'])->name('university.index');
    Route::post('/university', [UniversityController::class, 'store'])->name('university.store');
    Route::get('/university/{id}', [UniversityController::class, 'show'])->name('university.show');
    Route::get('/university/{id}/edit', [UniversityController::class, 'edit']);
    Route::post('/university/update', [UniversityController::class, 'update'])->name('university.upload');
    Route::delete('/university/{id}', [UniversityController::class, 'delete']);
    Route::get('/university-details', [UniversityController::class, 'create_details']);
    Route::post('/university-details/{id}', [UniversityController::class, 'store_details'])->name('university.store.details');
    Route::get('/details/{id}/edit', [UniversityController::class, 'details']);
    Route::post('/details/upload', [UniversityController::class, 'details_upload'])->name('details.upload');


    //faculty routes
    Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty.index');
    Route::post('/faculty/create', [FacultyController::class, 'store'])->name('faculty.store');
    Route::get('/faculty/{id}/edit', [FacultyController::class, 'edit']);
    Route::post('/faculty/update', [FacultyController::class, 'update'])->name('faculty.upload');
    Route::delete('/faculty/{id}', [FacultyController::class, 'delete']);
    Route::post('/faculty-filter', [FacultyController::class, 'filterData'])->name('filter.data');
    Route::post('/getFaculties' , [FacultyController::class, 'getFaculties']);



    //Major routes
    Route::get('/major', [MajorController::class, 'index'])->name('major.index');
    Route::get('/major/get-faculty',  [MajorController::class, 'get_faculties']); //university_id sent via AJAX in Request
    Route::post('/major/create',  [MajorController::class, 'store'])->name('major.store');
    Route::get('/major/{id}/edit',  [MajorController::class, 'edit']);
    Route::post('/major/upload',  [MajorController::class, 'update'])->name('major.upload');
    Route::delete('/major/{id}',  [MajorController::class, 'delete']);
    Route::post('/major-filter', [MajorController::class, 'filterData'])->name('filter.major.data');


    //Member routes
    Route::get('/member', [MemberController::class, 'index'])->name('member.index');
    Route::get('/member/{member_id}', [MemberController::class, 'show'])->name('member.details');
    Route::delete('/delete-photo/{id}', [MemberController::class, 'delete_photo'])->name('deletePhoto');
    Route::delete('/delete-order/{order_id}', [MemberController::class, 'delete_order'])->name('deleteOrder');
    Route::post('/member/{order_id}', [MemberController::class, 'store_photo'])->name('member.photo.store');
    Route::post('/member', [MemberController::class, 'store']);
    Route::get('/member/{id}/edit', [MemberController::class, 'edit']);
    Route::put('/member', [MemberController::class, 'update'])->name('member.store');
    Route::delete('/member/{id}', [MemberController::class, 'delete']);

    //Order routes
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::post('/updateRequirementStatus', [OrderController::class, 'updateRequirementStatus'])->name('update.req');

    //User routes
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');


    //News routes
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}/edit', [NewsController::class, 'edit']);
    Route::post('/news/upload', [NewsController::class, 'update'])->name('news.upload');
    Route::delete('/news/{id}', [NewsController::class, 'delete']);


    Route::get('/nationality-faculty-degree/{faculty_id}', [NationalityController::class, 'show_faculties_nationalities_degree'])->name('faculty.nationality.degree');
    Route::post('/nationality-faculty-degree/{faculty_id}', [NationalityController::class, 'add_degree_to_nationalities'])->name('add.faculty.nationality.degree');
    Route::delete('/nationality-faculty-degree/{faculty_id}/{nationality_id}', [NationalityController::class, 'deleteNationalityFromFaculty'])->name('deleteNationalityDegree');




});





