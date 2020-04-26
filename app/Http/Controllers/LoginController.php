<?php

namespace App\Http\Controllers;

use App\User1;
use App\TaskModel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $test = User1::where('username','rodyl')->count();
        $user = User1::where('username','rodyl')->first();
        $test2 = TaskModel::all();
        $task = TaskModel::all()->get(0);
        dump($test);
        dump(count($test2));
        dump($user->username);
        dump($task->title);
        return view('pages.login');
    }

    public function checklogin(Request $request){
        $this->validate($request, [
            'username'=>'required|username',
            'password'=>'required|alphanum|min:3'
        ]);

        $user1_data = array(
            'username'=>'uname',
            'password'=>'pwd'
        );

        dd($user1_data);

    }

}
