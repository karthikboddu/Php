<?php
include('../Utility/utility.php');
echo "enter number of rows";
$rows = readInt();
echo "enter number of columns";
$cols = readInt();
$twoDArr[][] = array();
for($i=0;$i<$rows;$i++){
    for($j=0;$j<$cols;$j++){
        $twoDArr[$i][$j] = readInt();
    }
}
$arr = array_values($twoDArr);
for($i=0;$i<$rows;$i++){
    for($j=0;$j<$cols;$j++){
        print $arr[$i][$j]." ";
    }
    echo "\n";
}
// print_r($twoDArr);
?>