@extends('layouts.main')

@section('banner', 'Project: ' . $project->title)

@section('content')
<div class="col-lg-8 post-list">
    <div class="single-post d-flex flex-row">

            <img src="{{ asset('img/projet1.png') }}" alt="Project Image" style="max-width: 40%;">


        <div class="details">
            <div class="title d-flex flex-row justify-content-between">
                <div class="titles">
                    <a href="#"><h4>{{ $project->title }}</h4></a>
                    @if($project->client)
                        <h6>{{ $project->client->name }}</h6>
                    @endif
                </div>
            </div>
            <p>
                {{ $project->Description }}
            </p>
           
            <p>Date Debut: {{ $project->DateDebut }}</p>
            <p>Date Fin: {{ $project->DateFin }}</p>
            <p>Budget: {{ $project->Budget }}</p>

            <p>Competences: {{ $project->competences }}</p>
            <!-- Add any other project-related details you want to display -->
        </div>
    </div>
    <div class="single-post project-details">
        <h4 class="single-title">Details of the Project</h4>
        <p>
            <!-- Add the specific details related to the project -->
        </p>
    </div>
    <div class="single-post project-tasks">
        <h4 class="single-title">Tasks for the Project</h4>
        <p>
            <!-- Add the details of the tasks related to the project -->
        </p>
    </div>
</div>
@endsection
