<div class="modal fade" id="editTaskForm" tabindex="-1" role="dialog" aria-labelledby="editTaskFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTaskFormLabel">Modifier tache</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="box-body">
                            <div class="form-group">
                                <label for="task-title">Titre</label>
                                <input type="text" class="form-control" id="task-title" placeholder="Titre Tache" name="title" value="{{ old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="task-status">Selection statut</label>
                                <select class="form-control" id="task-status">
                                    <option value="tache">TACHE</option>
                                    <option value="faire">FAIRE</option>
                                    <option value="finie">FINIE</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="task-description">Description</label>
                                <textarea name="description" id="task-description" cols="15" rows="5" placeholder="Description Tache" class="form-control">{{ old('description')}}</textarea>
                            </div>
                    </div>
                </form>
                <div class="text-right">
                    <button type="button" class="btn btn-secondary add-comments-form" data-toggle="modal" data-target="#addCommentaireForm">
                        <i class="fa fa-plus" aria-hidden="true"></i> Ajouter un commentaire
                    </button>
                </div>
                <div id="task-comments"></div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-outline-info edit-task-save">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i> Ajouter
                </button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i> Fermer
                </button>
            </div>
        </div>
    </div>
</div>