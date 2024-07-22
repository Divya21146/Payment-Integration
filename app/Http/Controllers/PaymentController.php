<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Easebuzz\PayWithEasebuzzLaravel\PayWithEasebuzzLib;

class PaymentController extends Controller
{
    private $easebuzz;

    public function __construct()
    {
        $MERCHANT_KEY = "2PBP7IABZ2";
        $SALT = "DAH88E3UWQ";
        $ENV = "test";
        $this->easebuzz = new PayWithEasebuzzLib($MERCHANT_KEY, $SALT, $ENV);
    }

    public function initiatePayment(Request $request): View
    {
        $user = $request->user();
        $data = [
            'txnid' => uniqid(),
            'amount' => 100,
            'firstname' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'productinfo' => "Test Payment",
            'surl' => route('payment.callback'),
            'furl' => route('payment.callback'),
        ];

        $result = $this->easebuzz->initiatePaymentAPI($data, true);
        return view('payment', ['paymentForm' => $result]);
    }

    public function paymentCallback(Request $request): View
    {
        \Log::info('Callback received', $request->all());
        
        $param = $request->post();
        $response = $this->easebuzz->easebuzzResponse($param);

        \Log::info('Easebuzz response', $response);

        return view('payment-complete', ['response' => $response]);
    }

}
