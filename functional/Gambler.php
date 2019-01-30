<?php
/**
 * overview : Simulates a gambler who start with $stake and place fair $1 bets until
 *           he/she goes broke (i.e. has no money) or reach $goal. Keeps track of the number of
 *           times he/she wins and the number of bets he/she makes. Run the experiment N
 *           times, averages the results, and prints them out.
 * @purpose : Print Number of Wins and Percentage of Win and Loss.
 * @author: karthik
 * @file : Gambler.php
 * @version : 1.0
 * @since : 16-01-2019
 *******************************************************************************/
require 'utility.php';
echo "stack should be less than goal\n";
echo "Enter stack ";
$stack = Utility::readInt();
echo "enter goal ";
$goal = Utility::readInt();
echo "enter number of times to play ";
$times = Utility::readInt();

/**
 * function to gambler play 
*/
Utility::gamblerPlay($stack, $goal, $times);
?>