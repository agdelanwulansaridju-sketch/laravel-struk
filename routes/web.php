<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReceiptController;

Route::get('/', function () {
    return redirect('/print-receipt');
});

Route::get('/print-receipt', [ReceiptController::class, 'printReceipt'])
    ->name('receipt.print');