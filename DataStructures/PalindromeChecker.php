<?php 
/**
     * Read a List of Numbers from a file and arrange it ascending Order in a
     *      Linked List. Take user input for a number, if found then pop the number out of the
     *      list else insert the number in appropriate position
     * Purpose: Read from file the list of Numbers and take user input for a new number
     * @author karthik
     * @version 1.0   
     * @since 21-01-2019
 */ 
require('utility.php');
require('DEque.php');
$dequeu = new Deque;
echo "enter the string \n";
$str = Utility::readString();
$str1 = str_split($str);
print_r($str1);
for($i=0;sizeof($str1);$i++){
    $dequeu->addFront($str1[$i]);
}

// $dequeu->displayForward();
?>