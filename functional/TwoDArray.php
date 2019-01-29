<?php
/************************************************************************************
 * purpose : Print function to print 2 Dimensional Array
 * @file : TwoDArray.php
 * @author karthik
 * @version 1.0
 * @since 16-01-2019
 ***********************************************************************************/
include 'utility.php';
echo "enter number of rows";
$rows = Utility::readInt();
echo "enter number of columns";
$cols = Utility::readInt();
$twoDArr[][] = array();

/**function to print two array of rows and cols */
Utility::printTwoDArray($rows, $cols, $twoDArr);

?>