<?php
// Siri API
// By Mike Beasley
// mikebeas.com

require_once 'core/security.php'; // This line must be here to verify your API key
require_once 'core/functions.php';

// Verify API key is valid, this relies on the included security file above
verifyKey($key);

// Create variables
$response = null;
$followup = null;
$question = null;

// Read request from header
if (array_key_exists('request', $headers)) {
  $request = $headers["request"];
}

// Read followup type from header
if (array_key_exists('followup', $headers)) {
  $followup = $headers["followup"];
}

// Read followup answer from header
if (array_key_exists('answer', $headers)) {
  $answer = $headers["answer"];
}


// At this point you can access the full text of what you asked Siri with the $request variable. You can access your answer to any followup question with "answer" and you can read the type of followup in $followup. If responding to a followup question, $request will == "followup" and $followup will contain the name of the followup to trigger.


// See if there is a request
if (isset($request)) {
  
  // The code below determines which route to use based on which words are contained in the request

  // Check the request for each set of keywords. Stops checking as soon as a match is found. Use nested if statements or any other comparison tricks you want. You can find the requestContains() function core/functions.php.
  do {

    // Trigger followup conversation loop - do not change this
    if (requestContains("followup")) {
      $route = 'followup';
      break;
    }

    // Example routing for request - the route should be your file name without the .php extension
    if (requestContains("example") || requestContains("test")) {
      $route = 'example';
      break;
    }

  } while (0);


  // Trigger the route or respond to unknown request
  if (isset($route)) {

    // By using include here we allow the endpoint code to inherit all existing variables. You can use $request, $followup, and $answer in your endpoints without having to do anything special. You can also just write your code here directly instead of including an external file, but using external files may keep your code cleaner and make it easier to trigger that behavior in other places, such as a follow up, if needed.
    
   include "endpoints/{$route}.php";


  } else {
    $response = "Sorry, I don't know what you mean by \"{$request}.\""; // Failure message for unrecognized requests.
  }

} else {
  $response = "I didn't get that request for some reason."; // If no request was attached, respond with this.
}

respondWithMessage("success", ['speech' => $response, 'question' => $question, 'followup' => $followup]);

/*

The response from the server will be JSON structured as follows. This should be familiar to anyone who has used my PubKit API. The two share much code, such as the security and response, so they can be used together if desired.

{
  "status": "success",
  "message": {
    "speech": [line for siri to speak],
    "question": [any followup question siri has]
    "followup": [the type of followup being asked, sent back with your answer to tell the server how to handle the response]
  }
}

The status will be "error" if the API key is invalid and the message.speech will contain the invalid key message.

*/

?>