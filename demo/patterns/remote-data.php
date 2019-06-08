<?php
include '..remote/fetch.php';
// This file contains the fetchRemoteData function so we include it here and use the function below. You can add other service-specific functions to that and call them as needed in your endpoints, or you can write the functions directly in your endpoints if you think you'll only need to use them once. Up to you!

// Fetch the data from a demo website, then check the "completed" status and return the appropriate response.

$dataFromRemote = fetchRemoteData("https://jsonplaceholder.typicode.com/todos/1");

switch ($dataFromRemote['completed']) {
  case true:
  $response = "You have finished the task \"" . $dataFromRemote['title'] . "\".";
  break;

  case false:
  $response = "You still need to " . $dataFromRemote['title'] . ".";
  break;

  default:
  $response = "There was an error looking up your task.";
  break;
}
?>