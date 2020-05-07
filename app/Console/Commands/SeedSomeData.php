<?php
// require_once 'vendor/autoload.php';

// use GraphAware\Neo4j\Client\ClientBuilder;

// $client = ClientBuilder::create()
//     ->addConnection('bolt', 'bolt://neo4j:root@localhost:7687')
//     ->build();
// $query = "MATCH (n:Person)-[:FOLLOWS]->(friend) RETURN n.name, collect(friend) as friends";
// $result = $client->run($query);

// foreach ($result->getRecords() as $record) {
//     dd($record);
//     echo sprintf('Person name is : %s and has %d number of friends', $record->value('name'), count($record->value('friends')));
// }

// class Task_d extends NeoEloquent {

//     protected $label = 'task'; // or array('User', 'Fan')

//     protected $fillable = ['title'];
// }

// $task = Task_d::create(['title' => 'Some task']);
// echo Task_d::all();
// echo "test 2";