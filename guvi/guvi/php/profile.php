<?php
require 'vendor/autoload.php';

// connect to MongoDB
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// select the database
$database = $mongoClient->Details;

// get the form data
$age = $_POST['age'];
$contact = $_POST['contact'];
$occupation = $_POST['occupation'];

// check if required fields are empty
if (empty($age) || empty($contact) || empty($occupation)) {
    echo "Error: One or more required fields are empty.";
} else {
    // create a new document
    $document = [
        'age' => $age,
        'contact' => $contact,
        'occupation' => $occupation
    ];

    // insert the document into the collection
    $collection = $database->details;
    $result = $collection->insertOne($document);

    // check if the insertion was successful
    if ($result->getInsertedCount() > 0) {
        echo "Data inserted successfully!";
    } else {
        echo "Error inserting data!";
    }
}
?>