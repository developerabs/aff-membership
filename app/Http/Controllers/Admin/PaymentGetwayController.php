<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaypalGetway;
use App\Models\StripeGetway;

class PaymentGetwayController extends Controller
{
    public function view()
    {
        $data['PaypalGetway'] = PaypalGetway::find(1);
        $data['StripeGetway'] = StripeGetway::find(1);
        return view('admin.paymentGetway.index',$data);
    }
    public function paypalGetwayUpdate(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required',
            'client_secret' => 'required',
        ]);
        $data = PaypalGetway::find(1);
        $data->client_id = $request->client_id;   
        $data->client_secret = $request->client_secret;   
        $data->save();
        $notification = array(
            'message' => 'Paypal Getway Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('paymentGetway.view')->with($notification);
    }
    public function stripeGetwayUpdate(Request $request)
    {
        $validated = $request->validate([
            'stripe_key' => 'required',
            'stripe_secrite' => 'required',
        ]);
        $data = StripeGetway::find(1);
        $data->stripe_key = $request->stripe_key;   
        $data->stripe_secrite = $request->stripe_secrite;   
        $data->save();
        $notification = array(
            'message' => 'Stripe Getway Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('paymentGetway.view')->with($notification);
    }
}
