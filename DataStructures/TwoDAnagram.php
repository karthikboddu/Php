<?php 
require ('utility.php');
require ('LinkedList.php');
echo "enter the number \n";
$num = Utility::readInt();
$primeArr = Utility::primeNumberArr($num);
$primeAna = Utility::printPrimeAnagram($primeArr);
$twoDArr = array();
$linkedList1 = new LinkedList;
for($i=0;$i<sizeof($primeArr);$i++){
    $linkedList1->add($primeArr[$i]);
}
for($i=0;$i<$linkedList1->size();$i++){
    $j=0;
    if($linkedList1->search($primeAna[$i])){
        $linkedList1->remove($primeAna[$i]);
        $j++;
    }else{
        $j--;
    }
    
}
// $linkedList1->display();
$arr = $linkedList1->llToArr();//convering linkedlist to array
for($i=0;$i<2;$i++){
    for($j=0;$j<170;$j++){
        $twoDArr[$i][$j] = -2;
    }
    
}


for($i=0;$i<sizeof($primeAna);$i++){
    $twoDArr[0][$i] = $primeAna[$i];
}
for($j=0;$j<sizeof($arr);$j++){
    $twoDArr[1][$j] = $arr[$j];
}

for($i=0;$i<2;$i++){
    for($j=0;$j<sizeof($primeAna);$j++){
        if($twoDArr[$i][$j]<0){
            echo "\t";
        }else if($twoDArr[$i][$j]>0){
            echo $twoDArr[$i][$j]." ";
        }
        
    }
    echo "\n";
}



?>