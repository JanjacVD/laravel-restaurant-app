<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use function GuzzleHttp\Promise\all;

use App\Http\Controllers\FoodItemController;
use App\Http\Controllers\CategoryItemController;
use App\Http\Controllers\DaysOffController;
use App\Http\Controllers\SectionItemController;
use App\Http\Controllers\WorkTimeController;
use App\Http\Controllers\DatesOffController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicIndexController;


Route::get('/menu', [App\Http\Controllers\PublicIndexController::class, 'menu'])->name('public.menu');

Route::get('/contact', function () {
    return view('public.contact');
})->name('public.contact');

Route::get('/galery', function () {
    return view('public.galery');
})->name('public.galery');

Route::get('/book-a-table', function () {
    return view('public.book-a-table');
})->name('public.book-a-table');

Auth::routes();

Route::resource('/', PublicIndexController::class);

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('admin/food', FoodItemController::class);

    Route::resource('admin/category', CategoryItemController::class);
    
    Route::resource('admin/section', SectionItemController::class);
    
    Route::resource('admin/day-off', DaysOffController::class);
    
    Route::resource('admin/work-time', WorkTimeController::class);
    
    Route::resource('admin/date-off', DatesOffController::class);

    Route::resource('admin/staff', StaffController::class);

    Route::resource('admin/gallery', GalleryController::class);

});