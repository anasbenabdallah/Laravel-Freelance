<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $banner = 'Projects';
        return view('projects.index', compact(['projects', 'banner']));
    }

    public function show(Project $project)
    {
        // You can add logic here to load related data if necessary
        return view('projects.show', compact('project'));
    }

    // You can add more methods here for handling other actions related to projects
    // For example, you can have methods for creating, editing, updating, and deleting projects

    // Example method for creating a new project
    public function create()
    {
        // Add code for creating a new project
    }

    // Example method for storing a new project
    public function store(Request $request)
    {
        // Add code for storing a new project
    }

    // Example method for editing an existing project
    public function edit(Project $project)
    {
        // Add code for editing an existing project
    }

    // Example method for updating an existing project
    public function update(Request $request, Project $project)
    {
        // Add code for updating an existing project
    }

    // Example method for deleting an existing project
    public function destroy(Project $project)
    {
        // Add code for deleting an existing project
    }
}
