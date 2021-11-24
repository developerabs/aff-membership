<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServicePageSideIcon;

class ServicePageSideIconController extends Controller
{
    public function index()
    { 
        $data['allData'] = ServicePageSideIcon::orderBy('id','desc')->get();
        return view('admin.servicePageSideIcon.index',$data);
    }
    public function add()
    {
        return view('admin.servicePageSideIcon.add');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'icon' => 'required',
        ]);
        $data = new ServicePageSideIcon();
        $data->title = $request->title;  
        $data->icon = $request->icon;
        $data->save();
        $notification = array(
            'message' => 'Service Page Side Icon Added Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('servicesPageSideIcon.view')->with($notification);
    }
    public function edit($id)
    { 
        $data['editData'] = ServicePageSideIcon::find($id);
        return view('admin.categories.edit',$data);
    }
    public function update(Request $request, $id)
    { 
        $request->validate([
            'name' => 'required'
        ]);
        $data = ServicePageSideIcon::find($id);
        $data->name = $request->name;
        $data->slug = Str::of($request->name)->slug('-');
        $data->icon = $request->icon;
        $data->save();

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('servicesPageSideIcon.view')->with($notification);
    }
    public function delete($id)
    {
        $data = ServicePageSideIcon::find($id);
        $data->delete(); 
        $notification = array(
            'message' => 'Category Delete Successfully',
            'alert-type' => 'danger' 
        );
        return redirect()->route('servicesPageSideIcon.view')->with($notification);
    } 
}
