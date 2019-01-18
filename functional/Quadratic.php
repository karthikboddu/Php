<?php 
/**
     *find the roots of the equation a*x*x + b*x + c.
     * calculate  root 1 and root 2 
     * @author karthik
     * @version 1.0   
     * @since 17-01-2019
 */
    require('utility.php');
    echo "enter value of a \n";
    $a = Utility::readInt();
    echo "enter value of b \n";
    $b = Utility::readInt();
    echo "enter value of c \n";
    $c = Utility::readInt();
    Utility::quadratic($a,$b,$c);
?>
