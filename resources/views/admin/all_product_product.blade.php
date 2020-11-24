@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Cập nhập sản phẩm
    </div>
    @if (session()->has('message'))
        <div class="alert alert-primary" role="alert" style="color: blue;">
            {{session()->get('message')}}
        </div>
     @endif

    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th>Mô tỏa sản phẩm</th>
            <th>giá</th>
            <th>ảnh</th>
           
            <th>tồn kho</th>
            <th>thuong hieu</th>
            <th>hiển thị</th>
           
            
            

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          
            @foreach ($product as $product)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->product_desc }}</td>
            <td>{{ $product->product_price }}</td>
           
            <td><img src="public/uploads/product/{{ $product->product_image}}" alt="" height="70" width="70"></td>
             <td>{{ $product->inventory}}</td>
             <td>{{ $product->brand_name }}</td>
           
            <td>
              <?php
               if($product->status==0){
                ?>
                <a href="{{URL::to('/unactive-product/'.$product->id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-product/'.$product->id)}}"><span class="fa-thumb-styling fa fa-thumbs-down" style="color: red"></span></a>
                <?php
               }
              ?>
            </td>
            <td>
              <a href="{{ route('product.edit', $product->id) }}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
            </td>
            <td>
              <form action="{{ route('product.delete', $product->id) }}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to Remove?');">Delete</button>
          </form>
            </td>
          </tr>
           
            @endforeach
            
          
          
         
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
@endsection