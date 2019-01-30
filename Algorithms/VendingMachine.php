<?php
/**
 * overview : Program to calculate the minimum number of Notes as well as the Notes to be returned by the Vending
 * purpose : to calcualte number of notes for an amount.
 * @file : VendingMachine.php
 * @author karthik
 * @version 1.0
 * @since 18-01-2019
 */
include 'utility.php';

$arr = array('1000', '500', '100', '50', '10', '5', '2', '1');
echo "enter the amount\n";

/**read amount */
$amount = Utility::readInt();
while ($amount < 1) {
    echo "enter amount greater than zero \n";
    $amount = Utility::readInt();
}

/**function to print vending notes  */
Utility::vendingMachine($arr, $amount);
