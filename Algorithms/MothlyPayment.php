<?php
/**
     * Write a Util Static Function to calculate monthlyPayment that reads in three
     * command­line arguments P, Y, and R and calculates the monthly payments
     * Purpose: Print sorted list from the file using bubble sort
     * @author karthik
     * @version 1.0   
     * @since 17-01-2019
 */ 


require('utility.php');
echo "enter the principal amount \n";
$p = Utility::readInt();
echo "enter numbers of  year\n";
$y = Utility::readInt();
echo "enter rate of interst\n";
$R = Utility::readInt();
Utility::paymentMonthly($p,$y,$R);
?>
