<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::controller(CustomerController::class)->group(function () {
    Route::get('/', 'index');
    Route::prefix('customers')->group(function() {
       Route::get('create', 'create');
       Route::post('/', 'store');  
    });
});
