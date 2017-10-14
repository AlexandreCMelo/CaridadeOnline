@extends('master')

@section('content')

  <div class="container">

  <h1>Organizations</h1>

  @if (count($organizations))
    <ul class="list-group">
      @foreach($organizations as $organization)
        <li class="list-group-item">{{ $organization->name }}</li>
      @endforeach
    </ul>
  @else
    <h2>There is no organization registered yet!</h2>
  @endif
  </div>

@endsection
