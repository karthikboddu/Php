<?php
include('../Utility/utility.php');
echo "enter the number of elements ";
$n = readInt();
$arr = array();

for($i=0;$i<$n;$i++){
    $arr[$i] = readInt();
}

for($i=0;$i<sizeof($arr);$i++){
    for($j=$i+1;$j<sizeof($arr);$j++){
        for($k=$j+1;$j<sizeof($arr);$k++){
            if(($arr[$i]+$arr[$j]+$arr[$k])==0){
                echo $arr[$i]." ",$arr[$j]." ".$arr[$k];
            }
        }
    }
}

?>