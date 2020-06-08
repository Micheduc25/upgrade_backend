<?php

namespace App\Http\Controllers;

use App\User1;
use App\TaskModel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public $currentUser=null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // $test = User1::where('username','rodyl')->count();
        // $user = User1::where('username','rodyl')->first();
        // $test2 = TaskModel::all();
        // $task = TaskModel::all()->get(0);
        // dump($test);
        // dump(count($test2));
        // dump($user->username);
        // dump($task->title);
        //dump(User1::$currentUser);
        return view('pages.help');
    }

    public function checklogin(Request $request){
        // $this->validate($request, [
        //     'username'=>'required|username',
        //     'password'=>'required|alphanum|min:3'
        // ]);

        //echo("test check");
        // $user1_data = array(
        //     'username'=>$request->get('username'),
        //     'password'=>$request->get('password')
        // );
        //echo($request->input('username'));
        // echo "separation";
        $user = User1::where('username',$request->input('username'))
                        ->where('password',$request->input('password'))
                        ->first();


        $this->currentUser = $user;
        return $user;
        // echo($user1_data);
        // return $user1_data;

    }
    public function register(Request $request){
        $user = User1::create([
            'username'=>$request->input('username'),
            'password'=>$request->input('password'),
            'role'=>$request->input('role'),
        ]);


        $this->currentUser = $user;
        return ($user);

    }

    public function getCurrentUser(){
        return ($this->currentUser);
        // return "currentUser";
    }

    public function store(Request $request){
        echo("test check");
        return view('welcome');
        //return TaskModel::create($request->all());
    }

}
