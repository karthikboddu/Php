<?php
/**
     * program to take number of time to flip coin and print percentage of heads and tails 
     * To print percentages of heads and tails
     * @author karthik
     * @version 1.0   
     * @since 16-01-2019
 */
    include('utility.php');
    echo "enter number of time to flip \n";
    $flipNo = Utility::readInt();
    if($flipNo<1){
        echo "flip times must be greater than zero";
    }else{
        Utility::coinFlip($flipNo);
    }
?>