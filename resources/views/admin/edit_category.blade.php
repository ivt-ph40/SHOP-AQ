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
                            Thêm Danh Mục Sản Phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="POST" action="{{ route('category.update', $category->id) }}">
                                    @csrf
                                   @method('PUT')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input name="category_name" type="text" class="form-control" id="exampleInputEmail1" value="{{$category->category_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea  name="category_desc" type="text" class="form-control" id="exampleInputPassword1" value="{{$category->category_desc}}"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển Thị</label>
                                    
                                    <select name="status" id="" class="form-control input-sm m-bot15" value="{{$category->status}}">
                                            <option value="0">ẩn</option>
                                            <option value="1">Hiển Thị</option>
                                    </select>
                                </div>
                               
                                <button type="submit"  class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
</div>
@endsection
