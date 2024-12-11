<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/**
 * 主畫面
 */
Route::get('/', [DashboardController::class, 'index'])->middleware('checkLogin')->name('dashboard.index');

/**
 * 登入登出
 */
Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('login', [LoginController::class, 'doLogin'])->name('login.doLogin');
Route::get('logout', [LogoutController::class, 'logout'])->name('logout.logout');

/**
 * 註冊
 */
Route::get('register', [RegisterController::class, 'index'])->middleware('checkRegister')->name('register.index');
Route::post('register', [RegisterController::class, 'doRegister'])->middleware('checkRegister')->name('register.doRegister');

/**
 * 新增紀錄
 */
Route::get('record', [RecordController::class, 'index'])->middleware('checkLogin')->name('record.index');
Route::post('add', [RecordController::class, 'ajax_addRecord'])->middleware('checkLogin')->name('record.add');
