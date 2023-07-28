<?php

use Lib\Route;
use App\Controllers\ContactController;
use App\Controllers\HomeController;

Route::get('/', [HomeController::class,'index']);
Route::get('/contact', [ContactController::class,'index']);
Route::get('/contact/create', [ContactController::class,'create']);
Route::post('/contact',[ContactController::class,'store']);
Route::get('/contact/:id', [ContactController::class,'show']);
Route::get('/contact/:id/edit', [ContactController::class,'edit']);
Route::post('/contact/:id', [ContactController::class,'update']);
Route::post('/contact/:id/delete', [ContactController::class,'destroy']);
// Route::get('/about', function(){
//     return 'hola desde la pagina about';
// });


// Route::get('/course/:slug',function ($slug){
//     # code...
//     return 'el curso es : ' . $slug;
// });


Lib\Route::dispatch();