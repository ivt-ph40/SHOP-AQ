@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        @if (session()->has('message'))
        <div class="alert alert-primary" role="alert" style="color: blue;">
            {{session()->get('message')}}
        </div>
        @endif
                    <section class="panel">
                        <header class="panel-heading">
                            Chỉnh sửa sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                               
                                   
                         
                              
                          
                                <form role="form" method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên phẩm</label>
                                    <input name="product_name" type="text" class="form-control" id="exampleInputEmail1" value="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none"  rows="8" class="form-control" name="product_desc" id="ckeditor1" placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Làm ơn điền số tiền" name="product_price" class="form-control" value="">
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển Thị</label>
                                    
                                    <select name="status" id="" class="form-control input-sm m-bot15">
                                            <option value="0">ẩn</option>
                                            <option value="1">Hiển Thị</option>
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputFile">Chọn danh mục</label>
                                    
                                    <select name="cate_product" id="" class="form-control input-sm m-bot15">
                                        @foreach ($cate_product as  $cate_product)
                                           
                                            <option value="{{$cate_product->id}}">{{$cate_product->category_name}}</option>
                                         @endforeach   
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Chọn Thương Hiệu</label>
                                    
                                    <select name="brand_product" id="" class="form-control input-sm m-bot15">
                                         @foreach ($brand_product as $cate_product)
                                            <option value="{{$cate_product->id}}">{{$cate_product->brand_name}}</option>
                                            @endforeach    
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">sô lương sản phẩm</label>
                                    <input name="inventory" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                               
                                <button type="submit"  class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                             
                            </div>

                        </div>
                    </section>

            </div>
</div>
@endsection
