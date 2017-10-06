@extends('Message.boiler')

@section('content')
    <div class="col-md-6">
        <h1>{{ $thread->subject }}</h1>
        @each('Message.partials.messages', $thread->messages, 'message')

        @include('Message.partials.form-message')
    </div>
@stop