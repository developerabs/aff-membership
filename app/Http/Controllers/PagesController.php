<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Service; 
use App\Models\PackageCategory;
use App\Models\ServicePageSideIcon;
use App\Models\AboutPage; 
use App\Models\HowItWork;
use App\Models\FaqPage;
use App\Models\PrivacyPolicy;

class PagesController extends Controller
{
    public function categories($id)
    {
        $data['servicesData'] = DB::table('services') 
                    ->join('users', 'users.id', '=', 'services.auth_id') 
                    ->select('services.*', 'users.name as u_name','users.profile_photo_path')
                    ->where('cat_id',$id) 
                    ->where('services.status',1)
                    ->paginate(12); 
        $data['servicesCount'] = count($data['servicesData']);
        $data['categoryName'] = DB::table('categories') 
                    ->where('id',$id) 
                    ->first();

        return view('frontend.pages.categories',$data);
    }
    public function services($id)
    { 
        $data['serviceData'] = DB::table('services')
                    ->join('users', 'users.id', '=', 'services.auth_id') 
                    ->select('services.*', 'users.name as u_name','users.profile_photo_path')
                    ->where('services.id',$id)
                    ->orderby('id','desc')
                    ->first(); 
        $data['serviceReviewData'] = DB::table('reviews')
                    ->join('users', 'users.id', '=', 'reviews.auth_id') 
                    ->select('reviews.*', 'users.name as u_name','users.profile_photo_path')
                    ->where('reviews.service_id',$id)
                    ->orderby('id','desc')
                    ->get();
        $data['reviewCount'] = DB::table('reviews') 
                    ->where('service_id',$id) 
                    ->count();
        $data['salesCount'] = DB::table('orders') 
                    ->where('service_id',$id) 
                    ->count(); 
        $data['PackageCategory'] = PackageCategory::orderBy('id','desc')->get();
        $data['ServicePageSideIcon'] = ServicePageSideIcon::orderBy('id','desc')->get();
        return view('frontend.pages.services',$data);
    }
    public function allService()
    { 
        $data['servicesData'] = DB::table('services')
                    ->join('users', 'users.id', '=', 'services.auth_id') 
                    ->select('services.*', 'users.name as u_name','users.profile_photo_path')
                    ->where('services.status',1)
                    ->orderby('id','desc')
                    ->get();
        $data['servicesCount'] = count($data['servicesData']);
        return view('frontend.pages.allservices',$data);
    }
    public function myAccount()
    {
        return view('frontend.userprofile.myAccount');
    }
    public function about()
    { 
        $data['AboutPage'] = AboutPage::find(1);
        return view('frontend.pages.about',$data);
    }
    public function privacyPolicy()
    { 
        $data['PrivacyPolicy'] = PrivacyPolicy::find(1);
        return view('frontend.pages.privacyPolicy',$data);
    }
    public function contact()
    { 
        return view('frontend.pages.contact');
    }
    public function blog()
    { 
        $data['blogsData'] = DB::table('blogs')
                    ->join('blog_categories', 'blog_categories.id', '=', 'blogs.cat_id') 
                    ->select('blogs.*', 'blog_categories.name as cat_name') 
                    ->orderby('id','desc')
                    ->get();
        return view('frontend.pages.blog',$data);
    }
    public function blogDetails($id)
    {
        $data['blogsData'] = DB::table('blogs')
                    ->join('blog_categories', 'blog_categories.id', '=', 'blogs.cat_id') 
                    ->select('blogs.*', 'blog_categories.name as cat_name') 
                    ->where('blogs.id',$id)
                    ->first();
       return view('frontend.pages.blogdetails',$data);
    }
    public function howItWork()
    { 
        $data['HowItWork'] = HowItWork::find(1);
        return view('frontend.pages.howItWork',$data);
    }
    public function faq()
    {
        $data['FaqPage'] = FaqPage::find(1);
        return view('frontend.pages.faq',$data);
    }
    public function serviceOrderDetails($id)
    {
        $data['orderId'] = $id;
        return view('frontend.order.serviceOrderDetails',$data);
    }
    public function packageDetails($id)
    {
        $data['orderId'] = $id;
        return view('frontend.order.packageOrderDetails',$data);
    }
}
