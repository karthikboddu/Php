<?php
/**
 * read an integer as an Input, convert to Binary using toBinary function and  Swap nibbles and find the new number
 * @author karthik
 * @version 1.0   
 * @since 16-01-2019
 */
require('utility.php');
echo "enter the number \n";
$number = Utility::readInt();
$binary = Utility::toBinary($number);
Utility::binaryNibbles($binary);



?>