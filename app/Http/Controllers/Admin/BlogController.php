<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\BlogCategory;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {  
        $data['allData'] = DB::table('blogs')
                    ->join('blog_categories', 'blog_categories.id', '=', 'blogs.cat_id') 
                    ->select('blogs.*', 'blog_categories.name as cat_name') 
                    ->orderby('id','desc')
                    ->get();
        return view('admin.blog.index',$data);
    }
    public function add()
    {
        $data['Category'] = BlogCategory::orderBy('id','desc')->get();
        return view('admin.blog.add',$data);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'cat_id' => 'required|max:255',
            'details' => 'required',
            'service_img' => 'image',
        ]);
        $data = new Blog();
        $data->auth_id = Auth::user()->id;
        $data->title = $request->title;
        $data->cat_id = $request->cat_id;
        $data->details = $request->details; 

        if($request->hasFile('img')){ 
            $image = $request->file('img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $path = 'upload/blog/';
            $save_url = 'upload/blog/'.$name_gen;
            $image->move($path, $name_gen);
            $data->img=$save_url;

        }
        $data->save();
        $notification = array(
            'message' => 'Blog Category Added Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('blog.view')->with($notification);
    }
    public function edit($id)
    { 
        $data['Category'] = BlogCategory::orderBy('id','desc')->get();
        $data['editData'] = Blog::find($id);
        return view('admin.Blog.edit',$data);
    }
    public function update(Request $request, $id)
    { 
        $validated = $request->validate([
            'title' => 'required|max:255',
            'cat_id' => 'required|max:255',
            'details' => 'required', 
        ]);
        $data = Blog::find($id);
        $data->title = $request->title;
        $data->cat_id = $request->cat_id;
        $data->details = $request->details; 

        if($request->hasFile('img')){ 
            @unlink($data->img);
            $image = $request->file('img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $path = 'upload/blog/';
            $save_url = 'upload/blog/'.$name_gen;
            $image->move($path, $name_gen);
            $data->img=$save_url;

        }
        $data->save();

        $notification = array(
            'message' => 'Blog Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('blog.view')->with($notification);
    }
    public function delete($id)
    {
        $data = Blog::find($id);
        $data->delete(); 
        @unlink($data->img);
        $notification = array(
            'message' => 'Blog Category Delete Successfully',
            'alert-type' => 'danger' 
        );
        return redirect()->route('blog.view')->with($notification);
    }
}
