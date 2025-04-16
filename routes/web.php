<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VisterController;
use Illuminate\Support\Facades\Route;


Route::get('/' , function(){
    return redirect()->route('admin.index');
});

Route::Put('/visiter/{id}/ishere'    , [VisterController::class , 'isHer'])->name('visiter.isHer');
Route::Put('/visiter/{id}/isnothere' , [VisterController::class , 'isNotHer'])->name('visiter.isNotHer');
Route::resource('visiter', VisterController::class);


Route::middleware('guest')->group(function() {
    Route::get('/dashbord', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/dashbord', [AuthController::class, 'login']);

});


Route::prefix('admin')->middleware('auth')->name('admin.')->group(function() {

    Route::get('/' , [AdminController::class , 'index'] )->name('index');
    Route::get('/create' , [AdminController::class , 'create'] )->name('create');
    Route::post('/' , [AdminController::class , 'store'] )->name('store');

    Route::get('logout' , [AuthController::class , 'logout'])->name('logout');

});

