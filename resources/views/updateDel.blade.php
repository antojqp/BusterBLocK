@extends('layouts.app')
@section('content')
    <h1>Please Insert the new Info FOR the Record</h1>
    {!! Form::open(['action' => ['insertController@update', $movie->id], 'enctype' => 'multipart/form-data', 'method' => 'POST']) !!}
        <div class="form-group, container"> 
        <img src="/storage/images/{{$movie->img}}" width="210px">
        {!! Form::hidden('old', $movie->img) !!}
        {!! Form::hidden('_method', 'PUT') !!}
            {!! Form::label('name', 'Movie Title') !!}
            {!! csrf_field() !!}
            {!! Form::text('name', $movie->name, ['class' => 'form-control']) !!}

        </div>
        <div class="form-group, container">
                {!! Form::label('info', 'Movie Description') !!}
                {!! Form::textarea('info',  $movie->info, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group, container">
                {!! Form::label('img', 'Movie Cover', [ 'for' => 'img']) !!}
                {!! Form::file('img', ['class' => 'form-control-file', 'id' => 'img']) !!}
        </div>
        <div class="input-group container ">
            {!! Form::submit('Update', ['class' => 'form-control btn btn-success']) !!}
            {!! Form::button('Cancel', ['type' => 'reset', 'class' => 'form-control btn btn-muted']) !!}
           {!! Form::close() !!}
           {!! Form::open(['action' => ['insertController@destroy', $movie->id], 'method' => 'POST']) !!}
           {!! Form::hidden('_method', 'DELETE') !!}
           {!! Form::submit('Delete', ['class' => 'form-control btn btn-danger']) !!}
           {!! Form::close() !!}
        </div>
        
   
@endsection