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
use App\Http\Controllers\AvaliableTimeController;
use App\Http\Controllers\LimitReservationsController;
use App\Http\Controllers\ManageReservationsController;
use App\Http\Controllers\ReservationController;
use App\Models\PendingReservation;
use Illuminate\Support\Facades\Mail;
use App\Mail\PendingReservation as MailPendingReservation;
use App\Http\Middleware\VerifyCsrfToken;
use GuzzleHttp\Middleware;

Route::get('/menu', [App\Http\Controllers\PublicIndexController::class, 'menu'])->name('public.menu');

Route::get('/book-a-table', [App\Http\Controllers\PublicIndexController::class, 'booking'])->name('public.booking');

Route::get('/choose-time', [App\Http\Controllers\PublicIndexController::class, 'time'])->name('public.choose-time');


Route::get('/contact', function () {
    return view('public.contact');
})->name('public.contact');

Route::get('/galery', function () {
    return view('public.galery');
})->name('public.galery');

Auth::routes();

Route::resource('/', PublicIndexController::class);

Route::resource('/reservation', ReservationController::class);

Route::post('/pending', [App\Http\Controllers\PendingReservationController::class, 'store'])->name('pending.store');

Route::get('/resend', [App\Http\Controllers\PendingReservationController::class, 'resend'])->name('pending.resend');

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('admin/reservations', ManageReservationsController::class);

    Route::resource('admin/food', FoodItemController::class);

    Route::resource('admin/category', CategoryItemController::class);
    
    Route::resource('admin/section', SectionItemController::class);
    
    Route::resource('admin/day-off', DaysOffController::class);
    
    Route::resource('admin/work-time', WorkTimeController::class);
    
    Route::resource('admin/date-off', DatesOffController::class);

    Route::resource('admin/staff', StaffController::class);

    Route::resource('admin/gallery', GalleryController::class);

    Route::resource('admin/time', AvaliableTimeController::class);

    Route::resource('admin/status', LimitReservationsController::class);

    Route::get('admin/reservation-settings', [App\Http\Controllers\LimitReservationsController::class, 'settings'])->name('reservation-settings');
});