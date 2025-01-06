<?php

// Convert number to their word equivalent
function number_to_word($number) {
    // Ensure input is an integer
    $number = intval($number);

    // Define the words for numbers 0 to 10
    $words = array(
        0 => 'zero', 
        1 => 'one', 
        2 => 'two', 
        3 => 'three', 
        4 => 'four', 
        5 => 'five', 
        6 => 'six', 
        7 => 'seven', 
        8 => 'eight', 
        9 => 'nine', 
        10 => 'ten'
    );

    // Return the word if the number is between 0 and 10
    if (isset($words[$number])) {
        return $words[$number];
    }

    // Return the number as a string for any other value
    return (string) $number;
}