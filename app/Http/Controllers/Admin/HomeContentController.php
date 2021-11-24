<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeContentBanner;
use App\Models\MoneyProtectionContent;
use App\Models\FindYourTarget;
use App\Models\SiteSetting;

class HomeContentController extends Controller
{
    //banner section
    public function homeContentBannerIndex()
    {
        $data['allData'] = HomeContentBanner::find(1);
        return view('admin.homecontent.homeContentBannerIndex',$data);
    }
    public function homeContentBannerUpdate(Request $request)
    {
        $request->validate([
            'title_1' => 'required',
            'title_2' => 'required',
            'details' => 'required', 
        ]);
        $data = HomeContentBanner::find(1);
        $data->title_1 = $request->title_1;
        $data->title_2 = $request->title_2;
        $data->details = $request->details;

        if($request->hasFile('img')){ 
            $image = $request->file('img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $path = 'upload/homepage/';
            $save_url = 'upload/homepage/'.$name_gen;
            $image->move($path, $name_gen);
            $data->img=$save_url;

        }
        $data->save();

        $notification = array(
            'message' => 'Home Banner Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('homeContentBanner.view')->with($notification);
    }

    //money protection 
    public function moneyprotectionIndex()
    {
        $data['allData'] = MoneyProtectionContent::find(1);
        return view('admin.homecontent.moneyprotectionIndex',$data);
    }
    public function moneyprotectionUpdate(Request $request)
    {
        $request->validate([
            'title_1' => 'required',
            'title_2' => 'required',
            'details' => 'required', 
        ]);
        $data = MoneyProtectionContent::find(1);
        $data->title_1 = $request->title_1;
        $data->title_2 = $request->title_2;
        $data->details = $request->details;

        if($request->hasFile('img')){ 
            $image = $request->file('img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $path = 'upload/homepage/';
            $save_url = 'upload/homepage/'.$name_gen;
            $image->move($path, $name_gen);
            $data->img=$save_url;

        }
        $data->save();

        $notification = array(
            'message' => 'Home Money Protection Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('moneyprotection.view')->with($notification);
    }
    //find your target
    public function findyourtargetIndex()
    {
        $data['allData'] = FindYourTarget::find(1);
        return view('admin.homecontent.findyourtargetIndex',$data);
    }
    public function findyourtargetUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required', 
            'details' => 'required', 
        ]);
        $data = FindYourTarget::find(1);
        $data->title = $request->title; 
        $data->details = $request->details; 
        $data->save();

        $notification = array(
            'message' => 'Home Find Your Target Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('findyourtarget.view')->with($notification);
    }
    //site settings about 
    public function sitesettingsIndex()
    {
        $data['allData'] = SiteSetting::find(1);
        return view('admin.sitesettings.sitesettingsIndex',$data);
    }
    public function sitesettingsUpdate(Request $request)
    {
        $request->validate([
            'site_name' => 'required', 
            'title' => 'required',   
            'about' => 'required', 
            'copy' => 'required', 
        ]);
        $data = SiteSetting::find(1);
        $data->site_name = $request->site_name; 
        $data->title = $request->title;   
        $data->about = $request->about; 
        $data->copy = $request->copy; 
        if($request->hasFile('logo')){ 
            @unlink($data->logo);
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $path = 'upload/logo/';
            $save_url = 'upload/logo/'.$name_gen;
            $image->move($path, $name_gen);
            $data->logo=$save_url;

        }
        $data->save();

        $notification = array(
            'message' => 'Home Find Your Target Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('sitesettings.view')->with($notification);
    }

}
