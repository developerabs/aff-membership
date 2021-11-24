<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function manageProfile()
    {
        return view('frontend.userprofile.manageProfile');
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',   
        ]);
        $data = User::find(Auth::user()->id);
        $data->name = $request->name; 
        $data->save();
        return redirect()->route('page.myAccount');
    }
}
