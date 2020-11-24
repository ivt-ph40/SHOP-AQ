<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Rules\Captcha; 
class CategoryProduct extends Controller
{
    public function add_category_product(){
    	
    	return view('admin.add_category_product' );
    }
    public function all_category_product(){
    	$category = Category::paginate(5);
    	//$category = DB::table('categories')->get();
    	return view('admin.all_category_product', compact('category'));
    }
    public function store(Request $request){
    	//echo "store";
         
    	$data = array();
    	$data['category_name'] = $request->category_name;
    	$data['category_desc'] = $request->category_desc;
    	$data['status'] = $request->status;
    	//Category::create($data);
    	DB::table('categories')->insert($data);
    	return Redirect()->route('category.add')->with('message',' hoàn thành!');
    	
    }
    public function edit($id){
       
    	$category = Category::find($id);
    	return view('admin.edit_category', compact('category'));
    }
  
    public function update($id, Request $request)
    {

     $data = $request->except('_token','_method');
   
    Category::find($id)->update($data);
     return Redirect()->route('category.all')->with('message', 'update success!');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        
        $category->delete();

        return Redirect()->route('category.all')->with('message', 'delete success!');
    }
     
    public function unactive_category_product($id){
    	
    	DB::table('categories')->where('id', $id)->update(['status'=>1]);
    	return Redirect()->route('category.all')->with('message', 'kich hoạt thành công!');
    }
    public function active_category_product($id){
    	
    	DB::table('categories')->where('id', $id)->update(['status'=>0]);
    	return Redirect()->route('category.all')->with('message', 'kich hoạt thành công!');
    }
}
