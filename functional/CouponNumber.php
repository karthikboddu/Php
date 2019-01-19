<?php
/******************************************************************************
 *
 *  Purpose: Program to generate random number and to process number of distinct coupons.
 *
 *  @author  karthik
 *  @version 1.0
 *  @since   15-01-2019
 *
 ******************************************************************************/
include 'utility.php';
echo "enter the number\n";
$range = Utility::readInt();
Utility::generateCoupon($range);
?>