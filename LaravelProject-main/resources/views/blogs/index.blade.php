@extends('layouts.app')
@extends('layouts.me')
@section('styles')
<style>

body {
        background-image: url('{{ asset('img/blog2.jpg') }}');
        background-size: cover;
        background-position: center;
    }
/* General Blog Styling */
.blog-post {
    background-color: #fff;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
    transition: transform 0.3s ease-in-out;
    will-change: transform;
}

.blog-header {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.blog-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 15px;
    object-fit: cover;
}

.blog-author h5 {
    margin: 0;
    color: #365899;
    font-weight: bold;
}

.blog-author small {
    color: #90949c;
}

/* Link Styling */
.blog-post a {
    color: #365899;
    text-decoration: none;
}

.blog-post a:hover {
    text-decoration: underline;
}
.blog-post:hover {
    background-color: #f5f6f7;
    transition: background-color 0.3s;
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.comments-section {
   margin-top: 20px;
}

.comment {
   display: flex;
   align-items: start;
   margin-bottom: 10px;
}

.comment-avatar {
   width: 30px;
   height: 30px;
   border-radius: 50%;
   margin-right: 10px;
   object-fit: cover;
}

.comment-content {
   background-color: #f2f3f5;
   padding: 5px 10px;
   border-radius: 18px;
   max-width: 80%;
}

.comment-content p {
   margin: 0;
   word-wrap: break-word;
}

.comment-input {
   width: 80%;
   padding: 5px 10px;
   border-radius: 18px;
   border: 1px solid #ccd0d5;
   margin-right: 5px;
}

</style>
@endsection



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1>All Blogs</h1>
                <a href="{{ route('blogs.create') }}" class="btn btn-primary">Add New Blog</a>
            </div>

            <form method="GET" action="{{ route('blogs.index') }}">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <input type="text" name="title" class="form-control" placeholder="Search by titre">
                    </div>
                    <div class="form-group col-md-3">
                        <button type="submit" class="btn btn-primary mt-1">Search</button>
                    </div>
                </div>
            </form>


            @foreach($blogs as $blog)
    <div class="blog-post">
        <div class="blog-header">
            <img src="{{ asset('img/background3.png') }}" alt="User Avatar" class="blog-avatar">
            <div class="blog-author">
                <h5>{{ $blog->user->name }}</h5>
                <small>{{ $blog->created_at->diffForHumans() }}</small>
            </div>
        </div>
        <h3><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h3>
        <p>{{ Str::limit($blog->description, 250) }}</p> 
    </div>
    <div class="comments-section">
       <hr>
       @foreach($blog->comments as $comment)
           <div class="comment">
               <img src="{{ asset('img/background3.png') }}" alt="User Avatar" class="comment-avatar">
               <div class="comment-content">
                   <strong>{{ $comment->user->name }}</strong>
                   <p>{{ $comment->description }}</p>
               </div>
           </div>
       @endforeach
   </div>
@endforeach
        </div>
    </div>
</div>
@endsection