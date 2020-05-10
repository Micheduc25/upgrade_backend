


@extends('layouts.app', ['title' => 'test'])

@section('navigation')
    {{-- <h1>Demo</h1>
    {{ $name }}
    @include('shared._weekend') --}}
    <my-nav></my-nav>
@endsection

@section('content')
    {{-- <h1>Demo</h1>
    {{ $name }}
    @include('shared._weekend') --}}
    {{-- @include('layouts/partials/_nav', ['age' => 22]) --}}
    <sign-up></sign-up>
    <example-component></example-component>
@endsection

@section('footer')
    <script src="../js/app.js"></script>
@endsection

