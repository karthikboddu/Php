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
echo "enter the number of nodes \n";
$num = Utility::readInt();
$fact = Utility::factorial($num);
$numerator = Utility::factorial(2*$num);
$denomirator = Utility::factorial($num+1)* Utility::factorial($num);

$Bst = floor($numerator/$denomirator);

echo "number of Bst are possible are ".$Bst."\n";
?>