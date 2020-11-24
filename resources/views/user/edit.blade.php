@extends('layout.master')
@section('title', 'Edit User')
@section('content')
	<form action="{{route('user.update', $users->id)}}" method="POST" role="form">
		<legend>APP LIST</legend>
		@csrf
		@method('PUT')
		<div class="form-group">
			
			<label for="">email</label>
			<input name="email" type="email" class="form-control" id="" value="{{$users->email}}">
			<label for="">password</label>
			<input name="password" type="number" class="form-control" id="" value="{{$users->password}}">
			<label for="">sinh naht</label>
			<input name="birthday" type="number" class="form-control" id="" value="{{$users->bithday}}">
			
		</div>
	
		
	
		<button type="submit" class="btn btn-primary">App</button>
	</form>

@endsection