<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
<<<<<<< HEAD
=======

require __DIR__.'/userAuth.php';
>>>>>>> 11fea32f78d14f690b53b014b9b51b63793b2e2f
