<?php

namespace App;

require_once 'vendor/autoload.php';

use GraphAware\Neo4j\Client\ClientBuilder;

$client = ClientBuilder::create()
            ->addConnection('bolt', 'bolt://neo4j:password@localhost:7687')
            ->build();
$query = "MATCH (n:Person)-[:FOLLOWS]->(friend) RETURN n.name, collect(friend) as friends";
$result = $client->run($query);

foreach ($result as $record) {
    echo $record;
    // echo sprintf('Person name is : %s and has %d number of friends', 
    // $record->value('name'), count($record->value('friends'));
}