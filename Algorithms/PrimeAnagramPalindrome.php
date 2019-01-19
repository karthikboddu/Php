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
$primeNo = Utility::primeNumberArr($range);
Utility::printPrimeAnagram($primeNo);
Utility::printPrimePalindrome($primeNo);
// $res =Utility::isPrimeAnagram("13","31");
// echo $res;
