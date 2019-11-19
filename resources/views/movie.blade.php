@extends('layouts.app')
@section('content')
<div class="container-fluid bg-light p-3">
        <?php $user = Auth::user()->id; ?>
        <div class="row my-5 ">
            <div class='col-sm-3 bg-info '>
                <img src='/storage/images/{{ e($movie->img) }}' width='300px' height='400px'>
            </div>
            <div class='col-lg'>
                    <h1 class='text-center'>{{ e($movie->name) }}</h1>
            <p class='text-justify text-primary'>{{e($movie->info)}}</p>
                    <br>
                    @auth
                    {!! Form::open(['action' => ['reservesController@store'], 'method' => 'POST']) !!}
                    {!! Form::hidden('reserUser', $user) !!}
                    {!! Form::hidden('reserMov', $movie->id) !!}
                    {!! Form::submit('Reserve', ['class' => 'btn-secondary btn-lg text-center form-control align-bottom link']) !!}
                    {!! Form::close() !!}
                    @else 
                    <a href="{{ url('login?MSG=Please Login') }}" class=''>Reserve</a>    
                    @endauth
            </div>        
        </div>
@endsection
	