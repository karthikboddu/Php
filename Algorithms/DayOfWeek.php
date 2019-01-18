<?php
/**
     * dayOfWeek static function that takes a date as input and prints the day of the week that date falls on
     * Purpose: Print day of week that falls on givne input month ,year ,date 
     * @author karthik
     * @version 1.0   
     * @since 17-01-2019
 */ 
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