@extends('layouts')
@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h1>Users Index</h1>
    <p>This is the users index page.</p>
@endsection
