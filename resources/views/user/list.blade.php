@extends('layout.master')

@section('content')
	
	@if (session()->has('message'))
	<div class="alert alert-primary" role="alert">
	  {{session()->get('message')}}
	</div>
@endif
	<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">id</th>
			
			<th scope="col">email</th>
			<th scope="col">passowrd</th>
			<th scope="col">birthday</th>
			<th scope="col" colspan="3">Action</th>
		</tr>
	</thead>
		@foreach ($users as $user)
			<tr>
				<td>{{$user->id}}</td>
				
				<td >{{$user->email}}</td>

				<td>{{$user->password}}</td>
				<td>{{$user->birthday}}</td>
				<td><a href="{{ route('user.edit', $user->id)}}">edit</a></td>
				<td>
					<form action="{{ route('user.delete', $user->id) }}" method="post">
						@csrf
						@method('delete')
						<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to Remove?');">Delete</button>
					</form>
				</td>
				
		
				
			</tr>
		@endforeach
	
		 <div class="row">
		 	<div class="col-12 d-flex justify-content-center">
		 		{{ $users->links() }}
		 	</div>
		 </div>
@endsection