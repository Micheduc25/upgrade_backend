
@extends('layouts.app', ['title' => 'Home'])



@section('content')
    {{-- <h1>Demo</h1>
    {{ $name }}
    @include('shared._weekend') --}}
    {{-- @include('layouts/partials/_nav', ['age' => 22]) --}}
    <my-nav></my-nav>
    <to-do></to-do>
@endsection

@section('footer')
    <script src="../../js/app.js"></script>
@endsection

