@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.task.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.tasks.update', [$task->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.task.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($task) ? $task->title : '') }}" required>
                <!-- Other fields based on the 'Task' model attributes -->
            </div>
            <div class="form-group {{ $errors->has('datedebut') ? 'has-error' : '' }}">
                <label for="datedebut">{{ trans('cruds.task.fields.datedebut') }}</label>
                <input type="text" id="datedebut" name="datedebut" class="form-control date" value="{{ old('datedebut', isset($task) ? $task->datedebut : '') }}">
                <!-- Add necessary error handling for the field if needed -->
            </div>
            <div class="form-group {{ $errors->has('datefin') ? 'has-error' : '' }}">
                <label for="datefin">{{ trans('cruds.task.fields.datefin') }}</label>
                <input type="text" id="datefin" name="datefin" class="form-control date" value="{{ old('datefin', isset($task) ? $task->datefin : '') }}">
            </div>
            <div class="form-group {{ $errors->has('etattache') ? 'has-error' : '' }}">
                <label for="etattache">{{ trans('cruds.task.fields.etattache') }}</label>
                <input type="text" id="etattache" name="etattache" class="form-control" value="{{ old('etattache', isset($task) ? $task->etattache : '') }}">
            </div>
            <div class="form-group {{ $errors->has('id_project') ? 'has-error' : '' }}">
                <label for="id_project">{{ trans('cruds.task.fields.id_project') }}</label>
                <input type="text" id="id_project" name="id_project" class="form-control" value="{{ old('id_project', isset($task) ? $task->id_project : '') }}">
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
