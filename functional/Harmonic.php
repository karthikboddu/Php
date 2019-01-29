<?php
/*********************************************************************************
 * overview : Prints the Nth harmonic number: 1/1 + 1/2 + ... + 1/N
 * purpose : compute 1/1 + 1/2 + 1/3 + ... + 1/N
 * @file : Harmonic.php
 * @author : karthik
 * @version : 1.0
 * @since  : 16-01-2019
 ********************************************************************************/
include 'utility.php';
echo "enter the value of n \n";
$n = Utility::readInt();

/**function to calculate harmonic */
Utility::harmonicValue($n);
?>