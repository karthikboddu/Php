<?php
/**
     * Write a static function toBinary that outputs the binary (base 2) representation of
     *  the decimal number typed as the input
     * Purpose: To compute the binary representation of n
     * @author karthik
     * @version 1.0   
     * @since 18-01-2019
 */ 
require('utility.php');
echo "enter the number \n";
$number = Utility::readInt();
Utility::toBinary($number);
?>