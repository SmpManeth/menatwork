<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
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

Route::get('/linkstorage', function () {
    Illuminate\Support\Facades\Artisan::call('storage:link');
});

Route::get('/', function () {
    if (auth()->check() && auth()->user()->user_type === "Admin") {
        return redirect()->route('admin');
    } else if (auth()->check()) {
        return redirect()->route('step-two');
    }

    return view('dashboard');
})->name('dashboard');




Route::middleware('auth')->group(function () {


    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');

    Route::post('/update_user', [ApplicationController::class, 'update_user'])->name('update_user');
    Route::get('/admin', [ApplicationController::class, 'show_users'])->name('admin');
    Route::get('/step-three', [ApplicationController::class, 'show_step_three'])->name('stepthree');
    Route::get('/admin/users/{id}/edit', [ApplicationController::class, 'edit_user'])->name('admin_edit');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('step-two', [ApplicationController::class, 'store_step_two'])->name('step-two');
    Route::post('step-three', [ApplicationController::class, 'store_step_three'])->name('step-three');
    Route::post('upload-epmloyeeagreement', [ApplicationController::class, 'epmloyeeagreement'])->name('upload-epmloyeeagreement');
    Route::post('/stepfour', [ApplicationController::class, 'store_step_four'])->name('stepfour');
    Route::get('/stepfour', [ApplicationController::class, 'show_step_four'])->name('stepfour');
    Route::get('/step-two', function () {
        return view('steptwo');
    })->name('steptwo');
});

require __DIR__ . '/auth.php';
