<?php
/**
 * overview : Read a List of Numbers from a file and arrange it ascending Order in a
 *              Linked List. Take user input for a number, if found then pop the number out of the
 *              slist else insert the number in appropriate position
 * Purpose : Read from file the list of Numbers and take user input for a new number
 * @author : karthik
 * @version : 1.0
 * @since : 21-01-2019
 */
require 'utility.php';
/** enter the input number of nodes  */
echo "enter the number of nodes \n";
$num = Utility::readInt();

/**call to function factorial  */
$fact = Utility::factorial($num);
$numerator = Utility::factorial(2 * $num);
$denomirator = Utility::factorial($num + 1) * Utility::factorial($num);

/** calculate bst  */
$Bst = floor($numerator / $denomirator);
echo "number of Bst are possible are " . $Bst . "\n";
?>