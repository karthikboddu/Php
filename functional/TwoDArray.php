<?php
/**
     * Print function to print 2 Dimensional Array
     * @author karthik
     * @version 1.0   
     * @since 16-01-2019
 */
    include('utility.php');
    echo "enter number of rows";
    $rows = Utility::readInt();
    echo "enter number of columns";
    $cols = Utility::readInt();
    $twoDArr[][] = array();
    Utility::printTwoDArray($rows,$cols,$twoDArr);
?>