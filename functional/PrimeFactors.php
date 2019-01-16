<?php 
    include('../Utility/utility.php');
    echo "enter the value of n : ";
    $n = Utility::readInt();
    $m = $n/2;
    Utility::primeFactors($n);

?>