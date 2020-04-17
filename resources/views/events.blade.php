
@extends('layouts.app')

@section('content')
    <h1>Events</h1>
    @include('shared._weekend')
    <ul>
        @foreach($events as $event)
        <li>{{$event}}</li>
        @endforeach
    </ul>
@endsection