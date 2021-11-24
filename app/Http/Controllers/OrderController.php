<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\PackageCategory;

class OrderController extends Controller
{
    public function serviceOrder($id)
    {
        $data['ServiceData'] = Service::find($id);
        return view('frontend.order.service-order-page',$data);
    }
    public function serviceCheckout()
    {
        return view('frontend.order.checkout-page');
    }
    public function packageOrder($id)
    {
        $data['PackageCategoryData'] = PackageCategory::find($id);
        return view('frontend.order.package-order-page',$data);
    }
}
