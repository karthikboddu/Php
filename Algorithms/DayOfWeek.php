<?php
require('utility.php');

$weeks = array('sunday','monday','tuesday','wednessday','thursday','friday','saturday');
echo "enter date";
$date = Utility::readInt();
if($date>31){
    echo "enter correct date";
}
echo "enter year";
$yr = Utility::readInt();
echo "enter month ";
$month  =Utility::readInt();
$day = Utility::calculateDay($date,$yr,$month);
echo $day;
echo $weeks[$day];
?>