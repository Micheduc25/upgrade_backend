<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;


// require_once 'vendor/autoload.php';

// use GraphAware\Neo4j\Client\ClientBuilder;



class TaskController extends Controller
{
    public function index($userid){
        // $client = ClientBuilder::create()
        //     ->addConnection('default', 'http://neo4j:localhost:7474') // Example for HTTP connection configuration (port is optional)
        //     ->addConnection('bolt', 'bolt://neo4j:root@localhost:7687') // Example for BOLT connection configuration (port is optional)
        //     ->build();
        // $result = $client->run('MATCH (n:Person) RETURN n');
        // echo $result;
        return Task::whereUserid($userid)->get();
    }
    
    public function show($id){
        return Task::find($id);
    }
    public function store(Request $request){
        return Task::create($request->all());
    }
    public function update(Request $request, $id){
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return $task;
    }
    public function delete(Request $request, $id){
        $task = Task::findOrFail($id);
        $task->delete();
        return 204;
    }
}
