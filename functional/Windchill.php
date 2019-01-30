<?php
/**
* overview : WindChill.java that takes two double command­line arguments t
*               and v and prints the wind chil
* purpose : prints the wind chill.
* @author : karthik
* @version : 1.0   
* @since : 16-01-2019
 ***********************************************************************************/
    require('utility.php');
    echo "enter the temperature \n";
    $t = Utility::readDouble();
    echo "enter the speed \n";
    $v = Utility::readDouble();

    /**function to calculate windchill */
    Utility::windChill($t,$v);

?>

