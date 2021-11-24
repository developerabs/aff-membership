<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PackageCategory;

class PackageCategoryController extends Controller
{
    public function index()
    { 
        $data['allData'] = PackageCategory::orderBy('id','desc')->get();
        return view('admin.packageCategories.index',$data);
    }
    public function add()
    {
        return view('admin.packageCategories.add');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cat_name' => 'required|unique:package_categories|max:255',
            'price' => 'required',
        ]);
        $data = new PackageCategory();
        $data->cat_name = $request->cat_name; 
        $data->slug = Str::of($request->cat_name)->slug('-');
        $data->price = $request->price;
        $data->save();
        $notification = array(
            'message' => 'Package Category Added Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('packagecategory.view')->with($notification);
    }
    public function edit($id)
    { 
        $data['editData'] = PackageCategory::find($id);
        return view('admin.packageCategories.edit',$data);
    }
    public function update(Request $request, $id)
    { 
        $request->validate([
            'cat_name' => 'required|unique:package_categories,cat_name,'.$id,
            'price' => 'required',
        ]);
        $data = PackageCategory::find($id);
        $data->cat_name = $request->cat_name; 
        $data->slug = Str::of($request->cat_name)->slug('-');
        $data->price = $request->price;
        $data->save();

        $notification = array(
            'message' => 'Package Category Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('packagecategory.view')->with($notification);
    }
    public function delete($id)
    {
        $data = PackageCategory::find($id);
        $data->delete(); 
        $notification = array(
            'message' => 'Package Category Delete Successfully',
            'alert-type' => 'danger' 
        );
        return redirect()->route('packagecategory.view')->with($notification);
    } 
}
