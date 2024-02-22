<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


route::get('/',[AuthController::class,'LoadRegister']);
route::post('/register',[AuthController::class,'Register'])->name('register');


route::get('/login',[AuthController::class,'LoadLogin']);
route::post('/login',[AuthController::class,'Login'])->name('login');

route::middleware(['web','admin'])->name('admin.')->prefix('admin')->group(function(){
    route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
});

route::middleware(['web','user'])->name('user.')->prefix('user')->group(function(){
    route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
});
