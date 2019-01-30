<?php
/**
 * overview : takes a command­line argument N, asks you to think of a number between 0 and N­1, where N = 2^n, and always guesses the answer with nquestions.
 * Purpose : Use Binary Search to find the number
 * @author : karthik
 * @version : 1.0
 * @since : 17-01-2019
 */
require 'utility.php';
echo "enter the number \n";
$n = Utility::readInt();
$N = pow(2, $n);
echo "think a number between 0 and " . ($N - 1) . "\n";
for ($i = 0; $i < $N; $i++) {
    $arr[] = $i;
}

/**function to find guess number */
Utility::findNumber($arr, 0, sizeof($arr) - 1);
?>