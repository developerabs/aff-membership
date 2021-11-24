<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\Category;

class ServiceController extends Controller
{
    public function index()
    {  
        $data['allData'] = DB::table('services')
                    ->join('categories', 'categories.id', '=', 'services.cat_id') 
                    ->select('services.*', 'categories.name as cat_name') 
                    ->orderby('id','desc')
                    ->get(); 
        return view('admin.service.index',$data);
    }
    public function add()
    {
        $data['Category'] = Category::orderBy('id','desc')->get();
        return view('admin.service.add',$data);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'cat_id' => 'required|max:255',
            'details' => 'required',
            'price' => 'required|max:255',
            'delivery_days' => 'required|max:255',
            'service_img' => 'image|max:2048',
        ]);
        $data = new Service();
        $data->auth_id = Auth::user()->id;
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
            $image = $request->file('service_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $path = 'upload/service/';
            $save_url = 'upload/service/'.$name_gen;
            $image->move($path, $name_gen);
            $data->service_img=$save_url;

        }
        $data->save();
        $notification = array(
            'message' => 'Services Added Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('services.view')->with($notification);
    }
    public function edit($id)
    { 
        $data['editData'] = Service::find($id);
        $data['Category'] = Category::orderBy('id','desc')->get();
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
        $data = Service::find($id); 
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
        $data = Service::find($id);
        $data->delete(); 
        $notification = array(
            'message' => 'Services Delete Successfully',
            'alert-type' => 'danger' 
        );
        return redirect()->route('services.view')->with($notification);
    }
    public function activeInactive($id)
    {
        $data = Service::find($id);
        if ( $data->status == 1) {
            $data->status = 0;
        }else{
            $data->status = 1;
        }
        $data->save(); 
        $notification = array(
            'message' => 'Services Status Changed  Successfully',
            'alert-type' => 'warning' 
        );
        return redirect()->route('services.view')->with($notification);
    }
}
