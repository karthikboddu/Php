<?php 
/**
     * store only the numbers in that range that are Anagrams in the 0 to 1000 range.
     *   Further store in a 2D Array the numbers that are Anagram and numbers that are not Anagram
     * Purpose: Store the prime anagram and not anagram in the 2d array
     * @author karthik
     * @version 1.0   
     * @since 24-01-2019
 */ 
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
      
    }else{
        
    }
   
}
 $linkedList1->display();
 echo "\n";
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