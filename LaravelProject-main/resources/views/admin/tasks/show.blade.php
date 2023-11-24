@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.task.title_singular') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.id') }}
                        </th>
                        <td>
                          test
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.title') }}
                        </th>
                        <td>
                            {{ $task->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.datedebut') }}
                        </th>
                        <td>
                            {{ $task->datedebut }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.datefin') }}
                        </th>
                        <td>
                            {{ $task->datefin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.etattache') }}
                        </th>
                        <td>
                            {{ $task->etattache }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.id_project') }}
                        </th>
                        <td>
                            {{ $task->id_project }}
                        </td>
                    </tr>
                    <!-- Add other fields based on the configuration -->
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection
