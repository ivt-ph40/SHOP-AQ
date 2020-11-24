@extends('layout.master')
@section('title', 'Edit User')
@section('content')
	@foreach ($users as $user)
			<tr>
				<td>{{$user->id}}</td>
				
				<td>{{$user->email}}</td>

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

@endsection