<?php

namespace Ambrosethebuild\EnvatoPurchaseCodeVerifier\Providers;

use Illuminate\Support\ServiceProvider;
use Ambrosethebuild\EnvatoPurchaseCodeVerifier\Traits\VerificationHelperTrait;

class EnvatoPurchaseCodeVerifierServiceProvider extends ServiceProvider
{

    use VerificationHelperTrait;
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/envato-purchase-code-verifier.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'envato-purchase-code-verifier');

        //
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../../config/config.php' => config_path('epcv.php'),
            ], 'config');
        }
        //verify component
        \Livewire::component('verify-component', \Ambrosethebuild\EnvatoPurchaseCodeVerifier\Http\Livewire\VerifyComponent::class);

        //check for verification 
        if (!app()->runningInConsole()) {
            $verificationCode = $this->getVerificationCode();
            if (empty($verificationCode)) {
                $currentRoute = url()->full();
                if (!str_contains($currentRoute, "/verify-purchase-code") && !str_contains($currentRoute, "/livewire/message/verify-component")) {
                    redirect("verify-purchase-code")->send();
                }
            }

            //reverify purchase at random (more like every 3days)
            if($this->shouldRunPurchaseVerification() ){
                $this->reverifyPurchaseCode();
            }
        }
    }


    //
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'epcv');
    }
}
