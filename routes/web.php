<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ElectricMeterController;
use App\Http\Controllers\FlatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\PermisionToRouteController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionToRoleController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home.page');

Route::middleware('guest')->group(function(){
    Route::get('/login', [HomeController::class, 'login'])->name('login.page');
    Route::post('/login-post', [HomeController::class, 'loginPost'])->name('login.post');
});



Route::middleware('admin')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::resource('user',UserController::class);
    Route::resource('role',RoleController::class);
    Route::resource('permission',PermissionController::class);
    Route::resource('permission_to_role',PermissionToRoleController::class);
    Route::resource('permission_to_route', PermisionToRouteController::class);
    Route::resource('houses', HouseController::class);    
    Route::resource('tenants', TenantController::class);
    Route::resource('rents', RentController::class);
    Route::resource('flats', FlatController::class);
    Route::get('/flat-list/{id}', [FlatController::class, 'flatList'])->name('flat.list');
    Route::get('/flat-details/{id}', [FlatController::class, 'flatDetails'])->name('flat.details');
    Route::resource('electricitys', ElectricMeterController::class);
    Route::get('electric-bill-create', [ElectricMeterController::class, 'billCreate'])->name('electric.bill.create');
    Route::post('electric-bill-store', [ElectricMeterController::class, 'billStore'])->name('electric.bill.store');
    Route::get('/rent/report', [RentController::class, 'dueReport'])->name('rents.due-report');
    Route::get('/rents/billCheck/{id}', [RentController::class, 'billCheck'])->name('rents.bill-check');
    Route::get('/rents/invoice/{id}', [RentController::class, 'generateInvoice'])->name('rents.invoice');
    Route::get('/get-tenant-flat-details/{id}', [TenantController::class, 'getTenentFlatDetails'])->name('tenant.flat.details');

});
