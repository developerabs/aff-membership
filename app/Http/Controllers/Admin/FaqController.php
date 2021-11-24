<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqPage;

class FaqController extends Controller
{
    public function faqPageIndex()
    {
        $data['allData'] = FaqPage::find(1);
        return view('admin.faqPage.faqPageIndex',$data);
    }
    public function faqPageUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required', 
            'details' => 'required', 
        ]);
        $data = FaqPage::find(1);
        $data->title = $request->title; 
        $data->details = $request->details; 
        $data->save();

        $notification = array(
            'message' => 'Faq Page Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('faqPage.view')->with($notification);
    }
}
