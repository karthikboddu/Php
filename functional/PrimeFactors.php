<?php
/**
 * Computes the prime factorization of N
 * purpose : Print the prime factors of number N.
 * @author karthik
 * @version 1.0
 * @since 15-01-2019
 */
include 'utility.php';
echo "enter the value of n : ";
$n = Utility::readInt();
Utility::primeFactor($n);
?>