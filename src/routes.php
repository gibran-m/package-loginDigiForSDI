<?php
use Illuminate\Support\Facades\Route;
use Smpl\Logindigiforsdi\Http\Controllers\LogindigiforsdiController;


    Route::get('/', function () {
        return view('login::index');
    })->name('login');