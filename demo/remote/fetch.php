<?php

function fetchRemoteData($url) {
  $request = curl_init();
  curl_setopt($request, CURLOPT_URL, $url);
  curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
  $json = curl_exec($request);
  curl_close($request);
  return json_decode($json, true);
  
}


?>