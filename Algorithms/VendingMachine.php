<?php
include('utility.php'); 
$arr = array('1000','500','100','50','10','5','2','1');
echo "enter the amount";
$amount = Utility::readInt();
Utility::vendingMachine($arr,$amount);

?>
