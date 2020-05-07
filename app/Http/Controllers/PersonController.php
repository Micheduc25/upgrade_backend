<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

require_once 'vendor/autoload.php';

use GraphAware\Neo4j\Client\ClientBuilder;

class PersonController extends Controller
{

// $client = ClientBuilder::create()
//     ->addConnection('default', 'http://neo4j:password@localhost:7474') // Example for HTTP connection configuration (port is optional)
//     ->addConnection('bolt', 'bolt://neo4j:password@localhost:7687') // Example for BOLT connection configuration (port is optional)
//     ->build();
//     public function index(){

//     }
}
