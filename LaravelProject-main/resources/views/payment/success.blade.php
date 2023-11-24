@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-success">
                {{ $message }}
            </div>
            <a href="{{ url('/') }}" class="btn btn-primary">Return to Home</a>
        </div>
    </div>
</div>
@endsection
