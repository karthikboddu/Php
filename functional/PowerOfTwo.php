<?php
/**
 * This program takes a input N and prints a table of the powers of 2 that are less than or equal to 2^N.
 * purpose : prints a table of the powers of 2s
 * @author karthik
 * @version 1.0
 * @since 15-01-2019
 */

include 'utility.php';
echo "enter the n value " . "\n";
$n = Utility::readInt();
Utility::powerOfTwo($n);
?>