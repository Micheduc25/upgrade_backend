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

        $tasks =  TaskModel::all();
        return response()->json([
            "tasks" => $tasks
        ], 200);
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
    public function updatetask_ad(Request $request, $aid, $uid, $tid)
    {
        $user = User1::findOrFail($aid);
        $updated_tasks_tab = [];
        if($user->role == "administrator" || $user->role == "super_administrator"  || $user->role == "supervisor"){
            $task = TaskModel::findOrFail($tid);
            $gooduser = User1::findOrFail($uid);
            $task->update($request->all());
            if($user->updated_tasks!=null && gettype($user->updated_tasks) == "integer"){
                //$updated_tasks_tab = $user->updated_tasks;
                array_push($updated_tasks_tab, $user->updated_tasks);
            }else if($user->updated_tasks!=null && gettype($user->updated_tasks) == "array"){
                $updated_tasks_tab = $user->updated_tasks;
            }
            //$updated_tasks_tab = $user->updated_tasks;
            array_push($updated_tasks_tab, $task->id);
            $gooduser->updated_tasks=$updated_tasks_tab;
            $gooduser->save();
            return response()->json([
                "user tab" => $gooduser->updated_tasks
            ], 201);
        }

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
    public function destroyTask_ad($aid, $uid, $tid)
    {
        $admin = User1::find($aid);
        $deleted_tasks_tab = [];
        if($admin->role == "administrator" || $admin->role == "super_administrator" || $admin->role == "supervisor"){
            $user = User1::find($uid);
            $task = TaskModel::findOrFail($tid);
            $task->user1()->detach();
            $user->task()->detach($tid);
            if($user->deleted_tasks!=null){
                $deleted_tasks_tab = $user->deleted_tasks;
            }
            array_push($deleted_tasks_tab, $task->id);
            $task->delete();
            $user->deleted_tasks=$deleted_tasks_tab;
            $user->save();
            
            return 204;
        }

    }
}
