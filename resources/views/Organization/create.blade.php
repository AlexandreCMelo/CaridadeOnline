@extends('master')

@section('content')


    <div class="container">

        {!! Form::open(['route' => 'organizations.store']) !!}

        <div class="form-group">
            <label for="name" class="control-label">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="description" class="control-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">

            <label for="categories" class="control-label">Categories</label>
            <select multiple name="categories" class="control-label">
                @foreach($categories as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>

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