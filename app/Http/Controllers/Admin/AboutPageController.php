<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutPage;

class AboutPageController extends Controller
{
    public function aboutusIndex()
    {
        $data['allData'] = AboutPage::find(1);
        return view('admin.about.aboutusIndex',$data);
    }
    public function aboutusUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required', 
            'details' => 'required', 
        ]);
        $data = AboutPage::find(1);
        $data->title = $request->title; 
        $data->details = $request->details; 
        $data->save();

        $notification = array(
            'message' => 'About Page Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('aboutus.view')->with($notification);
    }
}
