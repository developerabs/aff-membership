<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomersController extends Controller
{
    public function index()
    { 
        $data['allData'] = User::orderBy('id','desc')->get();
        return view('admin.customers.index',$data);
    }
    
    public function suspendUnsuspend($id)
    {
        $data = User::find($id);
        if ($data->status == 0) {
            $data->status = 1;
        }else{
            $data->status = 0;
        }
        $data->save(); 
        $notification = array(
            'message' => 'Customer Starus Changed Successfully',
            'alert-type' => 'danger' 
        );
        return redirect()->route('customers.view')->with($notification);
    }
}
