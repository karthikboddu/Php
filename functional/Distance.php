<?php
include('../Utility/utility.php');
echo "enter value of x ";
$x = readInt();
echo "enter value of y ";
$y = readInt();
$squareX = pow($x,$x);
$squareY = pow($y,$y);
$distance = sqrt($squareX+$squareY);
echo $distance;
?>