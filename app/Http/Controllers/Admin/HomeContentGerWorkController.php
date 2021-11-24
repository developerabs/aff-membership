<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeContentGetWork;

class HomeContentGerWorkController extends Controller
{
    public function index()
    { 
        $data['allData'] = HomeContentGetWork::orderBy('id','desc')->get();
        return view('admin.homeContentGetWork.index',$data);
    }
    public function add()
    {
        return view('admin.homeContentGetWork.add');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'details' => 'required',
        ]);
        $data = new HomeContentGetWork();
        $data->title = $request->title;  
        $data->icon = $request->icon;  
        $data->details = $request->details;  
        $data->save();
        $notification = array(
            'message' => 'New Get Work Added Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('homeContentGetWork.view')->with($notification);
    }
    public function edit($id)
    { 
        $data['editData'] = HomeContentGetWork::find($id);
        return view('admin.homeContentGetWork.edit',$data);
    }
    public function update(Request $request, $id)
    { 
        $validated = $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'details' => 'required',
        ]);
        $data = HomeContentGetWork::find($id);
        $data->title = $request->title;  
        $data->icon = $request->icon;  
        $data->details = $request->details;  
        $data->save();

        $notification = array(
            'message' => 'Get Work Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('homeContentGetWork.view')->with($notification);
    }
    public function delete($id)
    {
        $data = HomeContentGetWork::find($id);
        $data->delete(); 
        $notification = array(
            'message' => 'Get Work Delete Successfully',
            'alert-type' => 'danger' 
        );
        return redirect()->route('homeContentGetWork.view')->with($notification);
    }
}
