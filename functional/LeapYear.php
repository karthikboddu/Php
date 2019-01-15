<?php
include('../Utility/utility.php');
echo "enter year";
$yr=readInt();
$flag = leapYear($yr);
if($flag){
    echo "leap year";
}else{
    echo "not a leap year";
}

?>