<?php
/**
 * overview : program to take number of time to flip coin and print percentage of heads and tails
 * purpose : To print percentages of heads and tails
 * @file : FlipCoin.php
 * @author karthik
 * @version 1.0
 * @since 15-01-2019
 *******************************************************************************/
include 'utility.php';
echo "enter number of time to flip \n";

/**
 * function to read int 
*/
$flipNo = Utility::readInt();
if ($flipNo < 1) {
    echo "flip times must be greater than zero";
} else {

/**
 * function to coin flip 
*/
    Utility::coinFlip($flipNo);
}
?>