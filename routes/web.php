<?php

use App\Http\Controllers\Admin\Maincontroller;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\Users\logincontroller;
use App\Http\Controllers\ProductController;
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


Route::post('/forgot-password', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\CalculationController::class, 'index']);
Route::post('/calculate', [App\Http\Controllers\CalculationController::class, 'calculate']);


Route::get('/tamgiac', [App\Http\Controllers\TamgiacController::class, 'area']);
Route::post('/tinh', [App\Http\Controllers\TamgiacController::class, 'tamgiac']);
Route::post('/tinh', [App\Http\Controllers\TamgiacController::class, 'tugiac']);

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php

Route::post('/products', 'ProductController@store')->name('products.store');


Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// routes/web.php

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
