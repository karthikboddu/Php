<?php 
/**
     * Add the Prime Numbers that are Anagram in the Range of 0 ­ 1000 in a Queue using
     *   the Linked List 
     * Purpose: Print the Anagrams from the Queue
     * @author karthik
     * @version 1.0   
     * @since 24-01-2019
 */ 
require ('utility.php');
require ('Queue.php');
echo "enter the number \n";

/**enter number  */
$num = Utility::readInt(); 

/**function to get prime number in arrays */
$primeArr = Utility::primeNumberArr($num);

/** function to get primes that are anagram */
$primeAna = Utility::printPrimeAnagram($primeArr); 

/**create new queue */
$queue = new Queue; 

/**add prime anagram array to queue  */
for($i=0;$i<sizeof($primeAna);$i++){ 
    $queue->enqueue($primeAna[$i]); 
}
echo "Queue prime Anagram\n";
$queue->display();


?>