<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{

    protected $rules =[
        'title' => 'required',
        'description' => 'required',
        'statut' => 'required',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $task->commentaire->delete();
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
