<?php
/**
 * overview : dayOfWeek static function that takes a date as input and prints the day of the week that date falls on
 * Purpose: Print day of week that falls on givne input month ,year ,date
 * @author : karthik
 * @version : 1.0
 * @since : 17-01-2019
 */
require 'utility.php';
$weeks = array('sunday', 'monday', 'tuesday', 'wednessday', 'thursday', 'friday', 'saturday');
$days =array('31','28','31','30','31','30','31','31','30','31','30','31');

/**function to read year and month */
echo "enter date";
$date = Utility::readInt();
echo "enter month ";
$month = Utility::readInt();
echo "enter year";
$yr = Utility::readInt();
if(Utility::checkLeapYear($yr)){
    $days[1] = 29;
}
if(($month<=12&&$month>=1)&&($yr>=1000&&$yr<=9999)&&($date<=$days[$month-1]&&$date>=1)){

/** function to get day for year and month*/
$day = Utility::calculateDay($date, $month, $yr);
echo $weeks[$day];
}else{
    echo "invalid date year month";
}


?>