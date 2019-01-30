<?php
/**
 * overview : store only the numbers in that range that are Anagrams in the 0 to 1000 range.
 *              Further store in a 2D Array the numbers that are Anagram and numbers that are not Anagram
 * Purpose : Store the prime anagram and not anagram in the 2d array
 * @author : karthik
 * @version : 1.0
 * @since : 24-01-2019
 */
require 'utility.php';
require 'LinkedList.php';
echo "enter the number \n";
$num = Utility::readInt();

/**function to get prime number in arrays */
$primeArr = Utility::primeNumberArr($num);

/** function to get primes that are anagram */
$primeAna = Utility::printPrimeAnagram($primeArr);
$twoDArr = array();

/**create new linkedlist */
$linkedList1 = new LinkedList;

/**add primenumber array into linkedlist*/
for ($i = 0; $i < sizeof($primeArr); $i++) {
    $linkedList1->add($primeArr[$i]);
}

/**remove anagram present in prime linkedlist */
for ($i = 0; $i < sizeof($primeAna); $i++) {

    /**if element found in linkedlist then remove */
    if ($linkedList1->search($primeAna[$i])) {
        $linkedList1->remove($primeAna[$i]);
    }
}
//  $linkedList1->display();
echo "\n";

/**convering linkedlist to array */
$arr = $linkedList1->llToArr();

/**add primes that anagram in row 1 */
for ($i = 0; $i < sizeof($primeAna); $i++) {
    $twoDArr[0][$i] = $primeAna[$i];
}

/**adding not anagram in row 2 */
for ($j = 0; $j < sizeof($arr); $j++) {
    $twoDArr[1][$j] = $arr[$j];
}

/**printing the two d array */
for ($i = 0; $i < sizeof($twoDArr); $i++) {
    for ($j = 0; $j < sizeof($twoDArr[$i]); $j++) {
        echo $twoDArr[$i][$j] . " ";

    }
    echo "\n";
}
?>