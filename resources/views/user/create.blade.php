@extends('layout.master')
@section('title', 'App User')
@section('content')
	<form action="{{ route('user.store') }}" method="POST" role="form">
		<legend>APP LIST</legend>
		@csrf
		<div class="form-group">
			
			<label for="">email</label>
			<input name="email" type="email" class="form-control" id="" placeholder="Input field">
			@if ($errors->has('email'))
 			<p style="color: red;">{{ $errors->first('email')}}</p>
			 @endif
			<label for="">password</label>
			<input name="password" type="number" class="form-control" id="" placeholder="Input field">
			@if ($errors->has('password'))
 			<p style="color: red;">{{ $errors->first('password')}}</p>
			 @endif
			<label for="">birthday</label>
			<input name="birthday" type="number" class="form-control" id="" placeholder="Input field">
			
		</div>
	
		
	
		<button type="submit" class="btn btn-primary">App</button>
	</form>

@endsection