<?php

namespace App\Http\Controllers;

use App\Commentaires;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentairesController extends Controller
{
    protected $rules =[
        'commentaire' => 'required',
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
    public function index($taskId)
    {
        $commentaire = Commentaires::getComments($taskId);
        return response()->json([
            'commentaire' => $commentaire->count() ? view('commentaire.index', compact('commentaire'))->render() : '',
        ]);
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

       return Commentaires::add($request->all());
    }



}
