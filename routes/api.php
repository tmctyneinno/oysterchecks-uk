<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    \Log::info('Middleware hit', ['route' => $request->path()]);
    return $request->user();
}); 

require __DIR__.'/userAuth.php';
Route::post('debug-test', function(Request $request) {
    \Log::info('Debug Test', $request->all());
    return response()->json(['status' => 'logged']);
});