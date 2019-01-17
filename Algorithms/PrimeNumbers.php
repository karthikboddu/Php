<?php 
include('utility.php');
echo "enter the number ";
$num = Utility::readInt();
$primeArr= Utility::primeNumberArr($num);

for($k=0;$k<sizeof($primeArr);$k++){
    echo $primeArr[$k]." ";
}
?>