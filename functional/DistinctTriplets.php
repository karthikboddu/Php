<?php
/********************************************************************************
 * overviw : Read in N integers and counts the number of triples that sum to exactly 0
 * purpose : Sum of three Integer adds to ZERO
 * @file : DistinctTriplets.php 
 * @author : karthik
 * @version : 1.0
 * @since : 15-01-2019
 *******************************************************************************/

include 'utility.php';
echo "enter the number of elements ";
/**read int */
$n = Utility::readInt(); 
Utility::distinctTriplets($n);
?>