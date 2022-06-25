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

        $code = \Storage::get($this->getVerificationCodePath());
        $code = setting('epv.verifier.code', $code);
        return $code;
    }
    public function setVerificationCode($value)
    {
        \Storage::put($this->getVerificationCodePath(), $value);
        setting(['epv.verifier.code' => $value])->save();
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
        $lastTime = (int) setting('epv.verifier.timestamp', $lastTime);
        return $now > $lastTime;
    }



    public function getVCTimestamp()
    {
        //
        if (!\Storage::exists($this->getVCTimestampPath())) {
            \Storage::put($this->getVCTimestampPath(), "");
        }

        $time = \Storage::get($this->getVCTimestampPath());
        $time = setting('epv.verifier.timestamp', $time);
        return $time;
    }
    public function setVCTimestamp($value)
    {
        $this->getVCTimestamp();
        \Storage::put($this->getVCTimestampPath(), $value);
        setting(['epv.verifier.timestamp' => $value])->save();
    }


    public function getVCTimestampPath()
    {
        return 'epvc/timestamp.text';
    }
}
