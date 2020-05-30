<?php

namespace App\Http\Controllers;

use App\User1;
use App\TaskModel;
use Illuminate\Http\Request;

class User1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = User1::all()->get(0);
        dd($user->username);
        return view('pages.login');
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
     * @param  \App\User1  $user1
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User1::find($id);
        return $user;
    }
    public function getAllUser($id)
    {
        $user = User1::findOrFail($id);
        if($user->role == "administrator" || $user->role == "super_administrator"){
            return User1::all();
        }
        return;
    }

    /**
     * set user role as supervisor
     */
    public function makesprvsr($id){
        $user = User1::findOrFail($id);
        $user->role = "supervisor";
        $user->save();
    }
    /**
     * set user role as supervisor
     */
    public function removesprvsr($id){
        $supervisor = User1::findOrFail($id);
        $oversees = $supervisor->supervise;
        foreach( $oversees as $oversee ){
            $supervisor->supervise()->detach($oversee->id);
            $oversee->superviser_par()->detach($id);
        }

        $supervisor->role = "user";
        $supervisor->save();
    }
    /**
     * 
     */
    public function oversee($id, $usersidtab){
        $supervisor = User1::findOrFail($id);
        if($user->role == "supervisor"){
            foreach($usersidtab as $id){
                $user = User1::findOrFail($id);
                $supervisor->supervise()->save($user);
                $user->superviser_par()->save($supervisor);
            }
            return response()->json([
                
            ], 200);
        }
        return response()->json([
                "baduser"=>"Selected user is not a supervisor"
        ], 500);
    }

    public function getUserTasks($id)
    {
        return (User1::findOrFail($id)->task);
        //return (User1::where('id', $id)->task);
    }
    public function getCurrentUser($id)
    {
        $user = User1::find($id);
        return response()->json([
            "currUser" => $user
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User1  $user1
     * @return \Illuminate\Http\Response
     */
    public function edit(User1 $user1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User1  $user1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User1 $user1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User1  $user1
     * @return \Illuminate\Http\Response
     */
    public function destroy(User1 $user1)
    {
        //
    }

    public function destroyUser($id)
    {
        $user = User1::findOrFail($id);
        $tasks = $user->task;
        foreach ($tasks as $task) {
            $task->delete();
        }
        $user->delete();
        return 204;
    }
}
