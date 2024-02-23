<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


route::get('/',[AuthController::class,'LoadRegister']);
route::post('/',[AuthController::class,'Register'])->name('register');
route::get('/login',function(){
    return view('/');
});


route::get('/login',[AuthController::class,'LoadLogin']);
route::post('/login',[AuthController::class,'Login'])->name('login');
Route::get('/logout',[AuthController::class,'logout']);


route::middleware(['web','admin'])->name('admin.')->prefix('admin')->group(function(){
    route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
});

route::middleware(['web','user'])->name('user.')->prefix('user')->group(function(){
    route::get('/welcome',[UserController::class,'index'])->name('welcome');
});
