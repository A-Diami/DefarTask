<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    

    protected $rules =[
        'title' => 'required',
        'description' => 'required',
        'statut' => 'required',
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //Role::create(['name'=>'Admin']);
      //$permission= Permission::create(['name'=>'Edit Task']);
       //$role = Role::findById(4);
       //$permission = Permission::findById(5);
      
       //$permission->removeRole($role);
      // 
     //$role->givePermissionTo($permission);
        //auth()->user()->givePermissionTo('Delete Task');
        //auth()->user()->assignRole('Admin');
        //return auth()->user()->getAllPermissions();

        //return User::permission('Post Task')->get();
        $tasks = [
            'tache' => [],
            'faire' => [],
            'finie' => [],

        ];

        foreach(Task::all()->sortByDesc('updated_at') as $task){
            $tasks[$task->statut][] = $task;
        }

        return view('tasks.index', compact('tasks'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->input(), $this->rules);

        if($validator->fails()){
            return response()->json([
                'errors' => $validator->getMessageBag()->toArray(),
            ]);
        }

        $task = Task::add($request->all());

        $card= view('partials.tasks.card')->with('task', $task)->render();

        return response()->json([
            'task' => $task,
            'card' => $card,
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->input(), $this->rules);
        if($validator->fails()){
            return response()->json([
                'errors' =>$validator->getMessageBag()->toArray(),
            ]);
        }

        $task = Task::find($id);
        $task->edit($request->all());

        $card= view('partials.tasks.card')->with('task', $task)->render();

        return response()->json([
            'task' => $task,
            'card' => $card,
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrfail($id);
        $task->commentaire()->delete();
        $task->delete();

        return response()->json($task);
    }

     public function getDataJson(){
        $tasks = [
            'tache' => [],
            'faire' => [],
            'finie' => [],

        ];

        foreach(Task::all()->sortByDesc('updated_at') as $task){
            $tasks[$task->statut][] = $task;
        }

        return response()->json($tasks);
    }
}
