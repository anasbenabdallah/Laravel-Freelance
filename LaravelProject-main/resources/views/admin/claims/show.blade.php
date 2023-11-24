@can('location_access')
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Show Details
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $claim->id }}</td> <!-- Updated variable name to $claim -->
                    </tr>
                    <tr>
                        <th>Details</th>
                        <td>{{ $claim->claim_details }}</td> <!-- Updated variable name to $claim -->
                    </tr>
                    <tr>
                        <th>Rating</th>
                        <td>{{ $claim->claim_rating }}⭐</td> <!-- Updated variable name to $claim -->
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Back to list
            </a>
        </div>
    </div>
</div>

<div class="container mt-4">
    <h3>Comments</h3>
    <div style="max-height: 400px; overflow-y: auto;">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    @if ($comment->claim_id == $claim->id)
                        <tr>
                            <td>
                                @if ($comment->comment_role == 1)
                                    <span style="color: red;">[Admin]: {{ $comment->comment_text }}</span>
                                @else
                                    [User]: {{ $comment->comment_text }}
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td>
                        <form action="{{ route("admin.claims.store") }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="comment_text" id="comment_text" class="form-control" placeholder="Add Comment">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <input type="hidden" name="comment_role" value="1">
                                    <input type="hidden" name="claim_id" value="{{ $claim->id }}">
                                </div>
                            </div>
                            @error('comment_text') <!-- Display validation errors for 'comment_text' -->
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


@endsection
@endcan