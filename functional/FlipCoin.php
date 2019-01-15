<?php
include('../Utility/utility.php');

echo "enter number of time to flip";
$tails = 0;
$heads = 0;
$flipNo = readInt();

for($i=0;$i<$flipNo;$i++){
    $random = rand(0,1);
if($random<0.5){
   
    $tails++;
}else{
    $heads++;
}
echo "random no ".$random.PHP_EOL;
}
$tailPercent = ($tails/$flipNo)*100;
$headsPercent = 100-$tailPercent;
print "tails percentage".$tailPercent.PHP_EOL;
print "heads percentage".$headsPercent.PHP_EOL;
?>