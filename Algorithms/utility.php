<?php
class Utility
{
 
/**function to read string
 *@return String value */
public static function readString()
{
    $var = readline("");
    while (is_numeric($var)) { /**if input is numeric then throw error */
        echo "enter valid input ";
        fscanf(STDIN, "%s", $var);
    }
    return $var;
}
/**function to read integer
* @return integer value */
public static function readInt()
{
    fscanf(STDIN, "%s", $i);
// if(is_string($i)){
    //     echo "enter valid  ";
    // }else if(is_numeric($i)){
    //     return $i;
    // }

// while(!is_numeric($i)){
    //     echo "enter valid input"."\n";
    //     fscanf(STDIN,"%d",$i);
    // }
    while (!is_numeric($i) || $i > (int) $i) { /**if input is numeric or decimal  */
        echo "enter valid input";
        fscanf(STDIN, "%s", $i);
    }
    return $i;
}
/**  to read float values
*@return double value
*/
public static function readDouble()
{
    fscanf(STDIN, "%s\n", $val);
    while (!is_float($val)) {
        echo "ivalid input try again\n";
        fscanf(STDIN, " %f\n ", $val);
    }
    return $val;
}
/**read flaot values
* @return float value
*/
public static function readFloat()
{
    fscanf(STDIN, "%s\n", $val);
    while (!is_float($val)) {
        echo "ivalid input try again\n";
        fscanf(STDIN, " %f\n ", $val);
    }
    return $val;
}
/**To get Strings array */
public static function getStringArray(){
return trim(fgets(STDIN));
}     
/**function to find prime factors of n */
    public static function primeFactors($n)
    {
        echo "prime factors are : \n";
        for ($num = 2; $num <= $n; $num++) { // prime num start from 2
            $flag = true;
            for ($j = 2; $j <= $num / 2; $j++) {
                if ($num % $j == 0) { // it it is divided by zero it's not a prime
                    $flag = false;
                    break;
                }
            }
            if ($flag == true) {
                echo $num . "prime \n";
                while ($n % $num == 0) {

                    echo $num . " \n"; // prime numbers divided by inputs
                    $n = $n / $num;
                }

            }
        }
    }
/**function to find prime number upto n */
    public static function primeNumberUpto($n)
    {
        for ($i = 2; $i < $n; $i++) {
            $flag = true;
            $prime = "";
            $primeno = array();
            for ($j = 2; $j < $i / 2; $j++) {
                if ($i % $j == 0) {
                    $flag = false;
                    break;
                }
            }

            if ($flag == true) { //prime numbers
                array_push($primeno, $i); //storing in a array
                // echo $i;

            }
        }
        echo "\n prime upto " . $n . "are\n";
        for ($k = 0; $k < sizeof($primeno); $k++) { //printing the prime array
            echo $primeno[$k];
        }
    }
/**function to check anagram */
    public static function checkAnagram($str1, $str2)
    {
        if (strlen($str1) == strlen($str2)) { //check length of two string are equal
            $str1Arr = str_split($str1); // split to array
            $str2Arr = str_split($str2); //split to array
            asort($str1Arr); //sort array by values
            asort($str2Arr); //sort array by values
            // foreach($str1Arr as $val){
            //     echo $val." ";
            // }
            // unset($val);
            // foreach($str2Arr as $val){
            //     echo $val." ";
            // }
            // unset($val);//unsetting the value stored in foreach last element
            $str3 = implode("", $str1Arr); //array to string by ""
            $str4 = implode("", $str2Arr); //array to string by ""
            if ($str3 == $str4) //check both string are equal
            {
                echo "Anagram \n";
            } else {
                echo "Not Anagram";
            }

        }
    }
/**function to print prime number of size n */
    public static function primeNumberArr($n)
    {
        $prime = 2;
        $primeArr = array();
        $count = 0;
        while ($prime < $n) {
            $flag = true;

            for ($i = 2; $i <= $prime / 2; $i++) {
                if ($prime % $i == 0) {
                    $flag = false;
                    break;
                }
            }

            if ($flag == true) {
                $primeArr[$count] = $prime;
                $count++;
            }
            $prime++;
        }

        return $primeArr;
    }
/**function to print prime anagram of prime array */
    public static function printPrimeAnagram($prime)
    {
        $primeAnagram = array(); // intit array
        $count = 0;
        for ($i = 0; $i < sizeof($prime); $i++) {
            for ($j = $i + 1; $j < sizeof($prime); $j++) {
                if (Utility::isPrimeAnagram("$prime[$i]", "$prime[$j]") == true) { //check two index are anagram
                    $primeAnagram[$count] = $prime[$i]; // if true then add to array
                    $count++;
                    $primeAnagram[$count++] = $prime[$j];
                }
            }
        }
        echo "\n prime anagram number are \n";
        for ($k = 0; $k < sizeof($primeAnagram); $k++) { //printing the anagram array
            echo $primeAnagram[$k] . "  ";
        }
    }
/**function to check two string are prime anagram in array */
    public static function isPrimeAnagram($str1, $str2)
    {
        $tempStr1 = str_split($str1);
        $tempStr2 = str_split($str2);
        asort($tempStr1);
        asort($tempStr2);
        if (sizeof($tempStr1) == sizeof($tempStr2)) {
            $anaStr1 = implode("", $tempStr1);
            $anaStr2 = implode("", $tempStr2);
            // echo $anaStr1;
            // echo $anaStr2;
            if ($anaStr1 == $anaStr2) {
                return true;
            }
        } else {
            return false;
        }
    }
/**function check whether prime numbers are palindrome */
    public static function printPrimePalindrome($arr)
    {
        $palindrome = array();
        $count = 0;
        for ($i = 0; $i < sizeof($arr); $i++) {
            if (Utility::isPalindrome("$arr[$i]")) {/**check each array value is palindrome */
                $palindrome[$count] = $arr[$i]; //it is palidnrome then addd to array
                $count++;
            }
        }
        echo "\n prime palindrome number are \n";
        for ($k = 0; $k < sizeof($palindrome); $k++) { /**print prime palindrome */
            echo $palindrome[$k] . " ";
        }
    }

    public static function isPalindrome($arr1)
    {
        $arr2 = strrev($arr1);/**reverse number is equal to original then palindrome */
        if ($arr1 == $arr2) {
            return true;
        } else {
            return false;
        }
    }

/**function to find element in using binarysearch */
    public static function binarySearch($n)
    {   
        echo "              1 : Binaray search\n";
        $start = Utility::startTime();
        $arr = array();
        echo "enter element \n";
        for ($i = 0; $i < $n; $i++) {
            $arr[$i] = Utility::readInt();
        }
        sort($arr);
        print_r($arr);
        echo "enter element to search\n ";
        $key = Utility::readInt();
        $beg = 0; /**intial size of array */
        $end = count($arr) - 1; /**length of array */

        while ($beg <= $end) {
            $mid = floor(($beg + $end) / 2); /**calculate mid and round */
            if ($arr[$mid] == $key) { /**if mid of array is key then key is found */
                echo "key found at " . $mid . "\n";
                break;
            } else if ($key < $arr[$mid]) { /**if key is less than mid of array then array moves forward*/
                $end = $mid - 1;
            } else {
                $beg = $mid + 1; /**if key>arry of mid then mid+1 */
            }

        }
        if ($beg > $end) {
            echo "element not found\n";
        }
        $stop = Utility::stopTime();
        $elapsed = Utility::elapsedTime($start, $stop);
        echo ($elapsed/1000) . " sec elasped\n";
        return $elapsed;
    }
/**function to find element in using binarysearch with string */
    public static function binarySearchString($n)
    {
        echo "                  2 : binarysearch string \n";
        $start = Utility::startTime();
        $arr = array();
        echo "enter element in string\n";
        for ($i = 0; $i < $n; $i++) {
            $arr[$i] = Utility::getStringArray(); /**enter elements into array */
        }
        sort($arr);
        print_r($arr);
        echo "enter element to search \n";
        $key = Utility::readString();
        $beg = 0;
        $end = count($arr) - 1;
        while ($beg <= $end) {
            $mid = floor(($beg + $end) / 2);
            if (strcmp($arr[$mid], $key) == 0) {
                echo "found at " . $mid;
                break;
            } else if (strcmp($arr[$mid], $key) < 0) {
                $beg = $mid + 1;
            } else if (strcmp($arr[$mid], $key) > 0) {
                $end = $mid - 1;
            }
        }
        if ($beg > $end) {
            echo "element not found\n";
        }

        $stop = Utility::stopTime();
        $elapsed = Utility::elapsedTime($start, $stop);
        echo ($elapsed/1000) . " sec elasped\n";
        return $elapsed;
    }
/**function to sort integers using insertion sort */
    public static function insertionSort($n)
    {
        echo "                3: insertion sort \n";
        $start = Utility::startTime();
        $arr = array();
        echo "enter element \n";
        for ($i = 0; $i < $n; $i++) {
            $arr[$i] = Utility::readInt();
        }
        $len = sizeof($arr);
        for ($i = 1; $i < $len; $i++) {
            $key = $arr[$i];
            $j = $i - 1;
            while ($j >= 0 && $arr[$j] > $key) {
                $arr[$j + 1] = $arr[$j];
                $j--;
            }
            $arr[$j + 1] = $key;
        }

        for ($i = 0; $i < $len; $i++) {
            echo $arr[$i] . " ";
        }
        echo "\n";
        $stop = Utility::stopTime();
        $elapsed = Utility::elapsedTime($start, $stop);
        echo ($elapsed/1000). " sec elasped\n";
        return $elapsed;
    }
/**function to sort integers using insertion sort for strings */
    public static function insertionSortString($n)
    {
        echo "                   4 : insertion sort string \n";
        $start = Utility::startTime();
        $arr = array();
        echo "enter element in string\n";
        for ($i = 0; $i < $n; $i++) {
            $arr[$i] = Utility::readString();
        }

        $len = sizeof($arr);
        for ($i = 1; $i < $len; $i++) {
            $key = $arr[$i];
            $j = $i - 1;
            while ($j >= 0) {
                if (strcmp($key, $arr[$j]) < 0) {
                    break;
                }
                $arr[$j + 1] = $arr[$j];
                $j--;

            }
            $arr[$j + 1] = $key;
        }

        for ($i = 0; $i < $len; $i++) {
            echo $arr[$i] . " ";
        }
        $stop = Utility::stopTime();
        $elapsed = Utility::elapsedTime($start, $stop);
        echo ($elapsed/1000) . " sec elasped\n";
        return $elapsed;
    }
/**function to sort using bubblesort */
    public static function bubbleSort($n)
    {
        echo "              5 : bubble sort \n";
        $start = Utility::startTime();
        $arr = array();
        echo "enter element \n";
        for ($i = 0; $i < $n; $i++) {
            $arr[$i] = Utility::readInt();
        }
        $len = sizeof($arr);
        for ($i = 0; $i < $len; $i++) {
            for ($j = $i + 1; $j < $len; $j++) {
                if ($arr[$i] > $arr[$j]) {
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }
        }

        for ($i = 0; $i < $len; $i++) {
            echo $arr[$i] . " ";
        }
        $stop = Utility::stopTime();
        $elapsed = Utility::elapsedTime($start, $stop);
        echo ($elapsed/1000) . " sec elasped\n";
        return $elapsed;
    }
/**function to sort using bubblesort for strings */
    public static function bubbleSortString($n)
    {
        echo "6 : bubble sort string\n";
        $start = Utility::startTime();
        $arr = array();
        echo "enter element in string\n";
        for ($i = 0; $i < $n; $i++) {
            $arr[$i] = Utility::getStringArray();
        }
        $len = sizeof($arr);
        for ($i = 0; $i < $len; $i++) {
            for ($j = $i + 1; $j < $len; $j++) {
                if (strcmp($arr[$i], $arr[$j]) > 0) {
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }
        }
        for ($i = 0; $i < $len; $i++) {
            echo $arr[$i] . " ";
        }
        $stop = Utility::stopTime();
        $elapsed = Utility::elapsedTime($start, $stop);
        echo ($elapsed/1000) . " sec elasped\n";
        return $elapsed;
    }

    public static function startTime()
    {
        $start = round(microtime(true) * 1000);
        echo $start . "\n";
        return $start;
    }
    public static function stopTime()
    {
        $stop = round(microtime(true) * 1000);
        echo $stop . "\n";
        return $stop;
    }
    public static function elapsedTime($start, $stop)
    {
        return $elapsed = $stop - $start;
        unset($start);
        unset($stop);
    }

    public static function binarySearchFile($arr)
    {

        sort($arr);
        echo "enter element to search ";
        $key = Utility::readString();
        $beg = 0;
        $end = count($arr) - 1;
        while ($beg <= $end) {
            $mid = floor(($beg + $end) / 2);
            if (strcmp($arr[$mid], $key) == 0) {
                echo "found at " . $mid;
                break;
            } else if (strcmp($arr[$mid], $key) < 0) {
                $beg = $mid + 1;
            } else if (strcmp($arr[$mid], $key) > 0) {
                $end = $mid - 1;
            }
        }
        if ($beg > $end) {
            echo "element not found";
        }
    }

    public static function insertionSortFile($arr)
    {
        for ($i = 1; $i < sizeof($arr); $i++) {
            $key = $arr[$i];
            $j = $i - 1;
            while ($j >= 0) {
                if (strcmp($arr[$j], $key) > 0) {
                    break;
                }
                $arr[$j + 1] = $arr[$j];
                $j--;
            }
            $arr[$j + 1] = $key;
        }
        echo "after sorting \n";
        for ($i = 0; $i < sizeof($arr); $i++) {
            echo $arr[$i] . " ";
        }
    }

    public static function bubbleSortFile($arr)
    {
        for ($i = 0; $i < sizeof($arr); $i++) {
            for ($j = $i + 1; $j < sizeof($arr); $j++) {
                if ($arr[$i] > $arr[$j]) {
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }
        }
        echo "after sorting \n";
        for ($k = 0; $k < sizeof($arr); $k++) {
            echo $arr[$k] . " ";
        }
    }

    public static function vendingMachine($notes, $amount)
    {
        $tempamount = $amount;
        $totalNotes = 0;
        $flag = false;
        for ($i = 0; $i < sizeof($notes); $i++) {
            if (floor($tempamount / $notes[$i]) > 0) {
                $Nonotes = floor($tempamount / $notes[$i]);
                $tempamount = floor($tempamount % $notes[$i]);
                echo $Nonotes ." ". $notes[$i]."rs\n";
                $totalNotes++;
                $flag = true;
                break;
            }
        }
        
        if ($flag) {
            Utility::vendingMachine($notes, $tempamount);
        }
        return $totalNotes;
    }
/**function to calculate day for year and date 
 * @param month year date
 * @return d0
*/
    public static function calculateDay($d, $m, $y)
    {
        $y0 = floor($y - (14 - $m) / 12) +1 ;
        $x = floor($y0 + $y0/4 - $y0/100 + $y0/400);
        $m0 = ($m + 12 * floor(((14 - $m) / 12)) - 2);
        $d0 = floor(($d + $x + floor((31*$m0) / 12)) % 7) ;
        return $d0;
    }

/**function to convert number to binary
 * @param : input number 
 */
    public static function toBinary($num)
    {
        $str = array();
        $i = 0;
        echo "Binary representation of "."$num\n";
        while ($num > 0) {
            $rem = floor($num % 2);
            // array_push($str, $i);
            $num = floor($num / 2);
            $str[$i] = $rem;
            $i++;
        }
        
       $new = array_reverse($str);
        for($i=0;$i<sizeof($new);$i++){
            echo $new[$i]." ";
        }

        return $new;
    }
    public static function toDecimal($strBin){
        $newStr= strrev($strBin);
        $strBinArr= str_split($newStr);
        $res = 0;
        for($i=0;$i<sizeof($strBinArr);$i++){
            $res = $res + $strBinArr[$i]*pow(2,$i);
        }
        echo "\ndecimal value\n";
        echo $res."\n";
    }

  /**binary nibbles */  
public static function binaryNibbles($binaryArr){
    $strBinary = implode("",$binaryArr);
        $len = 8 - strlen($strBinary) ;
        for($i=0;$i<$len;$i++){
            $strBinary = "0".$strBinary;
        }
    
    echo "\nconverting to 8 bits \n".$strBinary."\n";
    

    $str1 = substr($strBinary,0,4);
    $str2 = substr($strBinary,4,8);
    $str3 = $str2.$str1;
    echo "after swapping and converting to decimal ";
    echo $str3;
    Utility::toDecimal($str3);    
}

public static function sqrt($c){
    $t = $c ;
    $epsilon = 1e-15 ;
    while(abs($t-($c/$t))>$epsilon*$t){
        $t = ($c/$t + $t)/2 ;
    }
    echo $t ;
}
/**convert temperature to celcuis and celcuis to tempearture */
public static function tempConverstation($c){
    switch($c){
        case 1: echo "enter the value of celcuis\n";
                $celcius = Utility::readFloat();
                $faren = ($celcius*9)/5+32;
                echo "celcius to farenheit  ".$faren ."\n";
                break;
        case 2: echo "enter the value of farenheit\n";
                $farenheit = Utility::readFloat();
                $celci = (($farenheit-32) *5) /9;
                echo "farenheit to celcuis  ".$celci ."\n";
                break;  
        default :
                echo "invalid choice\n";              
    }
}
/**monthy payment */
public static function paymentMonthly($p,$y,$R){
    $r = $R/(12*100);
    $n = 12*$y;
    $payment = ($p*$r)/(1-pow(1+$r,-$n));
    echo "monthly payment :". $payment."\n";
}




}
?>