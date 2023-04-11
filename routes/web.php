<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LanguageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('shortcode')->group(function(){
Route::get('owner-list',[OwnerController::class,'index']);
Route::get('car-list',[CarController::class,'index'])->middleware('loggedIn');
Route::get('setLanguage/{language}', [LanguageController::class, 'setLanguage'])->name("setLanguage");
Route::middleware('loggedIn','role')->group(function (){


Route::get('add-owner',[OwnerController::class,'addOwner']);
Route::post('save-owner',[OwnerController::class,'saveOwner']);
Route::get('edit-owner/{id}',[OwnerController::class,'editOwner']);
Route::post('update-owner',[OwnerController::class,'updateOwner']);
Route::get('delete-owner/{id}',[OwnerController::class,'deleteOwner']);
Route::middleware('loggedIn')->group(function (){
Route::get('add-car',[CarController::class,'addCar']);
Route::post('save-car',[CarController::class,'saveCar']);
Route::get('edit-car/{id}',[CarController::class,'editCar']);
Route::post('update-car/{id}',[CarController::class,'updateCar']);
Route::get('delete-car/{id}',[CarController::class,'deleteCar']);
Route::get('delete-image/{image}',[CarController::class,'deleteImage']);
});
});

Route::post('/car/search',[CarController::class,'search'])->name('car.search');
Route::post('/owner/search',[OwnerController::class,'search'])->name('owner.search');

Route::get('login',[AuthController::class,'index'])->name('login');
Route::post('post-login',[AuthController::class,'postLogin'])->name('login.post');
Route::get('registration',[AuthController::class,'registration'])->name('register');
Route::post('post-registration',[AuthController::class,'postRegistration'])->name('register.post');
Route::get('dashboard',[AuthController::class,'dashboard']);
Route::get('logout',[AuthController::class,'logout'])->name('logout');
});
