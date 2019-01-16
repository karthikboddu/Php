<?php
include('../Utility/utility.php');
$n = Utility::readInt();
if(!$n==0){
    $res = 0;
    for($i=1;$i<=$n;$i++){
    $res =$res+ 1/$i;
    echo 1/$i."+";
}
echo " = ";
echo $res;
}else{
    echo "enter n value > 0";
}

?>