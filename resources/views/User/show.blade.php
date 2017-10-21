@extends('master')

@section('content')

    <div class="container">

        <h1>The profile!</h1>

        <p>{{ $user->name }}</p>
        <p>{{ $user->email }}</p>
        <img src="{{ $user->avatar() }}">


    </div>

@endsection
