<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImportController;
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
Route::post('submit-login', [HomeController::class, 'postLogin'])->name('postLogin');
Route::post('submit-admin_submit_email', [HomeController::class, 'adminLogin'])->name('adminLogin');

Route::get('logout',[HomeController::class, 'logout'])->name('logout');
Route::get('admin_logout',[HomeController::class, 'admin_logout'])->name('admin_logout');
Route::post('/fileUpload', [ImportController::class, 'fileUpload'])->name('fileUpload');

Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/auth/login',[HomeController::class, 'login'])->name('auth.login');
    Route::get('dashboard',[HomeController::class, 'dashboard']);
    Route::get('/admin-dashboard',[HomeController::class, 'admin_dashboard'])->name('admin_dashboard');
    Route::get('/auth/admin_login',[HomeController::class, 'admin'])->name('auth.admin');
    Route::get('/import_add', [ImportController::class, 'import_add'])->name('import_add');
    Route::get('school_list', [SchoolController::class, 'school_list'])->name('school_list');
    Route::get('/school_edit/{id}', [SchoolController::class, 'school_edit'])
            ->name('school_edit.school_edit');
    Route::post('/update_school/{id}', [SchoolController::class, 'update_school'])->name('update_school');
    Route::post('submit-otp-verification-form', [HomeController::class, 'postVerify'])->name('postVerify');
});
