<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Stripe;
use App\Models\PaypalGetway;
use App\Models\StripeGetway;

class PaypalController extends Controller
{
    private $_api_context;
    
    public function __construct()
    {
            
        $PaypalGetway = PaypalGetway::find(1); 
        $this->_api_context = new ApiContext(new OAuthTokenCredential($PaypalGetway->client_id, $PaypalGetway->client_secret));
         
    }

    public function payWithPaypal()
    {
        return view('frontend.order.stripesuccess');
    }
      /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('frontend.order.stripesuccess');
    }

    public function postPaymentWithpaypal(Request $request)
    {
        $validated = $request->validate([
            'paymentType' => 'required',
            'amount' => 'required',
        ]);
        $StripeGetway = StripeGetway::find(1);
        $Order = new Order();
        $Order->order_id = hexdec(uniqid()); 
        $Order->service_id = $request->service_id;
        $Order->paymentType = $request->paymentType;
        $Order->customer_id = Auth::user()->id; 
        $Order->amount = $request->amount;
        if ( $request->orderTypw == 'package' ) {
            $Order->orderTypw = 1;
        }
        
        if ($request->paymentType == 'paypal') { 
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            $item_1 = new Item();

            $item_1->setName($Order->order_id)
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice($request->get('amount'));

            $item_list = new ItemList();
            $item_list->setItems(array($item_1));

            $amount = new Amount();
            $amount->setCurrency('USD')
                ->setTotal($request->get('amount'));

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Enter Your transaction description');

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::route('status'))
                ->setCancelUrl(URL::route('status'));

            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));            
            try {
                $payment->create($this->_api_context);
            } catch (\PayPal\Exception\PPConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    \Session::put('error','Connection timeout');
                    return Redirect::route('paywithpaypal');                
                } else {
                    \Session::put('error','Some error occur, sorry for inconvenient');
                    return Redirect::route('paywithpaypal');                
                }
            }

            foreach($payment->getLinks() as $link) {
                if($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }
            
            Session::put('paypal_payment_id', $payment->getId());
            
             $Order->paypal_payment_id = Session::get('paypal_payment_id');

            if(isset($redirect_url)) {     
                $Order->save();       
                return Redirect::away($redirect_url);
            }

            \Session::put('error','Unknown error occurred');
            
            return Redirect::route('paywithpaypal');
        }
        if ($request->paymentType == 'stripe') {
            $validated = $request->validate([
                'card_name' => 'required',
                'card_number' => 'required',
                'cvc' => 'required',
                'exp_month' => 'required',
                'exp_year' => 'required',
            ]); 
            $Order->card_name = $request->card_name;
            $Order->card_number = $request->card_number;
            $Order->cvc = $request->cvc;
            $Order->exp_month = $request->exp_month;
            $Order->exp_year = $request->exp_year;
            Stripe\Stripe::setApiKey($StripeGetway->stripe_secrite);
            Stripe\Charge::create ([
                    "amount" => 100*$request->amount,
                    "currency" => "usd",
                    "source" => "tok_mastercard",
                    "description" => "Test payment from boostbo.com." 
            ]);
      
            Session::flash('success', 'Payment successful!');
            $Order->save();
            return Redirect::route('paymentSuccessStripe');
        }
        
        
        
        
        
        
    }

    public function getPaymentStatus(Request $request)
    {        
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::route('paywithpaypal');
        }
        $payment = Payment::get($payment_id, $this->_api_context);        
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));        
        $result = $payment->execute($execution, $this->_api_context);
        
        if ($result->getState() == 'approved') {         
            \Session::put('success','Payment success !!');
            return Redirect::route('paywithpaypal');
        }

        \Session::put('error','Payment failed !!');
		return Redirect::route('paywithpaypal');
    }

    public function paymentSuccessStripe()
    {
        return view('frontend.order.stripesuccess');
    }
}
