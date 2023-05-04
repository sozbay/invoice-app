<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::group(['prefix' => 'invoice'], function () {
    Route::get('list', [InvoiceController::class, 'list'])->name('invoice-list');
    Route::get('add', [InvoiceController::class, 'add'])->name('invoice-add');
    Route::post('invoice-form', [InvoiceController::class, 'invoiceForm'])->name('invoice-form');
    Route::get('edit/{id}', [InvoiceController::class, 'edit'])->name('invoice-edit');
    Route::get('print/{id}', [InvoiceController::class, 'print'])->name('invoice-print');
    Route::get('preview/{id}', [InvoiceController::class, 'preview'])->name('invoice-preview');
    Route::get('send-mail/{id}', [InvoiceController::class, 'sendInvoice'])->name('invoice-mail');
    Route::post('get-customer', [InvoiceController::class, 'getCustomer'])->name('get-customer');
});

