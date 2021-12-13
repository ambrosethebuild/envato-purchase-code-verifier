<?php

namespace Ambrosethebuild\EnvatoPurchaseCodeVerifier\Traits;


use Illuminate\Support\Facades\Http;

trait VerificationHelperTrait
{

    //Setter && getter 
    public function getVerificationCode()
    {
        //
        if (!\Storage::exists($this->getVerificationCodePath())) {
            \Storage::put($this->getVerificationCodePath(), "");
        }
        return \Storage::get($this->getVerificationCodePath());
    }
    public function setVerificationCode($value)
    {
        \Storage::put($this->getVerificationCodePath(), $value);
    }

    public function getVerificationCodePath()
    {
        return 'epvc/vc.text';
    }





    ///
    public function shouldRunPurchaseVerification()
    {
        //
        $now = time();

        //
        if (!\Storage::exists($this->getVCTimestampPath())) {
            \Storage::put($this->getVCTimestampPath(), $now);
        }
        $lastTime = \Storage::get($this->getVCTimestampPath());

        //
        $timelapse = $now - $lastTime;
        //every 45days at least
        return $timelapse >= (86400 * 45);
    }


    public function reverifyPurchaseCode()
    {
        $apiEndPoint = config("epcv.api_endpoint");
        $purchaseVerifyApi = config("epcv.purchase_verify_api");

        $response = Http::withHeaders([
            'origin' => url(''),
        ])->get($apiEndPoint . "" . $purchaseVerifyApi, [
            'code' => $this->getVerificationCode(),
        ]);

        if (!$response->successful()) {
            $this->setVerificationCode("");
        } else {
            \Storage::put($this->getVCTimestampPath(), time());
        }
    }

    public function getVCTimestampPath()
    {
        return 'epvc/timestamp.text';
    }
}
