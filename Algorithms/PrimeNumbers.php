<?php
/**
 * Print Prime number from 0 to 1000 range
 * @author karthik
 * @version 1.0
 * @since 17-01-2019
 */
include 'utility.php';
echo "enter the number ";
$num = Utility::readInt();
$primeArr = Utility::primeNumberArr($num);
for ($k = 0; $k < sizeof($primeArr); $k++) {
    echo $primeArr[$k] . " ";
}
