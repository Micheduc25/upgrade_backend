
@extends('layouts.app', ['title' => 'login'])


@section('content')
    {{-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    <log-in :user="user"></log-in>
    {{-- <example-component></example-component> --}}
    {{-- @include('shared._weekend') --}}
@endsection

@section('footer')
    <script src="../../js/app.js"></script>
    {{-- <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script> --}}
@endsection