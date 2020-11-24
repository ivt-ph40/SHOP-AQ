@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Danh sách sản phẩm
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
            <th>Tên Danh Mục</th>
            <th>Mô Tỏa Danh Mục</th>
            <th>hiên thi</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          
            @foreach ($category as $category)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $category->category_name }}</td>
            <td>{{ $category->category_desc }}</td>
            <td>
              <?php
               if($category->status==0){
                ?>
                <a href="{{URL::to('/unactive-category-product/'.$category->id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-category-product/'.$category->id)}}"><span class="fa-thumb-styling fa fa-thumbs-down" style="color: red"></span></a>
                <?php
               }
              ?>
            </td>
            <td>
              <a href="{{ route('category.edit', $category->id) }}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
            </td>
            <td>
              <form action="{{ route('category.delete', $category->id) }}" method="post">
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