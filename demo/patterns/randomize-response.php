<?php

// This is a pattern you can use to randomize Siri's response to a particular query

$choices = [
  "Here's one option.",
  "Have a different option.",
  "Here's the third possible option.",
  "This is the final option."
];



/*

Here's a neat trick: you can add additional options based on conditions. For example:

$choices = [
  "Here's what I found.",
  "I found this."
]

if ($numberOfItemsFetchedFromServer === 0) {
  $choices[] = "There were no items fetched.";
}

if ($numberOfItemsFetchedFromServer === 1) {
  $choices[] = "I found one!";
}

This adds the "no items" line to the list of possible choices only if the $numberOfItemsFetchedFromServer variable is 0. If that variable is 1, it instead adds the "found one" line. Otherwise, it does not add any extras and only chooses from the two at the top.

*/



// This picks the index of a random item from the array.
$selection = array_rand($choices);

// This sets the item at the randomly selected index as the response for Siri to read.
$response = $choices[$selection];

?>