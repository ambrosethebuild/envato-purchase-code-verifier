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
        $requestHost = $this->getDomain(request()->getHttpHost());
        logger("request", [request(), $requestHost]);
        $ignoreDomain = in_array($requestHost, ["fuodz.edentech.online",'fuodz-admin.test', 'localhost'],'127.0.0.1');

        if (!app()->runningInConsole() && !$ignoreDomain) {
            $verificationCode = $this->getVerificationCode();
            if (empty($verificationCode)) {
                $currentRoute = url()->full();
                // logger("currentRoute", [$currentRoute]);
                if (!str_contains($currentRoute, "/verify-purchase-code") && !str_contains($currentRoute, "livewire")) {
                    redirect("verify-purchase-code")->send();
                }
            }

            //reverify purchase at random (more like every 3days)
            if($this->shouldRunPurchaseVerification() ){
                $this->reverifyPurchaseCode();
            }
        }
    }

    protected function getDomain($host){
        $myhost = strtolower(trim($host));
        $count = substr_count($myhost, '.');
        if($count === 2){
          if(strlen(explode('.', $myhost)[1]) > 3) $myhost = explode('.', $myhost, 2)[1];
        } else if($count > 2){
          $myhost = $this->getDomain(explode('.', $myhost, 2)[1]);
        }
        return $myhost;
      }


    //
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'epcv');
    }
}
