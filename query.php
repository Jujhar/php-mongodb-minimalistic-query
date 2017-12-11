<?php
/**
 * php-mongodb-minimalistic-query
 * Uses mongodb PHP extension and mongodb/mongodb composer package
 *
 * Made by Singh
 * jujhar@rebabre.com
 * Updated Dec 2017
 *
 *  Detailed Docs:
 *  https://secure.php.net/manual/en/mongodb.tutorial.library.php
 *
*/

$dbname = 'local'; // Your mongodb name (default local)
$dbport = '27017'; // Your mongodb port (default 27010)

// End of config ------------------------------------------------


require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:" . $dbport);
$mydb = $client->$dbname;

// List collections
$list = 0; // set to 1 to see all collections
if ($list == 1) {
    foreach ($mydb->listCollections() as $collection) {
        var_dump($collection);
    }
}

// Create a new collection
//$resultAll = $mydb->createCollection('collection name');

// Query a collection
$collection = $mydb->hello; // $mydb->your-collection-name
$query = $collection->find();
//print_r($query);

foreach ($query as $entry) {
    echo $entry['_id'], ': ', $entry['dogs'], "\n"; // $entry['field-name']
}