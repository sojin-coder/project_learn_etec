<?php

use App\Http\Controllers\OneToOneController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OneToManyController;
use Illuminate\Support\Facades\Route;

// Route::controller(ProductController::class)->group(function(){
//     Route::get('/', 'index')->name('all');
//     Route::get('/find', 'find')->name('find');
//     Route::get('/create', 'create')->name('create');
//     Route::get('/update', 'update')->name('update');
//     Route::get('/delete', 'delete')->name('delete');

// });

// Route::get('/',[OneToOneController::class, 'index']);
Route::controller(OneToManyController::class)->group(function () {
    Route::get('/', 'index');
});


