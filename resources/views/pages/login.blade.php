
@extends('layouts.app')


@section('content')
    
    <div id="app">
        
        <Login></Login>
        {{-- <Todo></Todo> --}}
    </div>
    {{-- @include('shared._weekend') --}}
@endsection

@section('footer')
    <script src="../../js/login.js"></script>
    <script src="../../js/app.js"></script>
    {{-- <script src="../../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script> --}}
@endsection