<?php
/**
     * takes two integer command­line arguments x
     *and y and prints the Euclidean distance from the point (x, y) to the origin (0, 0).
     * calculate distance = sqrt(x*x + y*y)
     * @author karthik
     * @version 1.0   
     * @since 15-01-2019
 */
    include('utility.php');
    echo "enter value of x ";
    $x = Utility::readInt();
    echo "enter value of y ";
    $y = Utility::readInt();
    Utility::distance($x,$y);
?>