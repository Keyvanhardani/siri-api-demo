<?php

// Look at followup type from request and execute correct code

// When asking our first example question, we return $followup as "example-followup" and a question to ask. When the user answers the question, the Shortcut sends the answer back to the server and tells it that this is in response to "example-followup". This switch statement checks to see which $followup identifier has been sent and triggers the correct behavior. This could be setting $endpoint to trigger a new behavior, or setting $response to trigger an immediate response with no need for a new endpoint. You can also return another $question and $followup to create another link in the conversational chain.

// If you combine the randomize-response pattern demo with this, you could have an endpoint that starts a conversation where Siri asks you a series of randomized questions. Since this is PHP and you have the full body of your spoken response available as $answer, you could do anything you want with it, even save it into your sql database and use it as a method of configuring a website, or pinging another service's API to activate a feature on that platform by asking more and more specific questions about what you are trying to do. You can even use if statements to detect whether you included all the info you need, and return a followup question if something is missing. Go crazy!

// You can find the answerIsTrue() function in core/functions.php.

switch ($followup) {
  case "example-followup":
  if (answerIsTrue()) {
    $response = "You can perform additional actions above this response line and then return anything you would like spoken by setting it as the response variable. This only triggers if the response is true. Otherwise nothing happens and a blank response is sent back.";
  }
  break;
}
        
?>