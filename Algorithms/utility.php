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

static public function primeFactors($n){
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
            echo $num."prime \n";
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
        $prime ="";
        $primeno = array();
        for($j=2;$j<$i/2;$j++){
            if($i%$j==0){
                $flag = FALSE;
                break;
            }
        }
 
            if($flag==TRUE){
               array_push($primeno,$i);
                // echo $i;

        }
    }

    for($k=0;$k<sizeof($primeno);$k++){
        echo $primeno[$k];
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
static public function primeNumberArr($n){
    $prime = 2;
    $primeArr =array();
    while($prime<$n){
        $flag = TRUE;
        $count = 0;
        for($i=2;$i<=$prime/2;$i++){
            if($prime%$i==0){
                $flag = FALSE;
                break;
            }
            if($flag==TRUE){
                echo $prime;
                $count++;
            }
            $prime++;
        }
        
    }
    // for($k=0;$k<sizeof($primeArr);$k++){
    //     echo $primeArr[$k]." ";
    // }
}

// static public function printPrimeAnagram($prime){
    
//     for($i=0;$i<)
// }

static public function binarySearch($arr,$key){
    $beg = 0;/**intial size of array */
    $end = sizeof($arr)-1;/**length of array */
    
    while($beg<=$end){
        $mid = round(($beg + $end)/2); /**calculate mid and round */
        if($arr[$mid]==$key){ /**if mid of array is key then key is found */
            echo "key found at ".$mid."\n";
            break;
        }else if($key<$arr[$mid]){ /**if key is less than mid of array then array moves forward*/
            $end = $mid-1;
        }else{
            $beg = $mid+1; /**if key>arry of mid then mid+1 */
        }
       
    }
    
}

static public function binarySearchString($arr,$key){
    $beg = 0 ;
    $end = sizeof($arr)-1;
    while($beg<=$end){
        $mid = round(($beg+$end)/2);
        if(strcmp($arr[$mid],$key)==0){
            echo "found at ".$mid;
            break;
        }else if(strcmp($arr[$mid],$key)<0){
            $end = $mid-1;
        }else if(strcmp($arr[$mid],$key)>0){
            $beg = $mid+1;
        }
    }
    if($beg>$end){
        echo "element not present";
    } 
}

static public function insertionSort($arr){
    $len = sizeof($arr);

    for($i=1;$i<$len;$i++){
        $key = $arr[$i];
        $j = $i-1;
        while($j>=0 && $arr[$j]>$key){
            $arr[$j+1] = $arr[$j];
            $j--;    
        }
        $arr[$j+1]= $key; 
    }

    for($i=0;$i<$len;$i++){
        echo $arr[$i]." ";
    }

}
static public function insertionSortString($arr){
    $len = sizeof($arr);
    for($i=1;$i<$len;$i++){
        $key = $arr[$i];
        $j=$i-1;
        while($j>=0){
            if(strcmp($key,$arr[$j])<0){
               break;
            }
            $arr[$j+1] = $arr[$j];
            $j--;
            
        }
        $arr[$j+1] = $key;
    }

    for($i=0;$i<$len;$i++){
        echo $arr[$i]." ";
    }
}

static public function bubbleSort($arr){
    $len = sizeof($arr);
    for($i=0;$i<$len;$i++){
        for($j=$i+1;$j<$len;$j++){
            if($arr[$i]>$arr[$j]){
                $temp = $arr[$i];
                $arr[$i]= $arr[$j];
                $arr[$j] = $temp;
            }
        }
    }

    for($i=0;$i<$len;$i++){
        echo $arr[$i]." ";
    }

}

static public function bubbleSortString($arr){
    $len = sizeof($arr);

    for($i=0;$i<$len;$i++){
        for($j=$i+1;$j<$len;$j++){
            if(strcmp($arr[$i],$arr[$j])>0){
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
            }
        }
    }
    for($i=0;$i<$len;$i++){
        echo $arr[$i]." ";
    }

}



}
?>