<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Project;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectsController extends Controller
{
    public function index()
    {
        // abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        // we will do this later 
        return view('admin.projects.create');
    }

    public function store(StoreProjectRequest $request)
    {
        // we will do this later 
        
        $projects = Project::create($request->all());

        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project)
    {
        // we will do this later 
        return view('admin.projects.edit', compact('project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());
        return redirect()->route('admin.projects.index');
    }
    

    public function show(Project $project)
    {
        // we will do this later 
        return view('admin.projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        // we will do this later 
        $project->delete();
        return back();
    }

    public function massDestroy(MassDestroyProjectRequest $request)
    {
        // we will do this later    
        Project::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function updateStatus(Request $request, Project $project)
    {
        try {
            $status = $request->input('status');
            if ($status === 'accepted' || $status === 'rejected') {
                $project->etat = $status;
                $project->save();
    
                return response()->json(['success' => true]);
            } else {
                throw new \Exception('Invalid status provided. Status must be either "accepted" or "rejected".');
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

}