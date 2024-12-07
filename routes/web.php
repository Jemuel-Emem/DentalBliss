<?php

use App\Http\Middleware\admin;
use App\Http\Middleware\user;
use App\Http\Controllers\authlogout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->is_admin == 1) {
            return redirect()->route('Admindashboard');
        } else {
            return redirect()->route('user-dashboard');
        }
    })->name('dashboard');
});


Route::prefix('admin')->middleware(['auth', admin::class])->group(function () {
    Route::get('/Admindashboard', function () {
        return view('admin.index');
    })->name('Admindashboard');

    Route::get('/Appointments', function () {
        return view('admin.appointments');
    })->name('apps');

    Route::get('/Prescriptions', function () {
        return view('admin.prescription');
    })->name('pres');

    Route::get('/History', function () {
        return view('admin.history');
    })->name('histor');


    Route::get('/payment', function () {
        return view('admin.payment');
    })->name('pays');

    Route::get('/approved', function () {
        return view('admin.approved');
    })->name('appro');
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logouts');

});


Route::prefix('user')->middleware(['auth', user::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.index');
    })->name('user-dashboard');

    Route::get('/appointment', function () {
        return view('user.appointment');
    })->name('appointment');

    Route::get('/status', function () {
        return view('user.status');
    })->name('statuss');

    Route::get('/payment', function () {
        return view('user.payment');
    })->name('pay');

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');

});


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


require __DIR__.'/auth.php';
