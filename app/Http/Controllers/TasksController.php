<?php

namespace App\Http\Controllers;

use App\TaskModel;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        echo "index controller";
        dd(TaskModel::find(2));
        // return view('pages.about',[
        //     'pages'=>TaskModel::all(),
        // ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TaskModel  $taskModel
     * @return \Illuminate\Http\Response
     */
    public function show(TaskModel $taskModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TaskModel  $taskModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskModel $taskModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TaskModel  $taskModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskModel $taskModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TaskModel  $taskModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskModel $taskModel)
    {
        //
    }
}
