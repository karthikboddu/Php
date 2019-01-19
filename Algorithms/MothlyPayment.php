<?php 
require('utility.php');
echo "enter the principal amount \n";
$p = Utility::readInt();
echo "enter numbers of  year\n";
$y = Utility::readInt();
echo "enter rate of interst\n";
$R = Utility::readInt();
Utility::paymentMonthly($p,$y,$R);
?>
