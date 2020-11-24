<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Rules\Captcha; 

class BrandController extends Controller
{
    public function add_brand_product(){
        
        return view('admin.add_brand_product' );
    }
    public function all_brand_product(){
         $this->AuthLogin();
        $brand = Brand::paginate(5);
        //$brand = DB::table('brands')->get();
        return view('admin.all_brand_product', compact('brand'));
    }
    public function store(Request $request){
        //echo "store";
     
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;
        $data['status'] = $request->status;
        //brand::create($data);
        DB::table('brands')->insert($data);
        return Redirect()->route('brand.add')->with('message',' lưu sản phẩm thành công!');
        
    }
    public function edit($id){
      
        $brand = brand::find($id);
        return view('admin.edit_brand', compact('brand'));
    }
  
    public function update($id, Request $request)
    {

     $data = $request->except('_token','_method');
   
    brand::find($id)->update($data);
     return Redirect()->route('brand.all')->with('message', 'update success!');
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        
        $brand->delete();

        return Redirect()->route('brand.all')->with('message', 'delete success!');
    }
     
    public function unactive_brand_product($id){
        
        DB::table('brands')->where('id', $id)->update(['status'=>1]);
        return Redirect()->route('brand.all')->with('message', 'kich hoạt thành công!');
    }
    public function active_brand_product($id){
        
        DB::table('brands')->where('id', $id)->update(['status'=>0]);
        return Redirect()->route('brand.all')->with('message', 'kich hoạt thành công!');
    }
}
