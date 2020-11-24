<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Rules\Captcha;
use App\Category;
use App\Brand;


class ProductController extends Controller
{
    public function add_product_product(){
       $cate_product = DB::table('categories')->orderby('id','desc')->get(); 
        $brand_product = DB::table('brands')->orderby('id','desc')->get(); 
       

        return view('admin.add_product_product', compact('cate_product','brand_product'));
    }

    public function all_product_product(){
        $product = Product::with('category','brand')->get();
      //$product = DB::table('products')
        //->join('categories','categories.id','=','products.category_id')
        //->join('brands','brands.id','=','products.brand_id')
       // ->orderby('products.id','desc')->paginate(5);
        
        return view('admin.all_product_product', compact('product'));
    }
    public function store(Request $request){
        //echo "store";
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_price'] = $request->product_price;
       
        $data['status'] = $request->status;
        $data['category_id'] = $request->cate_product;
        $data['brand_id'] = $request->brand_product;
       
        $data['inventory'] = $request->inventory;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('products')->insert($data);
            return Redirect()->route('product.add')->with('message',' lưu sản phẩm thành công!');
        }
        $data['product_image']= '';
        DB::table('products')->insert($data);
        return Redirect()->route('product.add')->with('message',' lưu sản phẩm thành công!');
        
    }
    public function edit($id){
        //$product = Product::find($id);
        $cate_product = DB::table('categories')->orderby('id','desc')->get(); 
        $brand_product = DB::table('brands')->orderby('id','desc')->get(); 
        $product = DB::table('products')->orderby('id','desc')->get(); 
        return view('admin.edit_product', compact('product','cate_product','brand_product'));
    }
  
    public function update($id, Request $request)
    {
     $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_price'] = $request->product_price;
       
        $data['status'] = $request->status;
        $data['category_id'] = $request->cate_product;
        $data['brand_id'] = $request->brand_product;
       
        $data['inventory'] = $request->inventory;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('products')->update($data);
            return Redirect()->route('product.add')->with('message',' cập nhập sản phẩm thành công!');
        }
        $data['product_image']= '';
        DB::table('products')->update($data);
        return Redirect()->route('product.add')->with('message',' cập nhât sản phẩm thành công!');
    }

    public function destroy($id)
    {
        
        $product = DB::table('products')->where('id', $id)->delete();
       

        return Redirect()->route('product.all')->with('message', 'delete success!');
    }
     
    public function unactive_product_product($id){
        
        DB::table('products')->where('id', $id)->update(['status'=>1]);
        return Redirect()->route('product.all')->with('message', 'kich hoạt thành công!');
    }
    public function active_product_product($id){
        
        DB::table('products')->where('id', $id)->update(['status'=>0]);
        return Redirect()->route('product.all')->with('message', 'kich hoạt thành công!');
    }
}
