


@extends('layouts.app', ['title' => 'Home'])


@section('content')
    {{-- <h1>Demo</h1>
    {{ $name }}
    @include('shared._weekend') --}}
    <div id="app">
        <Todo></Todo>
    </div>
@endsection

@section('footer')
    <script src="../js/app.js"></script>
@endsection

