<?php
include('utility.php');
echo "enter the range ";
$range = Utility::readInt();
$primeNo = Utility::primeNumbersUpto($range);
Utility::printPrimeAnagram($primeNo);
?>