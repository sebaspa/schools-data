<?php

use App\Http\Controllers\BuildingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ElectricController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ServiceController;
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
Route::get('schools/images/buildings/{school}/{building}', [SchoolController::class, 'show_building_images'])->name('schools.show_building_images');
Route::post('schools/deletebuilding', [SchoolController::class, 'deletebuilding'])->name('schools.deletebuilding');
Route::patch('schools/updatebuildings/{school}', [SchoolController::class, 'updatebuildings'])->name('schools.updatebuildings');
Route::resource('schools', SchoolController::class)->names('schools');

Route::resource('buildings', BuildingController::class)->names('buildings');

Route::get('images/add-images-school-building/{school}/{building}', [ImageController::class, 'addimages_school_building'])->name('images.addimages_school_building');
Route::get('images/edit-images-school-building/{image}', [ImageController::class, 'editimages_school_building'])->name('images.editimages_school_building');
Route::patch('images/updatebuildings/{image}', [ImageController::class, 'updatebuildings'])->name('images.updatebuildings');
Route::post('images/storebuildings/{school}', [ImageController::class, 'storebuildings'])->name('images.storebuildings');
Route::delete('images/destroy/{image}', [ImageController::class, 'destroy'])->name('images.destroy');
//Route::resource('images', ImageController::class)->names('images');

Route::resource('services', ServiceController::class)->names('services');

Route::get('plans/create/{school}', [PlanController::class, 'create'])->name('plans.create');
Route::get('plans/show/{school}/{service_id?}', [PlanController::class, 'index'])->name('plans.index');
Route::resource('plans', PlanController::class, ['except' => ['create', 'index']])->names('plans');

Route::get('electrics/create/{school}', [ElectricController::class, 'create'])->name('electrics.create');
Route::get('electrics/show/{school}/{service_id?}', [ElectricController::class, 'index'])->name('electrics.index');
Route::resource('electrics', ElectricController::class, ['except' => ['create', 'index']])->names('electrics');
