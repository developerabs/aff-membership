<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Smtp;

class SmtpController extends Controller
{
    public function view()
    {
        $data['Smtp'] = Smtp::find(1); 
        return view('admin.smtp.index',$data);
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_pass' => 'required',
            'mail_encription' => 'required',
            'from_address' => 'required',
            'from_name' => 'required',
        ]);
        $data = Smtp::find(1);
        $data->type = $request->type;   
        $data->mail_host = $request->mail_host;   
        $data->mail_port = $request->mail_port;   
        $data->mail_username = $request->mail_username;   
        $data->mail_pass = $request->mail_pass;   
        $data->mail_encription = $request->mail_encription;   
        $data->from_address = $request->from_address;   
        $data->from_name = $request->from_name;   
        $data->save();
        $notification = array(
            'message' => 'SMTP Updated Successfully',
            'alert-type' => 'info' 
        );
        return redirect()->route('smtp.view')->with($notification);
    }
}
