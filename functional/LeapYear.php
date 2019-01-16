<?php
include('../Utility/utility.php');
echo "enter year";
$yr=Utility::readInt();
$flag = Utility::leapYear($yr);
if($flag){
    echo "leap year";
}else{
    echo "not a leap year";
}

?>