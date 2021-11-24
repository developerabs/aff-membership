<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\PackageCategory;
use App\Models\PackageFeature;

class PackageFeaturesController extends Controller
{
    public function index($id)
    {   
        $data['PackageCategory'] = PackageCategory::find($id);
        $data['allData'] = DB::table('package_features')  
                    ->where('cat_id',$id)
                    ->get(); 
        return view('admin.packageFeature.index',$data);
    }
    public function add()
    {
        $data['PackageCategory'] = PackageCategory::orderBy('id','desc')->get();
        return view('admin.packageFeature.add',$data);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cat_id' => 'required',
            'name' => 'required',
        ]);
        $data = new PackageFeature();
        $data->cat_id = $request->cat_id;  
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Package Feature Added Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('packagefeature.view',$request->cat_id)->with($notification);
    }
    public function edit($cat_id,$id)
    { 
        $data['cat_id'] = $cat_id;
        $data['editData'] = PackageFeature::find($id);
        return view('admin.packageFeature.edit',$data);
    }
    public function update(Request $request, $id)
    { 
        $request->validate([ 
            'name' => 'required',
        ]);
        $data = PackageFeature::find($id);
        $data->name = $request->name;   
        $data->save();

        $notification = array(
            'message' => 'Package Feature Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('packagefeature.view',$request->cat_id)->with($notification);
    }
    public function delete($id)
    {
        $data = PackageFeature::find($id);
        $data->delete(); 
        $notification = array(
            'message' => 'Package Feature Delete Successfully',
            'alert-type' => 'danger' 
        );
        return back()->with($notification);
    } 
}
