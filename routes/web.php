<?php

use App\Http\Controllers\Admin\Maincontroller;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\Users\logincontroller;
use Illuminate\Support\Facades\Route;



Route::get('admin/users/login',[logincontroller::class,'index']) -> name('login');
Route::post('admin/users/login/store',[logincontroller::class,'store']);
// Auth::routes();
Route::middleware(['auth'])->group(function(){

    Route::prefix('admin')->group(function(){

        Route::get('main',[Maincontroller::class,'index']);
        Route::get('/',[Maincontroller::class,'index'])  -> name('admin');
    
        # menu
        Route::prefix('menus')->group(function(){
            Route::get('add',[MenuController::class,'create']);
        });
    });

  
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});
