<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\myController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/home', function () {
    return view('/frontend_dashboard');
})->middleware(['auth'])->name('frontend');

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/product',[ProductController::class,'index']);

Route::controller(AdminController::class)->group(function(){
    Route::get('/admin_logout','destroy')->name('admin.logout');
    Route::get('/admin_profile','profile')->name('admin.profile');
    Route::get('/admin_edit_profile','editProfile')->name('admin.edit.profile');
    Route::post('/admin_store_profile','storeProfile')->name('admin.store.profile');

    // change_password

    Route::get('/change_password','ChangePassword')->name('password_change');
    Route::post('/update_password','updatePassword')->name('password_update');
});
Route::controller(HomeSliderController::class)->group(function(){
    Route::get('/home_slider','homeSlider')->name('home.slider');
    Route::post('/home_slider/update','homeSliderUpdate')->name('home.slider.update');
});