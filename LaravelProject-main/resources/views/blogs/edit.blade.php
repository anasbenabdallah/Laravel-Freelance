@extends('layouts.app')

@section('styles')
<style>
    body {
        background-image: url('{{ asset('img/blog2.jpg') }}');
        background-size: cover;
        background-position: center;
    }
</style>
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Blog</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('blogs.update', $blogs->id) }}" method="post" class="bg-light p-4 rounded">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blogs->title) }}">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="5">{{ old('description', $blogs->description) }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection