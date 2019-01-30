<?php
/**
 * overview : store the prime numbers in a 2D Array, the first dimension represents the range 0­-s100,
 *          100-­200, and so on.
 * Purpose  : store prime number 2d array of 0-100 ,100-200 so on..
 * @author : karthik
 * @version : 1.0
 * @since : 25-01-2019
 */

require 'utility.php';
/**enter the number  */
echo "enter the number \n";
$num = Utility::readInt();

/**
 * function to get prime number in array 
 * */
$primeArr = Utility::primeNumberArr($num);
$twoDPrime = array();
$range = 100;
$k = 0;
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 100; $j++) {
        /**travserse till reaches condition   */
        if ($k == sizeof($primeArr) || $primeArr[$k] > $range) {
            break;
        }
        $twoDPrime[$i][$j] = $primeArr[$k++];
    }

    /**increment by 100 for every loop */
    $range += 100;
}
print_r($twoDPrime);

/**printing twoDaary */
for ($i = 0; $i < sizeof($twoDPrime); $i++) {
    for ($j = 0; $j < sizeof($twoDPrime[$i]); $j++) {
        echo $twoDPrime[$i][$j] . " ";
    }
    echo "\n";
}

// print_r($twoDPrime);
?>