<div class="card card-{{ $task->id }} mb-9">
    <div class="card-header text-right">
        <span class="badge badge-light justify-content-end" >
            <i class="fa fa-calendar" aria-hidden="true"></i>{{ $task->updated_at }}
        </span>
        <span class="badge badge-{{ App\Task::getTaskClass($task->statut) }} justify-content-end">
             <i class="fa fa-exchange" aria-hidden="true"></i><span class="card-status">{{ $task->statut }}</span>
        </span>
        <span class="badge badge-warning justify-content-end">
             <i class="fa fa-commenting-o" aria-hidden="true"></i>{{ $task->commentaire->count() }}
        </span>
    </div>

    <div class="card-body">
        <h5 class="card-title">{{ $task->title }}</h5>
        <p class="card-text">{{ $task->description }}</p>
    </div>   
    <div class="card-footer text-right">
        <button type="button" class="btn btn-outline-info edit-task" data-toggle="modal" data-target="#editTaskForm" data-id="{{ $task->id }}">
            <i class="fa fa-pencil" aria-hidden="true"></i> Editer
        </button>
        <button type="button" class="btn btn-danger-info delete-task" data-toggle="modal" data-target="#deleteTaskForm" data-id="{{ $task->id }}">
            <i class="fa fa-trash" aria-hidden="true"></i> Supprimer
        </button>
    </div>
</div>