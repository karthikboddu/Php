<?php 
require('utility.php');
echo "enter the number \n";
$n = Utility::readInt();
$N = pow(2,$n);
echo "think a number between 0 and ".($N-1)."\n";
$num = readInt();
Utility::findNumber($num);
    
?>