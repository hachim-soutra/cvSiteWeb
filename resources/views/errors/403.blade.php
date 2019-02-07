@extends('layouts.app')
@section('title')
    403
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <span class="display-1 d-block">404</span>
                <div class="mb-4 lead">The page you are looking for was not found.</div>
                <a href="{{ url('cvs')}}" class="btn btn-link">Back to Home</a>
            </div>
        </div>
    </div>
@endsection