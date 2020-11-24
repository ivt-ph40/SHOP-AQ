<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Rules\Captcha; 


class AdminController extends Controller
{
    
     public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function show_dashboard()
    {
        return view('admin.dashboard');
    }
    public function index()
    {
      return view('admin_login');
    }

    public function dashboard( Request $request)
    {
       
        $admin_email =$request->admin_email;
        $admin_password = md5($request->admin_password);
        $result= DB::table('admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        if($result){
           
                Session::put('name', $result->name);
                Session::put('admin_id', $result->admin_id);
                return Redirect()->route('admin.dashboard');
            
        }else{
                Session::put('message','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
                return Redirect()->route('admin.create');
        }
       // return redirect($result)->route('admin.show')->with('message', 'đăng nhập lại!');
      
      
    }
     public function logout()
    {
       
       Session::put('name',null);
       Session::put('admin_id',null);
        return Redirect()->route('admin.create');
      
    }
}
