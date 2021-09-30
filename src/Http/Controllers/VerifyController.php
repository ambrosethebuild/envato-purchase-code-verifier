<?php

namespace Ambrosethebuild\EnvatoPurchaseCodeVerifier\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class VerifyController extends Controller
{
    public function index()
    {
        return view('envato-purchase-code-verifier::verify');
    }

}
