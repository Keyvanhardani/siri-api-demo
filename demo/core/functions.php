<?php

function respondWithMessage($status, $message) {

  header('Content-type: application/json');
  echo json_encode([
    "status" => $status,
    "message" => $message
  ],
  JSON_PRETTY_PRINT);
  die();
}

// Function to determine if a response to a followup is true. You can use this for responding to yes-or-no questions. In your check to see whether you responded yes or no, just call answerIsTrue() and it will return true for affirmative responses and nothing for non-affirmative responses.

function answerIsTrue() {
  global $answer;

  // Add whatever affirmative answers you want to this array. Beware! If you include something like "definitely" then it will trigger an affirmative response for "definitely not" as well. Include only as many words as you need because partial matches will work -- "I guess" will also match "I guess so" or "Uh, well, let me see, I guess I will do that."

  $affirmative = [
    'yes',
    'sure',
    'ok',
    'okay',
    'please',
    'alright',
    'all right',
    'go ahead',
    'yeah',
    'definitely',
    'absolutely',
    'why not',
    'i suppose',
    'i guess',
    'yep',
    'yup'
  ];

  if(in_array(strtolower($answer), $affirmative)) {
    return true;
  }
}

// Function to process request phrase for keywords. Call requestContains("term") to check whether a word or set of words exists in the request. Use these keywords to determine the intent and then use the `do` below to forward the trigger the correct 

function requestContains($term) {
  global $request;
  if (stripos ($request, $term) !== false) {
    return true;
  } else {
    return false;
  }
}

?>