


@extends('layouts.app', ['title' => 'Home'])

@section('navigation')
    {{-- <h1>Demo</h1>
    {{ $name }}
    @include('shared._weekend') --}}
    <mynav></mynav>
@endsection

@section('content')
    {{-- <h1>Demo</h1>
    {{ $name }}
    @include('shared._weekend') --}}
    {{-- @include('layouts/partials/_nav', ['age' => 22]) --}}
    <Signup></Signup>
@endsection

@section('footer')
    <script src="../js/app.js"></script>
@endsection

