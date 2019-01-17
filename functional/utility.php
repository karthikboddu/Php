<?php
class Utility{
static public function readString(){
    $var = readline("");
    while(is_numeric($var)){
       throw new Exception("enter valid input ");
        fscanf(STDIN,"%s",$var);

    }
return $var;
}
static public function readInt(){
    $i = readline("");
    // if(is_string($i)){
    //     echo "enter valid  ";
    // }else if(is_numeric($i)){
    //     return $i;
    // }
    while(!is_numeric($i)){
        echo "enter valid input"."\n";
        fscanf(STDIN,"%d",$i);
    }
    return $i;
}

static public function checkLeapYear($yr){
    readString($yr);
    $flag = FALSE;
    if($yr%400==0&&$yr>999&&yr<10000){
        $flag = TRUE;
    }else if($yr%100==0){
        $flag = FALSE;
    }else if($yr%4==0){
        $flag = TRUE;
    }
 
    return $flag;
}

static public function primeFactor($n){
    echo "prime factors are : \n";
    for($num=2;$num<=$n;$num++){ // prime num start from 2
        $flag = TRUE;
        for($j=2;$j<=$num/2;$j++){
            if($num%$j==0){  // it it is divided by zero it's not a prime
                $flag = FALSE;
                break;
            }
        }
        if($flag==TRUE){
            while($n%$num==0){
                echo $num." \n"; // prime numbers divided by inputs
                $n=$n/$num; 
            }
           
        }
    }
}

static public function primeNumberUpto($n){
    for($i=2;$i<$n;$i++){
        $flag = TRUE;
        for($j=2;$j<$i/2;$j++){
            if($i%$j==0){
                $flag = FALSE;
                break;
            }
        }
        if($flag==TRUE){
            echo $i." ";
        }
    }



}

static public function checkAnagram($str1,$str2){
    if(strlen($str1)==strlen($str2)){ //check length of two string are equal
        $str1Arr = str_split($str1);// split to array
        $str2Arr = str_split($str2); //split to array
        asort($str1Arr);//sort array by values
        asort($str2Arr);//sort array by values
        // foreach($str1Arr as $val){
        //     echo $val." ";
        // }
        // unset($val);
        // foreach($str2Arr as $val){
        //     echo $val." ";
        // }
        // unset($val);//unsetting the value stored in foreach last element 
        $str3 = implode("",$str1Arr);//array to string by ""
        $str4 = implode("",$str2Arr);//array to string by ""
        if($str3==$str4)//check both string are equal
            echo "Anagram \n";
        else
            echo "Not Anagram";
    
    }
}




}
?>