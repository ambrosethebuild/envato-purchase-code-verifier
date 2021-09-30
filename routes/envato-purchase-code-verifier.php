<?php

use Illuminate\Support\Facades\Route;
use Ambrosethebuild\EnvatoPurchaseCodeVerifier\Http\Controllers\VerifyController;

Route::middleware('web')->group(function () {
    //verification-page
    Route::get('verify-purchase-code', [VerifyController::class,'index'])->name('verify.purchase.code');
});