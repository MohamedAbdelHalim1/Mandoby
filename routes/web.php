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
    Route::get('/dashboard',[HomeController::class , 'index']);
    //Nationalities routes
    Route::get('/nationalities', [NationalityController::class, 'index'])->name('nationalities.index');
    Route::post('/nationalities', [NationalityController::class, 'store'])->name('nationality.store');
    Route::get('/nationality/{id}', [NationalityController::class, 'show'])->name('nationality.show');
    Route::post('/nationality/{id}', [NationalityController::class, 'store_universities'])->name('nationality.university.store');
    Route::get('/nationalities/{id}/edit', [NationalityController::class, 'edit']);
    Route::post('/nationalities/upload', [NationalityController::class, 'update'])->name('nationality.upload');
    Route::delete('/nationalities/{id}', [NationalityController::class, 'delete']);
    Route::delete('/nationality/university/{nationalityId}/{universityId}', [NationalityController::class, 'delete_university']);


    //Bacic Services routes
    Route::get('/basic-service', [BasicServiceController::class, 'index'])->name('basic.service.index');
    Route::post('/basic-service', [BasicServiceController::class, 'store'])->name('basic.service.store');
    Route::get('/basic-service/{id}/edit', [BasicServiceController::class, 'edit']);
    Route::put('/basic-service/{id}', [BasicServiceController::class, 'update']);
    Route::delete('/basic-service/{id}', [BasicServiceController::class, 'delete']);

    //Sub Services routes
    Route::get('/sub-service', [SubServiceController::class, 'index'])->name('sub.service.index');
    Route::post('/sub-service', [SubServiceController::class, 'store'])->name('sub.service.store');
    Route::get('/sub-service/{id}/edit', [SubServiceController::class, 'edit']);
    Route::put('/sub-service/{id}', [SubServiceController::class, 'update']);
    Route::delete('/sub-service/{id}', [SubServiceController::class, 'delete']);


    //University routes
    Route::get('/university', [UniversityController::class, 'index'])->name('university.index');
    Route::post('/university', [UniversityController::class, 'store'])->name('university.store');
    Route::get('/university/{id}', [UniversityController::class, 'show'])->name('university.show');
    Route::get('/university/{id}/edit', [UniversityController::class, 'edit']);
    Route::put('/university/{id}/edit', [UniversityController::class, 'update']);
    Route::delete('/university/{id}', [UniversityController::class, 'delete']);
    Route::get('/university-details', [UniversityController::class, 'create_details']);
    Route::post('/university-details/{id}', [UniversityController::class, 'store_details'])->name('university.store.details');


    //faculty routes
    Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty.index');
    Route::post('/faculty/create', [FacultyController::class, 'store'])->name('faculty.store');
    Route::get('/faculty/{id}/edit', [FacultyController::class, 'edit']);
    Route::put('/faculty/{id}/edit', [FacultyController::class, 'update']);
    Route::delete('/faculty/{id}', [FacultyController::class, 'delete']);
    Route::post('/faculty-filter', [FacultyController::class, 'filterData'])->name('filter.data');
    Route::post('/getFaculties' , [FacultyController::class, 'getFaculties']);



    //Major routes
    Route::get('/major', [MajorController::class, 'index'])->name('major.index');
    Route::get('/major/get-faculty',  [MajorController::class, 'get_faculties']); //university_id sent via AJAX in Request
    Route::post('/major/create',  [MajorController::class, 'store'])->name('major.store');
    Route::get('/major/{id}/edit',  [MajorController::class, 'edit']);
    Route::put('/major/{id}/edit',  [MajorController::class, 'update']);
    Route::delete('/major/{id}',  [MajorController::class, 'delete']);
    Route::post('/major-filter', [MajorController::class, 'filterData'])->name('filter.major.data');


    //Member routes
    Route::get('/member', [MemberController::class, 'index']);
    Route::post('/member', [MemberController::class, 'store']);
    Route::get('/member/{id}/edit', [MemberController::class, 'edit']);
    Route::put('/member/{id}', [MemberController::class, 'update']);
    Route::delete('/member/{id}', [MemberController::class, 'delete']);

    //Order routes
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::post('/updateRequirementStatus', [OrderController::class, 'updateRequirementStatus'])->name('update.req');

    //User routes
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user', [UserController::class, 'store']);


    //News routes
    Route::get('/news', [NewsController::class, 'index']);
    Route::post('/news', [NewsController::class, 'store']);
    Route::get('/news/{id}/edit', [NewsController::class, 'edit']);
    Route::put('/news/{id}', [NewsController::class, 'update']);
    Route::delete('/news/{id}', [NewsController::class, 'delete']);

});





