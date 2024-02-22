<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


route::get('/',[AuthController::class,'LoadRegister']);
route::post('/register',[AuthController::class,'Register'])->name('register');
route::get('/login',[AuthController::class,'LoadLogin']);
route::post('/login',[AuthController::class,'Login'])->name('login');
