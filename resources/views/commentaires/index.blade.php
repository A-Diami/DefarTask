<span class="text-muted">Taches Commentaires:</span>
<div class="commentaires">
    @foreach($commentaire as $comments)
        @include('partials.commentaires.commentaire')
    @endforeach
</div>