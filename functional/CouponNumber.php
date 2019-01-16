<?php
include('../Utility/utility.php');
$range = Utility::readInt();
$couponNo = array();
$totalDistinct = 0;
for($i=0;$i<$range;$i++){
    $random = rand(1,(100+$range));
    $couponNo[$i] = $random;
    $totalDistinct++;
}
$uni = array_unique($couponNo);
$uni1 =  array_values($uni);
for($i=0;$i<sizeof($uni1);$i++){
    echo "$uni1[$i]  ";
}
echo "\n"."total distinct number ".$totalDistinct."\n";

?>