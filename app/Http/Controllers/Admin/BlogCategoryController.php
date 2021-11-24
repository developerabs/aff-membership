<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function index()
    { 
        $data['allData'] = BlogCategory::orderBy('id','desc')->get();
        return view('admin.blogcategory.index',$data);
    }
    public function add()
    {
        return view('admin.blogcategory.add');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:blog_categories|max:255',
        ]);
        $data = new BlogCategory();
        $data->name = $request->name; 
        $data->slug = Str::of($request->name)->slug('-');
        $data->save();
        $notification = array(
            'message' => 'Blog Category Added Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('blogcategory.view')->with($notification);
    }
    public function edit($id)
    { 
        $data['editData'] = BlogCategory::find($id);
        return view('admin.blogcategory.edit',$data);
    }
    public function update(Request $request, $id)
    { 
        $request->validate([
            'name' => 'required|unique:blog_categories,name,'.$id
        ]);
        $data = BlogCategory::find($id);
        $data->name = $request->name;
        $data->slug = Str::of($request->name)->slug('-');
        $data->save();

        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('blogcategory.view')->with($notification);
    }
    public function delete($id)
    {
        $data = BlogCategory::find($id);
        $data->delete(); 
        $notification = array(
            'message' => 'Blog Category Delete Successfully',
            'alert-type' => 'danger' 
        );
        return redirect()->route('blogcategory.view')->with($notification);
    }
}
