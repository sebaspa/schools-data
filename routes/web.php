<?php

use App\Http\Controllers\BuildingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\DB;

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
/*
DB::listen(function ($query) {
    //var_dump($query->sql);
    //echo "<div class='container'><pre>{$query->sql}</pre></div>";
    //echo "<div class='container'><pre>{$query->time}</pre></div>";
});
*/

Route::get('/', function () {
    return redirect()->to('dashboard');
});

Route::get('/login', function () {
    return view("user.login");
})->name("login")->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name("dashboard");

Route::get('profile', [UserController::class, 'profile'])->name('users.profile');
Route::post('users/updateprofile', [UserController::class, 'updateprofile'])->name('users.updateprofile');
Route::get('users/get', [UserController::class, 'get'])->name('users.get');
Route::resource('users', UserController::class)->names('users');

Route::resource('roles', RoleController::class)->names('roles');

Route::get('schools/get', [SchoolController::class, 'get'])->name('schools.get');
Route::post('schools/deletebuilding', [SchoolController::class, 'deletebuilding'])->name('schools.deletebuilding');
Route::resource('schools', SchoolController::class)->names('schools');

Route::resource('buildings', BuildingController::class)->names('buildings');

Route::post('images/storebuildings', [ImageController::class, 'storebuildings'])->name('images.storebuildings');
Route::resource('images', ImageController::class)->names('images');
