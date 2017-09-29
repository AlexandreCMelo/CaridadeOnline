@extends('Template.layouts.app')

@section('content')


    <div class="container">


        <div class="form-group">
            {{ Form::label('name', null, ['class' => 'control-label']) }}
            {{ Form::text('name', '', ['class' => 'form-control']) }}
        </div>

    <div class="form-group">
        {{ Form::submit('Send',['class' => 'btn btn-default']) }}
    </div>

    </div>

@endsection