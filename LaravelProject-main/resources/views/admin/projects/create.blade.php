@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.project.title_singular') }}
    </div>

    <div class="card-body">
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">{{ trans('cruds.project.fields.titre') }}*</label>
            <input type="text" id="title" name="titre" class="form-control" value="{{ old('titre') }}" required>
        </div>
        <div class="form-group">
            <label for="description">{{ trans('cruds.project.fields.Description') }}</label>
            <textarea id="description" name="Description" class="form-control">{{ old('Description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="start_date">{{ trans('cruds.project.fields.DateDebut') }}</label>
            <input type="text" id="start_date" name="DateDebut" class="form-control date" value="{{ old('DateDebut') }}">
        </div>
        <div class="form-group">
            <label for="end_date">{{ trans('cruds.project.fields.DateFin') }}</label>
            <input type="text" id="end_date" name="DateFin" class="form-control date" value="{{ old('DateFin') }}">
        </div>
        <div class="form-group">
            <label for="budget">{{ trans('cruds.project.fields.Budget') }}</label>
            <input type="text" id="budget" name="Budget" class="form-control" value="{{ old('Budget') }}">
        </div>
        <div class="form-group">
            <label for="competences">{{ trans('cruds.project.fields.competences') }}</label>
            <input type="text" id="competences" name="competences" class="form-control" value="{{ old('competences') }}">
        </div>
   <!--     <div class="form-group">
            <label for="status">{{ trans('cruds.project.fields.etat') }}</label>
            <input type="text" id="status" name="etat" class="form-control" value="{{ old('etat') }}">
        </div>-->
        <div>
            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
        </div>
    </form>
</div>

</div>
@endsection
