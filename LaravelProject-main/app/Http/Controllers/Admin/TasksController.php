<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Task;
use App\Project;
use App\Location;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TasksController extends Controller
{
    public function index()
    {
        // abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tasks = Task::all();

        return view('admin.tasks.index', compact('tasks'));
    }

    public function create()
    {
        // we will do this later abort_if(Gate::denies('task_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tasks.create', compact('projects'));
    }

    public function store(StoreTaskRequest $request)
    {
        // we will do this later    
        $task = Task::create($request->all());

        return redirect()->route('admin.tasks.index');
    }

    public function edit(Task $task)
    {
        // we will do this later    abort_if(Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $task->load('project');

        return view('admin.tasks.edit', compact('projects', 'task'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        // we will do this later    
        $task->update($request->all());

        return redirect()->route('admin.tasks.index');
    }

    public function show(Task $task)
    {
        // we will do this later     abort_if(Gate::denies('task_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task->load('project');
        return view('admin.tasks.show', compact('task'));
    }

    public function destroy(Task $task)
    {
        // we will do this later     abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaskRequest $request)
    {
        // we will do this later    
        Task::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
