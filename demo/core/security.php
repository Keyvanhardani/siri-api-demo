<?php
require_once 'functions.php';

// Your API key here
$goodKey = 'YOUR_KEY_HERE'; 

// Get headers and declare key variable
$headers = getallheaders();
$key = "invalid";

// Grab API key if it exists
if (array_key_exists('key', $headers)) {
  $key = $headers['key'];
}

// Function to verify API key and return API-approrpiate message
function verifyKey($key) {
  global $goodKey;
  $errorMessage = ['speech' => "Sorry, it looks like your API key is invalid."];
  if ($key != $goodKey) {
    respondWithMessage("error", $errorMessage);
  }

}
?>