<div class="modal fade" id="deleteTaskForm" tabindex="-1" role="dialog" aria-labelledby="deleteTaskFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteTaskFormLabel">Supprimer tache</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        Voulez-vous supprimer la tache?
                    </div>
                    <div class="card-body">
                        <div class="title">
                            <span class="text-muted">Titre</span> <span class="card-title"></span>
                        </div>
                        <div class="description">
                            <span class="text-muted">Description</span> <span class="card-text"></span>
                        </div>
                        <div class="status">
                            <span class="text-muted">Statut</span> <span class="card-status text-uppercase"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger delete-task-confirm" data-dismiss="modal">
                    <i class="fa fa-trash" aria-hidden="true"></i> Supprimer
                </button>
                <button type="button" class="btn btn-danger-warning" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i> Cancel
                </button>
            </div>
        </div>
    </div>
</div>