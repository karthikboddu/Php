<?php
require('utility.php');
echo "enter the number of nodes \n";
$num = Utility::readInt();
$fact = Utility::factorial($num);
$numerator = Utility::factorial(2*$num);
$denomirator = Utility::factorial($num+1)* Utility::factorial($num);

$Bst = floor($numerator/$denomirator);

echo "number of Bst are possible are ".$Bst."\n";
?>