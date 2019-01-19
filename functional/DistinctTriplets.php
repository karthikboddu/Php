<?php
/**
 * Read in N integers and counts the number of triples that sum to exactly 0
 * purpose : Sum of three Integer adds to ZERO
 * @author karthik
 * @version 1.0
 * @since 15-01-2019
 */
include 'utility.php';
echo "enter the number of elements ";
$n = Utility::readInt(); //read int
Utility::distinctTriplets($n);
?>