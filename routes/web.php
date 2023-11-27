<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


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
    return view('website.home.main');
});

Route::get('/userdashboard', function () {
    return view('website.home.userDashboard');
})->middleware(['auth', 'verified','admin:1']);


Route::middleware(['auth','verified','admin:2'])->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('dashboard', 'index')->name('admin.dashboard');
    });
});    

Route::middleware(['auth','verified','admin:2'])->group(function(){
    Route::controller(UserController::class)->group(function(){
        Route::get('dashboard/user', 'index')->name('admin.dashboard.all');
        Route::get('dashboard/user/add','add')->name('admin.dashboard.add');
        Route::get('dashboard/user/edit/{slug}','edit')->name('admin.dashboard.edit');
        Route::get('dashboard/user/view/{slug}','view')->name('admin.dashboard.view');
        Route::get('dashboard/user/inactiveUser','inactive_user')->name('admin.dashboard.inactive.user');
        Route::get('dashboard/user/notVerifiedUser','ntVerified_user')->name('admin.dashboard.not.verified.user');
        Route::post('dashboard/user/submit','insert')->name('admin.dashboard.user.submit');
        Route::post('dashboard/user/update','update')->name('admin.dashboard.user.update');
        Route::get('dashboard/user/status/{id}','status')->name('admin.dashboard.active.user');
        Route::get('dashboard/user/de_status/{id}','de_status')->name('admin.dashboard.inactive.user');
        // Route::get('dashboard/user/search','search')->name('user.search');
        Route::get('admin/user/pdf','pdf')->name('admin.user.pdf');

    });
});

Route::middleware(['auth','verified','admin:1'])->group(function(){
    Route::controller(ProfileController::class)->group(function(){
        Route::get('website/home/edit_profile/{slug}','edit')->name('user.dashboard.edit');
        Route::get('website/home/view_profile/{slug}','view')->name('user.dashboard.view');
        Route::post('website/home/profile/update','update')->name('user.profile.update');
        Route::get('website/home/profile/profile_pdf/{slug}','pdf')->name('profile.pdf');

    });
});

Route::get('dashboard/role', [RoleController::class, 'index']);
Route::get('dashboard/role/add', [RoleController::class, 'add']);
Route::get('dashboard/role/edit/{slug}', [RoleController::class, 'edit']);
Route::get('dashboard/role/view/{id}', [RoleController::class, 'view']);
Route::post('dashboard/role/submit', [RoleController::class, 'insert']);
Route::post('dashboard/role/update', [RoleController::class, 'update']);

require __DIR__.'/auth.php';
