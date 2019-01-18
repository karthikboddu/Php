<?php
/******************************************************************************
 *  
 *  Purpose: Program to generate random number and to process number of distinct coupons.
 *
 *  @author  karthik
 *  @version 1.0
 *  @since   15-01-2019
 *
 ******************************************************************************/   
    include('utility.php');
    $range = Utility::readInt();
    $alpha = array();
    $letters = "a";
    for($i=0;$i<27;$i++){
        $alpha[$i] =$letters++;
    }
    $couponletters = array('1','2','a','b','c','d','e','f','g','h','i','k','l');
    $couponNo = array();
    $totalDistinct = 0;
    for($i=0;$i<$range;$i++){
        $j=$i+1;
        $random = rand(1,$range);
        $couponNo[$i] = $random;
        $couponNo[$j++] =$couponletters[$random];
        
    }
    $uni = array_unique($couponNo);
    $uni1 =  array_values($uni);
    $total =sizeof($uni1);
    for($i=0;$i<sizeof($uni1);$i++){
        echo "$uni1[$i] ";
    }
    echo "\n"."total distinct number ".$total."\n";
?>