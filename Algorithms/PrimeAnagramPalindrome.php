<?php
include('utility.php');
echo "enter the range ";
$range = Utility::readInt();
$primeNo = Utility::primeNumberArr($range);
Utility::printPrimeAnagram($primeNo);

// $res =Utility::isPrimeAnagram("13","31");
// echo $res;
?>