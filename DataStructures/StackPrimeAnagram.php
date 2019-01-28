<?php 
/**
     * Add the Prime Numbers that are Anagram in the Range of 0 ­ 1000 in a Stack using
     *    the Linked List and Print the Anagrams in the Reverse Order
     * Purpose: add prime anagram to stack and reverse the stack
     * @author karthik
     * @version 1.0   
     * @since 25-01-2019
 */ 
require ('utility.php');
require ('Stack.php');
echo "enter the number \n";

/**read number */
$num = Utility::readInt(); 

/**function to get prime number in arrays */
$primeArr = Utility::primeNumberArr($num);

/** function to get primes that are anagram */
$primeAna = Utility::printPrimeAnagram($primeArr);

 /**create new stack */
$stack = new Stack();
$stack1 = new Stack(); 

/**push prime anagram array in stack */
for($i=0;$i<count($primeAna);$i++){
    $stack->push($primeAna[$i]); 
}

/**push element into stack that is popped   */
for($i=0;$i<sizeof($primeAna);$i++){
    $stack1->push($stack->pop());  
}
echo "stack prime anangrams\n";
$stack1->display();


?>