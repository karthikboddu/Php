<?php

require ('utility.php');
echo "enter the number \n";
$num = Utility::readInt();
$primeArr = Utility::primeNumberArr($num);
$twoDPrime = array();
$range =100;


// for($i=0;$i<10;$i++){
//     for($j=0;$j<100;$j++){
//         $twoDPrime[$i][$j] =-1;
//     }
    
// }

$k=0;
for($i=0;$i<10;$i++){
    
    for($j=0;$j<100;$j++){
        if( $k==sizeof($primeArr)|| $primeArr[$k]>$range ) {
            break;
        }
        $twoDPrime[$i][$j] = $primeArr[$k++];
    }
    $range+=100;

}

print_r($twoDPrime);
for($i=0;$i<sizeof($twoDPrime);$i++){
    for($j=0;$j<sizeof($twoDPrime[$i]);$j++){

        echo $twoDPrime[$i][$j]." ";
    }
    echo "\n";
}

// print_r($twoDPrime);
?>