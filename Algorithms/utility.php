<?php
class Utility{
    /**function to read string */
static public function readString(){
    $var = readline("");
    while(is_numeric($var)){
       throw new Exception("enter valid input ");
        fscanf(STDIN,"%s",$var);

    }
    return $var;
}
/**function to read integer */
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
/**function to find prime factors of n */
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
/**function to find prime number upto n */
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
 
            if($flag==TRUE){  //prime numbers 
               array_push($primeno,$i); //storing in a array
                // echo $i;

        }
    }
    echo "\n prime upto ".$n ."are\n";
    for($k=0;$k<sizeof($primeno);$k++){ //printing the prime array
        echo $primeno[$k]; 
    }
}
/**function to check anagram */
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
/**function to print prime number of size n */
static public function primeNumberArr($n){
    $prime = 2;
    $primeArr =array();
    $count = 0;
    while($prime<$n){
        $flag = TRUE;
        
        for($i=2;$i<=$prime/2;$i++)
        if($prime%$i==0){
            $flag = FALSE;
            break;
        }
        if($flag==TRUE){
            $primeArr[$count] = $prime;   
            $count++;
        }
        $prime++;
    }
    

    return $primeArr;
}
/**function to print prime anagram of prime array */
static public function printPrimeAnagram($prime){
    $primeAnagram = array(); // intit array
    $count = 0;
    for($i=0;$i<sizeof($prime);$i++){
        for($j=$i+1;$j<sizeof($prime);$j++){
            if(Utility::isPrimeAnagram("$prime[$i]","$prime[$j]")==TRUE){ //check two index are anagram
                $primeAnagram[$count] = $prime[$i]; // if true then add to array
                $count++;
                $primeAnagram[$count++] = $prime[$j];
            }
        }
    }
echo "\n prime anagram number are \n";
    for($k=0;$k<sizeof($primeAnagram);$k++){ //printing the anagram array
        echo $primeAnagram[$k]."  ";
    }
}
/**function to check two string are prime anagram in array */
static public function isPrimeAnagram($str1,$str2){
    $tempStr1 = str_split($str1);
    $tempStr2 = str_split($str2);
    asort($tempStr1);
    asort($tempStr2);
    if(sizeof($tempStr1) == sizeof($tempStr2)){
        $anaStr1 = implode("",$tempStr1);
        $anaStr2 = implode("",$tempStr2);
        // echo $anaStr1;
        // echo $anaStr2;
        if($anaStr1 == $anaStr2){
           return TRUE;
        }
    }else{
        return FALSE;
    }
}
/**function check whether prime numbers are palindrome */
public static function printPrimePalindrome($arr){
    $palindrome =array();
    $count = 0;
    for($i=0;$i<sizeof($arr);$i++){
        if(Utility::isPalindrome("$arr[$i]")){
            $palindrome[$count] = $arr[$i];
            $count++;
        }
    }
    echo "\n prime palindrome number are \n";
    for($k=0;$k<sizeof($palindrome);$k++){
        echo $palindrome[$k]." ";
        }
}

public static function isPalindrome($arr1){
    $arr2 = strrev($arr1);
    if($arr1==$arr2){
        return TRUE;
    }else{
        return FALSE;
    }
}

/**function to find element in using binarysearch */
static public function  binarySearch($n){
    $start = Utility::startTime();
    $arr = array();
    echo "enter element \n";
    for($i=0;$i<$n;$i++){
        $arr[$i] = Utility::readInt();
    }
    asort($arr);
    echo "enter element to search ";
    $key = Utility::readInt();
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
    if($beg>$end){
        echo "element not found";
    }
    $stop = Utility::stopTime();
    $elapsed = Utility::elapsedTime($start,$stop);
    echo $elapsed." sec elasped\n";
    return $elapsed;
}
/**function to find element in using binarysearch with string */
static public function binarySearchString($n){
    echo "binarysearch string \n";
    $start = Utility::startTime();
    $arr = array();
    echo "enter element in string\n";
    for($i=0;$i<$n;$i++){
        $arr[$i] = Utility::readString();
    }
    asort($arr);
    echo "enter element to search ";
    $key = Utility::readString();
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
        echo "element not found";
    } 

    $stop = Utility::stopTime();
    $elapsed = Utility::elapsedTime($start,$stop);
    echo $elapsed." sec elasped\n";
    return $elapsed;
}
/**function to sort integers using insertion sort */
static public function insertionSort($n){
    echo "insrtion sort \n";
    $start = Utility::startTime();
    $arr = array();
    echo "enter element \n";
    for($i=0;$i<$n;$i++){
        $arr[$i] = Utility::readInt();
    }
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
    $stop = Utility::stopTime();
    $elapsed = Utility::elapsedTime($start,$stop);
    echo $elapsed." sec elasped\n";
    return $elapsed;
}
/**function to sort integers using insertion sort for strings */
static public function insertionSortString($n){
    echo "insrtion sort string \n";
    $start = Utility::startTime();
    $arr = array();
    echo "enter element in string\n";
    for($i=0;$i<$n;$i++){
        $arr[$i] = Utility::readString();
    }
  
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
    $stop = Utility::stopTime();
    $elapsed = Utility::elapsedTime($start,$stop);
    echo $elapsed." sec elasped\n";
    return $elapsed;
}
/**function to sort using bubblesort */
static public function bubbleSort($n){
    echo "bubble sort \n";
    $start = Utility::startTime();
    $arr = array();
    echo "enter element \n";
    for($i=0;$i<$n;$i++){
        $arr[$i] = Utility::readInt();
    }
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
    $stop = Utility::stopTime();
    $elapsed = Utility::elapsedTime($start,$stop);
    echo $elapsed." sec elasped\n";
    return $elapsed;
}
/**function to sort using bubblesort for strings */
static public function bubbleSortString($n){
    echo "bubble sort string\n";
    $start = Utility::startTime();
    $arr = array();
    echo "enter element in string\n";
    for($i=0;$i<$n;$i++){
        $arr[$i] = Utility::readString();
    }
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
    $stop = Utility::stopTime();
    $elapsed = Utility::elapsedTime($start,$stop);
    echo $elapsed." sec elasped\n";
    return $elapsed;
}

public static function startTime(){
    return $start = time();
}
public static function stopTime(){
    return $stop = time();
}
public static function elapsedTime($start,$stop){
    return $elapsed = $stop - $start;
}

public static function binarySearchFile($arr){
   
    asort($arr);
    echo "enter element to search ";
    $key = Utility::readString();
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
        echo "element not found";
    } 
}

public static function insertionSortFile($arr){
    for($i=1;$i<sizeof($arr);$i++){
        $key = $arr[$i];
        $j =$i-1;
        while($j>=0){
            if(strcmp($arr[$j],$key)>0){
                break;
            }
            $arr[$j+1] = $arr[$j];
            $j--;
        }
        $arr[$j+1] = $key;
    }
    echo "after sorting \n";
    for($i=0;$i<sizeof($arr);$i++){
        echo $arr[$i]." ";
    }
}

public static function bubbleSortFile($arr){
    for($i=0;$i<sizeof($arr);$i++){
        for($j=$i+1;$j<sizeof($arr);$j++){
            if($arr[$i]>$arr[$j]){
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
            }
        }
    }
    echo "after sorting \n";
    for($k=0;$k<sizeof($arr);$k++){
        echo $arr[$k]." ";
    }
}

public static function vendingMachine($arr,$amount){
    $tempamount = $amount;
    $flag = FALSE;
    for($i=0;$i<sizeof($arr);$i++){
        while(($tempamount/$arr[$i])>0){
            $notes = $amount/$arr[$i];
            $tempamount = $amount%$arr[$i];
            echo $notes."hbv";
            $flag =TRUE;
            break;
        }
      

    }
    if(flag){
        Utility::vendingMachine($arr,$tempamount);
    }
}
/**function to calculate day for year and date */
public static function calculateDay($date,$yr,$m){
    $year =floor( $yr -(14-$m)/12);
    $x = floor($year +($year/4)-($year/100)+($year/400));
    $month =  $m + 12*((14-$m)/12)-2;
    $d0 = floor(($date+$x+(31*$month)/12)%7);

    return $d0;
}

/**function to convert number to binary */
public static function toBinary(){
    $str=array();
    $i=0;
    $num = 21;      
    while($num>0){
        $rem = $num%2;
        array_push($str,$i);
        $num = round($num/2);
        echo $num;
        $i++;
    }
    // echo sizeof($str);
    // for($i=0;$i<sizeof($str);$i++){
    //     echo $str[$i]." ";
    // }
}


}
?>