<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
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
    if (auth()->check() && auth()->user()->user_type === "admin") {
        return redirect()->route('admin');
    } else if (auth()->check()) {
        return redirect()->route('step-two');
    }



    return view('dashboard');
})->name('dashboard');

Route::post('/session', [StripeController::class, 'session'])->name('session');
Route::post('/session_two', [StripeController::class, 'session_two'])->name('session_two');
Route::post('/session_three', [StripeController::class, 'session_three'])->name('session_three');
Route::get('/success', [StripeController::class, 'success'])->name('success');


Route::middleware('auth')->group(function () {



    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', function () {
            return view('admin');
        })->name('admin');
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::post('/update_user', [ApplicationController::class, 'update_user'])->name('update_user');
        Route::get('/admin', [ApplicationController::class, 'show_users'])->name('admin');
    });


    Route::get('/step-three', [ApplicationController::class, 'show_step_three'])->name('stepthree');
    Route::get('/admin/users/{id}/edit', [ApplicationController::class, 'edit_user'])->name('admin_edit');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('step-two', [ApplicationController::class, 'store_step_two'])->name('step-two');
    Route::get('step_three_post', [ApplicationController::class, 'store_step_three'])->name('step_three_post');
    Route::post('upload-epmloyeeagreement', [ApplicationController::class, 'epmloyeeagreement'])->name('upload-epmloyeeagreement');
    Route::get('/stepfour_post', [ApplicationController::class, 'store_step_four'])->name('stepfour_post');
    Route::get('/stepfour', [ApplicationController::class, 'show_step_four'])->name('stepfour');
    Route::get('/stepfive', [ApplicationController::class, 'show_stepfive'])->name('stepfive');
    Route::post('/stepfive', [ApplicationController::class, 'store_step_five'])->name('stepfive');
    Route::get('/stepsix', [ApplicationController::class, 'show_stepsix'])->name('stepsix');

    Route::get('/step-two', function () {
        return view('steptwo');
    })->name('steptwo');
    Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');
});

require __DIR__ . '/auth.php';
