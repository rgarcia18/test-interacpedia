<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Companies\CompaniesController;
use App\Http\Controllers\Employees\EmployeesController;

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

Route::get('/',function(){
    return redirect()->route('login');
});

Route::get('login',[App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
Route::post('login',[App\Http\Controllers\Auth\LoginController::class,'login']);
Route::post('logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Route::group(['middleware'=>['auth'],'prefix'=>'admin'],function(){
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
    Route::resource('companies',CompaniesController::class);
    Route::resource('employees',EmployeesController::class);
});
Route::group(['middleware'=>['web']],function(){
    Route::get('lang/{lang}',function($lang){   
        session(['lang' => $lang]);
        return redirect()->back();
    })->where(['lang' => 'en|es']);    
});