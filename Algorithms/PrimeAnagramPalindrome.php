<?php
/**
 * primes that are anagram and palidrome
 * Purpose: Print Prime Anagram and palindrome
 * @author karthik
 * @version 1.0
 * @since 17-01-2019
 */
include 'utility.php';
echo "enter the range ";
$range = Utility::readInt();

if($range<=1000){

/**return prime number upto range */    
$primeNo = Utility::primeNumberArr($range);

/**function to print primes anagram */
Utility::printPrimeAnagram($primeNo);

/**function to print primes palindrome */
Utility::printPrimePalindrome($primeNo);

}else{
    echo "enter between 0-1000\n";
}
?>