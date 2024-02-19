<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Language\LanguageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



    Route::get('/', function () {
        return view('welcome');
    });


    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

require __DIR__.'/auth.php';


        Route::controller(DashboardController::class)->group(function(){

                Route::get('/home', 'index')->middleware(['auth', 'verified'])->middleware('rolecheck')->name('index');
                Route::get('/logout', 'logout')->name('logout');
                Route::get('/profile/change', 'profile_change')->middleware(['auth', 'verified'])->middleware('rolecheck')->name('profile_change');
                Route::post('/update/profile/change/{user_id}', 'update_profile_change')->middleware('rolecheck')->name('update_profile_change');

        });

        Route::controller(LanguageController::class)->group(function(){

            Route::get('language', 'language')->middleware('rolecheck')->name('language');
            Route::get('lang/{lang}', 'switchLang')->middleware('rolecheck')->name('lang.switch');

        });

        Route::fallback(function(){
            return view('errors.404');
        });

