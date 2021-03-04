<!DOCTYPE html>
<html>
<head>
    <titre>DEFAR TASK</titre>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>
<body>
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
        </div>
        
        </div>
    </div>

</body>
</html>