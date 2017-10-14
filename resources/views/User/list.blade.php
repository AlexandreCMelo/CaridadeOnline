@extends('master')

@section('content')

<div class="container">

<h1>Users</h1>

@if (count($users))
  <ul class="list-group">
    @foreach($users as $user)
      <li class="list-group-item">{{ $user->name }}</li>
    @endforeach
  </ul>
@else
  <h2>There is no user registered yet!</h2>
@endif
</div>

@endsection
