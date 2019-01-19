<?php
/**
 * program to take number of time to flip coin and print percentage of heads and tails
 * purpose : To print percentages of heads and tails
 * @author karthik
 * @version 1.0
 * @since 15-01-2019
 */
include 'utility.php';
echo "enter the choice 1:celcuis to farenheit 2:Fahrenheit to Celsius \n";
$c = Utility::readInt();
Utility::tempConverstation($c);

?>