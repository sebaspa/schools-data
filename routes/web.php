<?php

use App\Http\Controllers\AirconditioningController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\BuildingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ElectricController;
use App\Http\Controllers\HeatingController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SolarController;
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

Route::get('audit', [AuditController::class, 'index'])->name("audit.index");
Route::get('audit/get', [AuditController::class, 'get'])->name('audit.get');

Route::get('/dashboard', [DashboardController::class, 'index'])->name("dashboard");

Route::get('profile', [UserController::class, 'profile'])->name('users.profile');
Route::post('users/updateprofile', [UserController::class, 'updateprofile'])->name('users.updateprofile');
Route::get('users/get', [UserController::class, 'get'])->name('users.get');
Route::get('users/export/', [UserController::class, 'export'])->name('users.export');
Route::resource('users', UserController::class)->names('users');

Route::resource('roles', RoleController::class)->names('roles');

Route::get('schools/get', [SchoolController::class, 'get'])->name('schools.get');
Route::get('schools/images/buildings/{school}/{building}', [SchoolController::class, 'show_building_images'])->name('schools.show_building_images');
Route::post('schools/deletebuilding', [SchoolController::class, 'deletebuilding'])->name('schools.deletebuilding');
Route::patch('schools/updatebuildings/{school}', [SchoolController::class, 'updatebuildings'])->name('schools.updatebuildings');
Route::get('schools/export/', [SchoolController::class, 'export'])->name('schools.export');
Route::resource('schools', SchoolController::class)->names('schools');

Route::get('buildings/school/{school}', [BuildingController::class, 'index_by_school'])->name('buildings.index_by_school');
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

Route::get('solars/create/{school}', [SolarController::class, 'create'])->name('solars.create');
Route::get('solars/show/{school}/{service_id?}', [SolarController::class, 'index'])->name('solars.index');
Route::resource('solars', SolarController::class, ['except' => ['create', 'index']])->names('solars');

Route::get('airconditionings/create/{school}', [AirconditioningController::class, 'create'])->name('airconditionings.create');
Route::get('airconditionings/show/{school}/{service_id?}', [AirconditioningController::class, 'index'])->name('airconditionings.index');
Route::resource('airconditionings', AirconditioningController::class, ['except' => ['create', 'index']])->names('airconditionings');

Route::get('heatings/create/{school}', [HeatingController::class, 'create'])->name('heatings.create');
Route::get('heatings/show/{school}/{service_id?}', [HeatingController::class, 'index'])->name('heatings.index');
Route::resource('heatings', HeatingController::class, ['except' => ['create', 'index']])->names('heatings');
