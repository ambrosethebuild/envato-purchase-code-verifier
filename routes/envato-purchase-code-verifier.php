<?php

use Illuminate\Support\Facades\Route;
use Ambrosethebuild\EnvatoPurchaseCodeVerifier\Http\Livewire\VerifyComponent;

Route::middleware('web')->group(function () {
    //verification-page
    Route::get('verify-purchase-code', VerifyComponent::class)->name('verify.purchase.code');
});
