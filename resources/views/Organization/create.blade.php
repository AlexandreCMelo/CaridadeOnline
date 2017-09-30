@extends('Template.layouts.app')

@section('content')


    <div class="container">

        {!! Form::open(['route' => 'organizations.store']) !!}

        <div class="form-group">
            {{ Form::label('name', null, ['class' => 'control-label']) }}
            {{ Form::text('name', '', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('description', null, ['class' => 'control-label']) }}
            {{ Form::textarea('description', '', ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('categories', null, ['class' => 'control-label']) }}
            {{ Form::select(
            'description',
            $categories,
            '',
            array('multiple' => true, 'class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('activities', null, ['class' => 'control-label']) }}
            {{ Form::select('description',
            ['ab','ac'],
            '',
            array('multiple' => true, 'class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('targets', null, ['class' => 'control-label']) }}
            {{ Form::select('description',
            ['ab','ac'],
            '',
            array('multiple' => true)) }}
        </div>

        <div class="form-group">
            {{ Form::label('short_description', null, ['class' => 'control-label']) }}
            {{ Form::text('short_description', '', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', null, ['class' => 'control-label']) }}
            {{ Form::text('email', '', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('phone', null, ['class' => 'control-label']) }}
            {{ Form::text('phone', '', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('website', null, ['class' => 'control-label']) }}
            {{ Form::text('website', '', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('status', null, ['class' => 'control-label']) }}
            {{ Form::checkbox('enabled', '', ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Send',['class' => 'btn btn-default']) }}
        </div>

        {!! Form::close() !!}

    </div>

@endsection