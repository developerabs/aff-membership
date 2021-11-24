<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    public function serviceOrderDetails($id)
    {
        $data['orderId'] = $id;
        return view('admin.orderDetails.serviceOrderDetails',$data);
    }
    public function packageDetails($id)
    {
        $data['orderId'] = $id;
        return view('admin.orderDetails.packageOrderDetails',$data);
    }
    public function servicePrint($id)
    {
        $data['orderId'] = $id;
        return view('admin.orderDetails.serviceOrderPrint',$data);
    }
    public function packagePrint($id)
    {
        $data['orderId'] = $id;
        return view('admin.orderDetails.packageOrderPrint',$data);
    }
}
