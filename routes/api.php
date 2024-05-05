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
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;

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


// Authentication Apis
Route::post('register', [RegisterController::class, 'user_register']);
Route::post('login', [LoginController::class, 'user_login']);
Route::post('logout', [LogoutController::class, 'user_logout']);

//Nationalities Apis
Route::get('/nationalities', [NationalityController::class, 'get_nationalities']);

//Bacic Services Apis
Route::get('/basic-service', [BasicServiceController::class, 'get_basic_services']);

//Sub Services Apis
Route::get('/bs/{id}/sub-service', [SubServiceController::class, 'get_sub_services']);

//University Apis
Route::get('/university', [UniversityController::class, 'get_universities']);
Route::get('/university/{id}', [UniversityController::class, 'university_details']);
Route::get('/university-search', [UniversityController::class, 'search']);


//faculty Apis
Route::get('u/{id}/faculty', [FacultyController::class, 'get_faculties']);

//Major Apis
Route::get('/f/{id}/major', [MajorController::class, 'get_majors']);
Route::get('/f/major/{id}', [MajorController::class, 'show_major_requirement_and_qualification']);

//Order Apis
Route::get('/order', [OrderController::class, 'myorder'])->middleware('auth:api');
Route::post('/order-requirement-photos', [OrderController::class, 'uploadrequirements'])->middleware('auth:api');
Route::post('/order-package/{id}', [OrderController::class, 'updatepackage'])->middleware('auth:api');





