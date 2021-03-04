<?php

namespace App;

use App\Task;
use Illuminate\Database\Eloquent\Model;

class Commentaires extends Model
{
    protected $fillable = [
        'commentaire', 'task_id'
    ];

    public function task(){
        return $this->belongsTo(Task::class);
    }

    public static function add($fields){

        $commentaires = new static;
        $commentaires->fill($fields);
        $commentaires->save();

        return $commentaires;
    }

    public function edit($fields){
        $this->fill($fields);
        $this->save();
    }

    public static function getComments($taskId){
        return Commentaires::all()->where('task_id', $taskId)->sortBy('created_at');
    }

}
