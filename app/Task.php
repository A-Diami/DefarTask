<?php

namespace App;

use App\Commentaires;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected const TASK_CLASS_TACHE = 'secondary';
    protected const TASK_CLASS_FAIRE = 'primary';
    protected const TASK_CLASS_FINIE = 'success';
    protected $fillable =[
        'title', 'description','statut'
    ];

    public function commentaire(){
        return $this->hasMany(Commentaires::class);
    }

    public static function add($fields){

        $task = new static;
        $task->fill($fields);
        $task->save();

        return $task;
    }

    public function edit($fields){
        $this->fill($fields);
        $this->save();
    }

    public function getTaskClass($statut){
        $classes = [
            'tache' => self::TASK_CLASS_TACHE,
            'faire' => self::TASK_CLASS_FAIRE,
            'finie' => self::TASK_CLASS_FINIE,
        ];

        return $classes[$statut] ?? NULL;
    }


}
