<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodsController extends Controller
{
    public function index()
    { 
        $data['allData'] = PaymentMethod::orderBy('id','desc')->get();
        return view('admin.paymentmethod.index',$data);
    }
    public function add()
    {
        $data['PaymentMethod'] = PaymentMethod::orderBy('id','desc')->get();
        return view('admin.paymentmethod.add',$data);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'img' => 'image|max:2048',
        ]);
        $data = new PaymentMethod(); 
        if($request->hasFile('img')){ 
            $image = $request->file('img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $path = 'upload/payment/';
            $save_url = 'upload/payment/'.$name_gen;
            $image->move($path, $name_gen);
            $data->img=$save_url;

        }
        $data->save();
        $notification = array(
            'message' => 'Payment Method Added Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('paymentMethods.view')->with($notification);
    }
    public function edit($id)
    { 
        $data['editData'] = PaymentMethod::find($id); 
        return view('admin.service.edit',$data);
    }
    public function update(Request $request, $id)
    { 
        $validated = $request->validate([
            'title' => 'required|max:255',
            'cat_id' => 'required|max:255',
            'details' => 'required',
            'price' => 'required|max:255',
            'delivery_days' => 'required|max:255', 
        ]);
        $data = PaymentMethod::find($id); 
        $data->title = $request->title;
        $data->slug = Str::of($request->title)->slug('-');
        $data->cat_id = $request->cat_id;
        $data->details = $request->details;
        $data->price = $request->price;
        $data->delivery_days = $request->delivery_days;
        $data->seo_keywords = $request->seo_keywords;
        $data->seo_description = $request->seo_description;
        $data->status = $request->status; 
        if($request->hasFile('service_img')){ 
            @unlink($data->service_img);
            $image = $request->file('service_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $path = 'upload/service/';
            $save_url = 'upload/service/'.$name_gen;
            $image->move($path, $name_gen);
            $data->service_img=$save_url;

        }
        $data->save();

        $notification = array(
            'message' => 'Services Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('services.view')->with($notification);
    }
    public function delete($id)
    {
        $data = PaymentMethod::find($id);
        $data->delete(); 
        $notification = array(
            'message' => 'Services Delete Successfully',
            'alert-type' => 'danger' 
        );
        return redirect()->route('services.view')->with($notification);
    } 
}
