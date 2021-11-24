<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use App\Models\HomeContentBanner;
use App\Models\HomeContentGetWork;
use App\Models\MoneyProtectionContent;
use App\Models\FindYourTarget;
use App\Models\PackageCategory;

class HomeController extends Controller
{
    public function home()
    { 
        $data['categoryData'] = Category::orderBy('id','asc')->where('popular',1)->get();
        $data['HomeContentBanner'] = HomeContentBanner::find(1);
        $data['HomeContentGetWork'] = HomeContentGetWork::orderBy('id','desc')->get();
        $data['MoneyProtectionContent'] = MoneyProtectionContent::find(1);
        $data['FindYourTarget'] = FindYourTarget::find(1); 
        $data['PackageCategory'] = PackageCategory::orderBy('id','desc')->get();
        return view('frontend.index',$data);
    }
}
