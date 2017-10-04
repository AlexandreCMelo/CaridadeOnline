@extends('master')

@section('content')
    @include('Message.partials.flash')
    @each('Message.partials.thread', $threads, 'thread', 'Message.partials.no-threads')
@stop