@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Change Status
    </div>

    <div class="card-body">
        <form action="{{ route("admin.locations.update", [$location->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('claim_status') ? 'has-error' : '' }}">
                <label for="claim_status">Status</label>
                <select id="claim_status" name="claim_status" class="form-control" required>
                    <option value="0" {{ old('claim_status', $location->claim_status) == 0 ? 'selected' : '' }}>Unprocessed</option>
                    <option value="1" {{ old('claim_status', $location->claim_status) == 1 ? 'selected' : '' }}>Processed</option>
                </select>
                @if($errors->has('claim_status'))
                    <em class="invalid-feedback">
                        {{ $errors->first('claim_status') }}
                    </em>
                @endif
                <p class="helper-block">
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="Save">
            </div>
        </form>
    </div>
</div>
@endsection
