@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.task.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.tasks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.task.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>
            <div class="form-group">
                <label for="datedebut">{{ trans('cruds.task.fields.datedebut') }}</label>
                <input type="text" id="datedebut" name="datedebut" class="form-control date" value="{{ old('datedebut') }}">
            </div>
            <div class="form-group">
                <label for="datefin">{{ trans('cruds.task.fields.datefin') }}</label>
                <input type="text" id="datefin" name="datefin" class="form-control date" value="{{ old('datefin') }}">
            </div>
            <div class="form-group">
                <label for="etattache">{{ trans('cruds.task.fields.etattache') }}</label>
                <input type="text" id="etattache" name="etattache" class="form-control " value="{{ old('etattache') }}">
            </div>
            <div class="form-group">
                <label for="id_project">{{ trans('cruds.task.fields.id_project') }}</label>
                <input type="text" id="id_project" name="id_project" class="form-control" value="{{ old('id_project') }}">
            </div>
            <!-- Add other fields based on the configuration -->
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
