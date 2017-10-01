@extends('Template.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div id="map" style="margin: 0; padding: 0; height: 500px;  width: 100%;">

                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
