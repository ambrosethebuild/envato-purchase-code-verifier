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
        $lastTime = (int) \Storage::get($this->getVCTimestampPath());
        return $now > $lastTime;
    }



    public function getVCTimestamp()
    {
        //
        if (!\Storage::exists($this->getVCTimestampPath())) {
            \Storage::put($this->getVCTimestampPath(), "");
        }
        return \Storage::get($this->getVCTimestampPath());
    }
    public function setVCTimestamp($value)
    {
        $this->getVCTimestamp();
        \Storage::put($this->getVCTimestampPath(), $value);
    }


    public function getVCTimestampPath()
    {
        return 'epvc/timestamp.text';
    }
}
