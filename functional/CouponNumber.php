<?php
/**
 *  overview : Take User Name as Input and replace the string template
 *  Purpose: Program to generate random number and to process number of distinct coupons.
 *  @file : CouponNumber.php
 *  @author : karthik
 *  @version : 1.0
 *  @since  : 15-01-2019
 *
 ******************************************************************************/
include 'utility.php';
echo "enter the number\n";
$range = Utility::readInt();

/**
 * function to generate coupon 
*/
Utility::generateCoupon($range);
?>