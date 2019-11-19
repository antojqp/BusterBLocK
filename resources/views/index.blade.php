
@extends('layouts.app')
@section('content')
<div class="container-fluid bg-dark py-1">
	<fieldset class="border-light border m-xl-auto p-1">
		<legend class="text-light">BlusterBlock S.O</legend>
		<p class="text-light text-center">
			Welcome to BlusterBLoCk the greatest movie rent site on the world 
		</p>
	</fieldset>
</div>
<!-- movie display -->
@include('include.movieRow')

@endsection
	