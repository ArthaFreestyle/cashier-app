<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\activitys;
use App\Http\Controllers\barang;
use App\Http\Controllers\searchController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Middleware\Role;

Route::middleware('guest')->group(function () {

    Route::get('/', [AuthenticatedSessionController::class, 'creates'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
    Route::middleware(Role::class)->group(function(){
        Route::get('register', [RegisteredUserController::class, 'create']);
        Route::get('activity',[activitys::class,'index']);
        Route::get('errorlog',[activitys::class,'errorlog']);
        Route::get('registeritem',[barang::class,'items']);
        Route::get('cashier',[barang::class,'index']);
        Route::get('invoice',[activitys::class,'invoice']);
        Route::get('access',[UserController::class,'access']);
        Route::get('addstock',[barang::class,'addstock']);
        Route::get('updatemember',[UserController::class,'edit']);
        Route::get('/role',[RoleController::class,'index']);
    });
    Route::get('menuconfig',[MenuController::class,'index']);
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::post('updatemember/delete',[UserController::class,'delete']);
    Route::get('updatemember/update/{id}',[UserController::class,'update']);
    Route::post('updatemember/updates',[UserController::class,'updates']);
    Route::post('registeritem',[barang::class,'registeritem'])->name('registeritem');
    Route::get('/ajax-autocomplete', [searchController::class, 'search']);
    Route::post('cart',[barang::class,'cart']);
    Route::post('changevalue',[barang::class,'changevalue']);
    Route::post('checkout',[barang::class,'checkout']);
    Route::get('invoice/{id}',[activitys::class,'viewinvoice']);
    Route::get('invoice/{id}/generate',[activitys::class,'generate']);
    Route::post('/select-sessions',[RoleController::class,'selectSessions']);
    Route::get('stock/update/{id}',[barang::class,'updatestock']);
    Route::get('Payments',[barang::class,'payment'])->name('payment');
    Route::post('/registerrole',[RoleController::class,'register']);
    Route::get('role/delete/{id}',[RoleController::class,'delete']);
    Route::post('/updaterole',[RoleController::class,'update']);
    Route::post('/registermenu',[MenuController::class,'register']);
    Route::get('menu/delete/{id}',[MenuController::class,'delete']);
    Route::post('/updatemenu',[MenuController::class,'update']);
});
