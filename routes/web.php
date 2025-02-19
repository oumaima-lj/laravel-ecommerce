<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notes',[apprenantController::class,'notes'])->name('notes');
