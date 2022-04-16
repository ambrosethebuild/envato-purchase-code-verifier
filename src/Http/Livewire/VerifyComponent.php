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
    public $alert_email;
    public $verified = false;


    public function mount()
    {
        $verificationCode = $this->getVerificationCode();
        if (!empty($verificationCode) && !$this->shouldRunPurchaseVerification()) {
            $this->verified = true;
        }else{
            // $this->purchase_code = setting('epv.code','');
            // $this->buy_username = setting('epv.username','');
            // $this->alert_email = setting('epv.email','');
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
        $response = Http::withHeaders([
            'origin' => url(''),
        ])->get($apiEndPoint . "" . $validateApi, [
            'app_id' => config('backend.app_id'),
            'code' => $this->purchase_code,
            'username' => $this->buy_username,
            'email' => $this->alert_email,
            "timezone" => setting('timeZone', 'UTC') ?? 'UTC',
        ]);
        //
        if ($response->successful()) {
            $verificationCode = $response->json()["verification-code"];
            //save verification code
            $this->setVerificationCode($verificationCode);
            //save timeline for next notification
            $timeline = $response->json()["timestamp"] ?? (time() + (86400 * 45));
            $this->setVCTimestamp($timeline);
            $this->verified = true;

            //save
            setting([
                "epv" => [
                    "code" => $this->purchase_code,
                    "username" => $this->buy_username,
                    "email" => $this->alert_email,
                ]
            ])->save();

        } else {
            $this->addError('form', $response->json()["message"] ?? "Purchase code verification failed");
        }
    }
}
