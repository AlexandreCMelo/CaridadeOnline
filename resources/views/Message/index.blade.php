@extends('Message.boiler')

@section('page')
    @include('Message.partials.flash')
    @each('Message.partials.thread', $threads, 'thread', 'Message.partials.no-threads')
@stop