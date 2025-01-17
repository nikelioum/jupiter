<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PromoterController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PromoterMiddleware;
use Illuminate\Http\Request;


//Index page
Route::get('/', [PagesController::class, 'index'])->name('promoter.login.form');

//Promoter Login
Route::post('/promoter-login', [PromoterController::class, 'promoterLogin']);

//Promoter Logout
Route::post('/promoter-logout', [PromoterController::class, 'promoterLogout'])->name('promoter.logout');


// Protected Routes for Promoters
Route::middleware(PromoterMiddleware::class)->group(function () {
    // Route::get('/promoter-dashboard', [PagesController::class, 'promoter_dashboard'])->name('promoter.dashboard');
    Route::get('/select-customer', [PagesController::class, 'selectCustomerPage'])->name('select.customer');
    Route::post('/set-customer', [PagesController::class, 'setCustomer'])->name('set.customer');
    Route::get('/products', [PagesController::class, 'productsPage'])->name('products');
    Route::post('/reset-customer', [PagesController::class, 'resetCustomer'])->name('reset.customer');
});