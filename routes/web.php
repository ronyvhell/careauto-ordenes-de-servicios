<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdenesPublicController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/ordenes/public/{public_token}', [OrdenesPublicController::class, 'show'])->name('ordenes.public');

