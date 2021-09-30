<?php

namespace Ambrosethebuild\EnvatoPurchaseCodeVerifier\Http\Livewire;

use Ambrosethebuild\EnvatoPurchaseCodeVerifier\Traits\VerificationHelperTrait;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class VerifyComponent extends Component
{

    use VerificationHelperTrait;
    public $purchase_code;
    public $buy_username;
    public $verified = false;
    

    public function mount(){
        $verificationCode = $this->getVerificationCode();
        if(!empty($verificationCode)){
            $this->verified = true;
        }
    }
    public function render()
    {
        return view('envato-purchase-code-verifier::livewire.verify-component');
    }

    public function verifyPurchase()
    {
        $this->validate(
            [
                "purchase_code" => "required|string",
                "buy_username" => "required|string",
            ],
        );

        //validate
        $this->resetErrorBag();

        //verify the purchase from our api
        $apiEndPoint = config("epcv.api_endpoint");
        $validateApi = config("epcv.validate_api");

        //first verify purchase code
        $response = Http::get($apiEndPoint . "" . $validateApi, [
            'code' => $this->purchase_code,
            'username' => $this->buy_username,
        ]);
        //
        if ($response->successful()) {
            $verificationCode = $response->json()["verification-code"];
            //save verification code
            $this->setVerificationCode($verificationCode);
            //
            $this->verified = true;
        } else {
            $this->addError('form', $response->json()["message"] ?? "Purchase code verification failed");
        }
    }






   

}
