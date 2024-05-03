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


Route::get('/nationalities', [NationalityController::class, 'index'])
        ->middleware(['auth', 'admin'])
        ->name('nationalities.index');


Route::middleware(['auth'])->group(function () {
    Route::get('/',[HomeController::class , 'index']);
    //Nationalities routes
    Route::post('/nationalities', [NationalityController::class, 'store'])->name('nationality.store');
    Route::get('/nationalities/{id}/edit', [NationalityController::class, 'edit']);
    Route::put('/nationalities/{id}', [NationalityController::class, 'update']);
    Route::delete('/nationalities/{id}', [NationalityController::class, 'delete']);

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
    Route::post('/university-details/{id}', [UniversityController::class, 'store_details']);


    //faculty routes
    Route::get('/faculty', [FacultyController::class, 'index']);
    Route::get('/u/{id}/faculty', [FacultyController::class, 'show_faculty']);
    Route::get('/u/{id}/faculty/create', [FacultyController::class, 'create']);
    Route::post('/u/{id}/faculty/create', [FacultyController::class, 'store']);
    Route::get('/faculty/{id}/edit', [FacultyController::class, 'edit']);
    Route::put('/faculty/{id}/edit', [FacultyController::class, 'update']);
    Route::delete('/faculty/{id}', [FacultyController::class, 'delete']);


    //Major routes
    Route::get('/major', [MajorController::class, 'index']);
    Route::get('/major/get-faculty',  [MajorController::class, 'get_faculties']); //university_id sent via AJAX in Request
    Route::post('/major/create',  [MajorController::class, 'store']);
    Route::get('/major/{id}/edit',  [MajorController::class, 'edit']);
    Route::put('/major/{id}/edit',  [MajorController::class, 'update']);
    Route::delete('/major/{id}',  [MajorController::class, 'delete']);

    //Member routes
    Route::get('/member', [MemberController::class, 'index']);
    Route::post('/member', [MemberController::class, 'store']);
    Route::get('/member/{id}/edit', [MemberController::class, 'edit']);
    Route::put('/member/{id}', [MemberController::class, 'update']);
    Route::delete('/member/{id}', [MemberController::class, 'delete']);

    //Order routes
    Route::get('/order', [OrderController::class, 'index']);
    Route::get('/order/{id}', [OrderController::class, 'show']);


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





