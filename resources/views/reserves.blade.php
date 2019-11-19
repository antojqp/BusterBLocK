
@extends('layouts.app')
@section('content')
@php
	use App\Movie;
	
@endphp
<div class="container-fluid bg-dark py-1">
	<fieldset class="border-light border m-xl-auto p-1">
		<legend class="text-light">BlusterBlock S.O</legend>
		<p class="text-light text-center">
			Welcome to BlusterBLoCk the greatest movie rent site on the world 
		</p>
	</fieldset>
</div>
<!-- reserves display -->
<table class="table">
	@if ($content)
		
	<thead>	
			@if (Auth::user()->level == 1)
				<th>User</th>
			@endif
			<th> Movie </th>
			<th> Estatus </th>
			<th> Reservation Code </th>
			<th>Actions</th>
		
	
	
		</thead>
		<tbody>
		@foreach ($reserve as $reser)
		@php
		
		@endphp
			<tr>
				@php
					$movieName = Movie::select('name')->where('id', '=', $reser->reserMov)->first();
				@endphp
				@if (Auth::user()->level == 1)
					<td>{{$reser->reserUser}}</td>
				@endif
				<td>{{$movieName->name}}</td>
				<td>{{$reser->reserStatus}}</td>
				<td>{{$reser->reserCode}}</td>
			@if ($reser->status == 0)
			<td>
				{!! Form::open(['action' => ['reservesController@destroy', $reser->id], 'method' => 'POST']) !!}
				{!! Form::hidden('_method', 'DELETE') !!}
				{!! Form::submit('Cancel', ['class' => 'form-control btn btn-danger']) !!}
				{!! Form::close() !!}
			</td>
			@endif
			|</tr>
		
				
			
		@endforeach
		</tbody>
	@else
		<thead class="m-auto">
			<td><h1>You have no reserves at the moment</h1></td>
		</thead>
	@endif
</table>
@endsection
	