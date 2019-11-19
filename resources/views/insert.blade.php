@extends('layouts.app')
@section('content')
    <h1>Please Insert the new Record</h1>
    {!! Form::open(['action' => 'insertController@store', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group, container"> 
            {!! Form::label('name', 'Movie Title') !!}
            {!! csrf_field() !!}
            {!! Form::text('name', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group, container">
                {!! Form::label('info', 'Movie Description') !!}
                {!! Form::textarea('info', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group, container">
                {!! Form::label('img', 'Movie Cover', [ 'for' => 'img']) !!}
                {!! Form::file('img', ['class' => 'form-control-file', 'id' => 'img']) !!}
        </div>
        <div class="input-group container ">
            {!! Form::submit('Insert', ['class' => 'form-control btn btn-success']) !!}
            {!! Form::button('Cancel', ['type' => 'reset', 'class' => 'form-control btn btn-muted']) !!}
        </div>
        
    {!! Form::close() !!}
@endsection