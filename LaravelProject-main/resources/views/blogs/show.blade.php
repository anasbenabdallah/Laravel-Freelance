@extends('layouts.app')




@section('styles')
<style>

body {
        background-image: url('{{ asset('img/blog2.jpg') }}');
        background-size: cover;
        background-position: center;
    }
/* Blog Post */
.blog-post {
    border: 1px solid #e9ecef;
    padding: 15px;
    border-radius: 10px;
    background-color: #ffffff;
    margin-bottom: 20px;
}

/* Blog Actions */
.blog-actions {
    margin-top: 10px;
}

/* Comment Form */
.comment-form {
    margin-top: 20px;
}

/* Comments Section */
.comments-section {
    margin-top: 30px;
}

.comments-section .comment {
    display: flex;
    margin-bottom: 10px;
    padding: 10px;
    background-color: #f2f3f5;
    border-radius: 10px;
}

.user-avatar img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.comment-body {
    flex-grow: 1;
}

.comment-body p {
    margin: 0 0 5px;
    color: #333;
}

.comment-body strong {
    color: #365899;
    font-weight: bold;
}

.comment-body small {
    color: #888;
    font-size: 12px;
}

</style>
@endsection












@section('content')

<div class="blog-post">
    <h2>{{ $blogs->title }}</h2>
    <p>{{ $blogs->description }}</p>
    @if($blogs->image)
        <img src="{{ asset('images/' . $blogs->image) }}" alt="{{ $blogs->title }}" class="img-fluid mb-3">
    @endif
</div>


<div class="blog-actions">
    <a href="{{ route('blogs.edit', $blogs->id) }}" class="btn btn-light btn-sm">Edit</a>
    <form action="{{ route('blogs.destroy', $blogs->id) }}" method="post" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
    </form>
</div>


<div class="comment-form">
    <form action="{{ route('comments.store', $blogs->id) }}" method="post">
        @csrf
        <div class="form-group">
            <textarea name="description" id="description" rows="4" class="form-control" placeholder="Write a comment..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Post</button>
    </form>
</div>

{{-- Display existing comments --}}
<div class="comments-section">
    @foreach($blogs->comments as $comment)
        <div class="comment">
            <div class="user-avatar">
                <img src="{{ asset('img/background3.png') }}" alt="User Avatar">
            </div>
            <div class="comment-body">
                <strong>{{ $comment->user->name }}</strong>
                <p>{{ $comment->description }}</p>
                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
            </div>
        </div>
    @endforeach
</div>

@endsection