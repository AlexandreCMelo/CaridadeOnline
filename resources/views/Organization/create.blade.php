@extends('master')

@section('content')

    <div class="container">

        <form method="POST" action="{{ route('organization.store') }}">

          {{ csrf_field() }}

        <div class="form-group">
            <label for="name" class="control-label">{{ __('views.name') }}</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="description" class="control-label">{{ __('views.description') }}</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="categories" class="control-label">{{ __('views.categories') }}</label>
            <select multiple name="categories[]" class="form-control">
                @foreach($categories as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
          <label for="activities" class="control-label">{{ __('views.activities') }}</label>
          <select multiple name="activities[]" class="form-control">
              @foreach($activities as $key => $value)
                  <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="targets" class="control-label">{{ __('views.targets') }}</label>
          <select multiple id="targets" name="targets[]" class="form-control">
              @foreach($targets as $key => $value)
                  <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="short_description" class="control-label">{{ __('views.short_description') }}</label>
          <input type="text" name="short_description" id="short_description" class="form-control">
        </div>

        <div class="form-group">
          <label for="email" class="control-label">{{ __('views.email') }}</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
          <label for="phone" class="control-label">{{ __('views.phone') }}</label>
          <input type="text" name="phone" id="phone" class="form-control">
        </div>

        <div class="form-group">
          <label for="website" class="control-label">{{ __('views.website') }}</label>
          <input type="text" name="website" id="website" class="form-control">
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-default" value="Send">
        </div>

      </form>

    </div>

@endsection
