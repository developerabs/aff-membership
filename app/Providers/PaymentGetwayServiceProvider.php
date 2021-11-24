<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\PaypalGetway;

class PaymentGetwayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $PaypalGetway = PaypalGetway::pluck('client_id', 'client_secret');
        config()->set(['app.PaypalGetway' => $PaypalGetway->toArray()]);
    }
}
