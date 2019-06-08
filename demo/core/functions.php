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

?>