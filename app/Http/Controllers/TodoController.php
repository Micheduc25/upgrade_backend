<?php

namespace App\Http\Controllers;

use App\User1;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.todo');
        //return redirect('');
    }

    public function getUser($id)
    {
        //return User1::find($id);
        echo url()->current();
        return view('pages.todo', ['user' => User1::findOrFail($id)]);
    }
}
