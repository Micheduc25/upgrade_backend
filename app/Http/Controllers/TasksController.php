<?php

namespace App\Http\Controllers;
use App\User1;
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
        // echo "index controller";
        // dd(TaskModel::find(2));
        // return view('pages.about',[
        //     'pages'=>TaskModel::all(),
        // ]);User1::$currentUser

        return (TaskModel::all());
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
    
    public function maddtask(Request $request, $id)
    {
        $user = User1::find($id);
        $task = TaskModel::create($request->all());

        $user->task()->save($task);
        $task->user1()->save($user);
        return $task;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {   
        $user = User1::find($id);
        $task = TaskModel::create($request->all());

        $user->task()->save($task);
        $task->user1()->save($user);
        return $task;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TaskModel  $taskModel
     * @return \Illuminate\Http\Response
     */
    public function show(TaskModel $taskModel){
        
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
    public function updatetask(Request $request, $id)
    {
        $task = TaskModel::findOrFail($id);
        $task->update($request->all());
        return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TaskModel  $taskModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskModel $taskModel, $id)
    {
        $task = TaskModel::findOrFail($id);
        $task->destroy();
        return 204;
    }

    public function destroyTask($id, $uid)
    {
        $user = User1::find($uid);
        $task = TaskModel::findOrFail($id);
        $task->user1()->detach();
        $user->task()->detach($id);
        $task->delete();
        return 204;
    }
}
