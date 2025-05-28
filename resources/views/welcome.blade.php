@extends('layouts')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h1 class="display-4 text-center">Welcome to MyApp</h1>
                    </div>
                    <div class="card-body">
                        <p class="lead text-center">This is your personalized home page. Explore the features and enjoy your stay!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(auth()->check() && auth()->user()->role === 'admin')
        <!-- admin links -->
    @endif
@endsection