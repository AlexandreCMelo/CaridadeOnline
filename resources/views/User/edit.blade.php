@extends('master')

@section('content')

    <div class="container">

        <form method="post" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">

            {{ csrf_field() }}

            <input type="hidden" name="_method" value="PUT">

            <h1>Editing informations</h1>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
            </div>

            <div class="form-group">
                <label for="profile_photo">Photo profile</label>
                <input type="file" name="profile_photo" id="profile_photo">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary">
            </div>

        </form>

    </div>

@endsection
