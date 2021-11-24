<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;

class PrivacyPolicyController extends Controller
{
    public function privacyPolicyIndex()
    {
        $data['allData'] = PrivacyPolicy::find(1);
        return view('admin.privacyPolicy.PrivacyPolicyIndex',$data);
    }
    public function privacyPolicyUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required', 
            'details' => 'required', 
        ]);
        $data = PrivacyPolicy::find(1);
        $data->title = $request->title; 
        $data->details = $request->details; 
        $data->save();

        $notification = array(
            'message' => 'Privacy Policy Page Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('privacyPolicy.view')->with($notification);
    }
}
