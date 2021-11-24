<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    { 
        $data['allData'] = Category::orderBy('id','desc')->get();
        return view('admin.categories.index',$data);
    }
    public function add()
    {
        return view('admin.categories.add');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'icon' => 'required',
        ]);
        $data = new Category();
        $data->name = $request->name; 
        $data->slug = Str::of($request->name)->slug('-');
        $data->icon = $request->icon;
        $data->save();
        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('categories.view')->with($notification);
    }
    public function edit($id)
    { 
        $data['editData'] = Category::find($id);
        return view('admin.categories.edit',$data);
    }
    public function update(Request $request, $id)
    { 
        $request->validate([
            'name' => 'required|unique:categories,name,'.$id
        ]);
        $data = Category::find($id);
        $data->name = $request->name;
        $data->slug = Str::of($request->name)->slug('-');
        $data->icon = $request->icon;
        $data->save();

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('categories.view')->with($notification);
    }
    public function delete($id)
    {
        $data = Category::find($id);
        $data->delete(); 
        $notification = array(
            'message' => 'Category Delete Successfully',
            'alert-type' => 'danger' 
        );
        return redirect()->route('categories.view')->with($notification);
    }
    public function popular($id)
    {
        $data = Category::find($id);
      
        if ($data->popular == 0) { 
            $data->popular = 1;
        } else {
            $data->popular = 0;
        }
        
        $data->save();

        $notification = array(
            'message' => 'Popular Status Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('categories.view')->with($notification);
    }
    
}
