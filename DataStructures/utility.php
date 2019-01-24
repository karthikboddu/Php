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

public static function factorial($n){
    $fact = 1;

    for($i=1;$i<=$n;$i++){
        $fact = $fact*$i;
    }

    return $fact;
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
/**function to check the year is leap yr or not
 * @param : input the year to check leap year
 */
    public static function checkLeapYear($yr)
    {
        while ($yr < 999 && $yr < 10000) { /**year must 4 digits */
            echo "enter valid year must be 4 digit \n";
            $yr = Utility::readInt();
            Utility::checkLeapYear($yr);
        }
        $flag = false;
        if ($yr % 400 == 0) { /**divided by 400 or 4 then it is leap year else not  */
            $flag = true;
        } else if ($yr % 100 == 0) {
            $flag = false;
        } else if ($yr % 4 == 0) {
            $flag = true;
        }

        if ($flag) {
            return true;
        } else {
            return false;
        }
    }

/**print calender */
public static function printCalender(){

    echo "enter the month \n";
    $m = Utility::readInt();
    
    $date = 1;
    echo "enter the year\n";
    $y = Utility::readInt();
    $d0 = Utility::calculateDay($date,$m,$y);
    $calender = array();
    $days =array('31','28','31','30','31','30','31','31','30','31','30','31');
    $months =array('jan','feb','march','april','may','june','july','aug','sep','oct','nov','dev');
    $week = array('Sun','M','T','Wed','Th','F','Sat');
    if(Utility::checkLeapYear($y)){
        $days[1]=29;
    }
    // print_r($days);
    for($i=0;$i<6;$i++){
        for($j=0;$j<7;$j++){
            $calender[$i][$j]= -10;
        }
    }
    echo "\t\t\t\t".$months[$m-1]." ".$y."\n";
    
    
    $dateinc = 1;
    for($i=$d0;$i<7;$i++){
        $calender[0][$i] = $dateinc++;
    }

    for($i=1;$i<6;$i++){
        for($j=0;$j<7;$j++){
            
            $calender[$i][$j] = $dateinc++;
        }
    }
    for($k=0;$k<sizeof($week);$k++){
        echo "\t".$week[$k]." ";
    }
    echo "\n";
    for($i=0;$i<6;$i++){
        for($j=0;$j<7;$j++){
            if(($calender[$i][$j]<0)||($calender[$i][$j]>$days[$m-1])){
                echo "\t";
            }else if($calender[$i][$j]>0){
                echo "\t".$calender[$i][$j]." ";
            }
         }
        echo "\n";
    }

    return $calender;
//     print_r($calender);


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
        // echo "\n prime anagram number are \n";
        // for ($k = 0; $k < sizeof($primeAnagram); $k++) { //printing the anagram array
        //     echo $primeAnagram[$k] . "  ";
        // }
       $temp = array_unique($primeAnagram);
       $new_array = array_values($temp);
       
        return $new_array;
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


}


?>