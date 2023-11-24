<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\Admin\ProjectResource;
use App\Project;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectsApiController extends Controller
{
    public function index()
    {
        //later  abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectResource(Project::all()); // Update with the appropriate relationships
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->all());

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Project $project)
    {
        //later   abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectResource($project); // Update with the appropriate relationships
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Project $project)
    {
        //abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

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
