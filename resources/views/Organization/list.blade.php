@extends('master')

@section('content')

  <div class="container">

  <h1>{{ __('views.organizations') }}</h1>

  @if (count($organizations))
    <ul class="list-group">
      @foreach($organizations as $organization)
        <li class="list-group-item">
          <div class="row">

            <div class="col-sm-9 btn-line-height">
              {{ $organization->name }}
            </div>

            <div class="col-sm-3">
              <a href="{{ route('organization.delete', $organization) }}" class="btn btn-danger btn-block">{{ __('buttons.remove') }}</a>
            </div>

          </div>
        </li>
      @endforeach
    </ul>
  @else
    <h2>There is no organization registered yet!</h2>
  @endif
  </div>

@endsection
