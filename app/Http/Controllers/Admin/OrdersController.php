<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use DB;

class OrdersController extends Controller
{
    public function index()
    { 
        $data['serviceData'] = DB::table('orders')
                    ->join('users', 'users.id', '=', 'orders.customer_id') 
                    ->join('services', 'services.id', '=', 'orders.service_id') 
                    ->select('orders.*', 'users.name as u_name','services.title')
                    ->orderby('id','desc')
                    ->where('orderTypw',0)
                    ->get();  
        $data['packageData'] = DB::table('orders')
                    ->join('users', 'users.id', '=', 'orders.customer_id') 
                    ->join('package_categories', 'package_categories.id', '=', 'orders.service_id')  
                    ->select('orders.*', 'users.name as u_name','package_categories.cat_name')
                    ->where('orders.customer_id',Auth::user()->id)
                    ->where('orders.orderTypw',1)
                    ->orderby('id','desc')
                    ->get();   
        return view('admin.orders.index',$data);
    }
    public function activeInactive($id)
    {
        $data = Order::find($id);
        if ( $data->status == 0) {
            $data->status = 1;
        }else if($data->status == 1){
            $data->status = 2;
        }
        $data->save(); 
        $notification = array(
            'message' => 'Services Status Changed  Successfully',
            'alert-type' => 'warning' 
        );
        return redirect()->route('orders.view')->with($notification);
    }
}
