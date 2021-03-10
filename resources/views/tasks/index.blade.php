@extends('layouts.default')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <div class="container">
        <div class="row mt-3 mb-3">
            <div class="col-sm-6">
                <h3><b>Mes Taches</b></h3>
            </div>
            <div class="col-sm-6 text-right">
                <button class="btn btn-success add-task-form" data-toggle="modal" data-target="#addTaskForm">
                    <i class="fa fa-plus" aria-hidden="true"></i> Ajouter une tache
                </button>
            </div>
        </div>
        <div class="row mb-3">
                @foreach($tasks as $statut => $taskByType )
                <div class="col-sm-4">
                    <div class="card border-{{ App\Task::getTaskClass($statut) }} h-100">
                        <div class="card header bg-{{ App\Task::getTaskClass($statut) }} text-light text-uppercase">
                            <b>{{ $statut }}</b>
                        </div>
                        <div class="card-body pb-0 {{ $statut }}">
                            @foreach($taskByType  as $task)
                                @include('partials.tasks.card')
                            @endforeach
                        </div>
                        
                    </div>
                </div>
                @endforeach
        </div>  
    </div>
@include('partials.tasks.add')
@include('partials.tasks.delete')
@include('partials.tasks.edit')
@include('partials.commentaires.add')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript" src="{{ asset('js/task.js') }}"></script>
@endsection