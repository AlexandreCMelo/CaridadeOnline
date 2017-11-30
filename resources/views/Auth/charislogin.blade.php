@extends('master')

@section('content')
  <div class="container">
    <div class="row">

      <div class="col-md">
        @include('Auth.panels._personal')
      </div>

      <div class="col-md">
        @include('Auth.panels._institutional')
      </div>

    </div>
  </div>

@endsection
