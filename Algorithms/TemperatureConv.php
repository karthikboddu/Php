<?php
/**
 * given the temperature in fahrenheit as input outputs the temperature in Celsius or viceversa using theformula
 * purpose : input outputs the temperature in Celsius or viceversa
 * @author karthik
 * @version 1.0
 * @since 19-01-2019
 */
include 'utility.php';
echo "enter the choice 1:celcuis to farenheit 2:Fahrenheit to Celsius \n";
$c = Utility::readInt();
Utility::tempConverstation($c);

?>