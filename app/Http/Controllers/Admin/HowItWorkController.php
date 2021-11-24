<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\HowItWork;

class HowItWorkController extends Controller
{
    public function howItWorkIndex()
    {
        $data['allData'] = HowItWork::find(1);
        return view('admin.howItWork.howItWorkIndex',$data);
    }
    public function howItWorkUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required', 
            'details' => 'required', 
        ]);
        $data = HowItWork::find(1);
        $data->title = $request->title; 
        $data->details = $request->details; 
        $data->save();

        $notification = array(
            'message' => 'How is work Page Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('howItWork.view')->with($notification);
    }
}
