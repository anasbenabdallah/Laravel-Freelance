@extends('layouts.main')

@section('banner', $banner)

@section('content')
<div class="col-lg-8 post-list">

    <h2 class="mb-5"> Project List</h2>

    @foreach($projects as $project)
        <div class="single-post d-flex flex-row">

                <img src="{{ asset('img/projet1.png') }}" alt="Project Image" style="max-width: 40%; height:">


            <div class="details">
                <div class="title d-flex flex-row justify-content-between">
                    <div class="titles">
                        <a href="{{ route('projects.show', $project->id) }}"><h4>  {{ $project->title }}</h4></a>
                        <h4> {{ $project->titre }}</h4>
                    </div>
                </div>
                <p>
                  Description :  {{ $project->Description }}
                </p>
       
                <p>Date Debut: {{ $project->DateDebut }}</p>
                <p>Date Fin: {{ $project->DateFin }}</p>
                <p>Budget: {{ $project->Budget }}</p>
                <p>Competences: {{ $project->competences }}</p>

                <!-- Add any other project-related details you want to display -->
                 <!-- Retrieve and display task titles for this project -->
                <h5>Tasks for this Project:</h5>
                <ul>
                    @php
                        $tasks = DB::table('tasks')->where('id_project', $project->id)->get();
                    @endphp
                    @foreach($tasks as $task)
                        <li>{{ $task->title }}</li>
                    @endforeach
                </ul>
                          <div>
                                <h5>Created by:</h5>
                                <p> benabdallah.anas2000@gmail.com </p>
                          </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
