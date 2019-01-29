<?php
class Utility
{

/**function to read string
 *@return String value */
    public static function readString()
    {
        $var = readline("");

        /**if input is numeric then throw error */
        while (is_numeric($var)) {
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

        /**if input is numeric or decimal  */
        while (!is_numeric($i) || $i > (int) $i) {
            echo "enter valid input";
            fscanf(STDIN, "%s", $i);
        }
        return $i;
    }
/**  to read float values
 *@return :double value
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
 * @return : float value
 */
    public static function readFloat()
    {
        fscanf(STDIN, "%f\n", $val);
        while (!is_float($val)) {
            echo "ivalid input try again\n";
            fscanf(STDIN, " %f\n ", $val);
        }
        return $val;
    }
/**
 * To get Strings array
 */
    public static function getStringArray()
    {
        return trim(fgets(STDIN));
    }
/**
 * function to find prime factors of n
 */
    public static function primeFactors($n)
    {
        echo "prime factors are : \n";

        /** prime num start from 2 */
        for ($num = 2; $num <= $n; $num++) {
            $flag = true;

            /**it it is divided by zero it's not a prime */
            for ($j = 2; $j <= $num / 2; $j++) {
                if ($num % $j == 0) {
                    $flag = false;
                    break;
                }
            }
            if ($flag == true) {
                echo $num . "prime \n";

                /** prime numbers divided by inputs */
                while ($n % $num == 0) {
                    echo $num . " \n";
                    $n = $n / $num;
                }

            }
        }
    }
/**
 * function to find prime number upto n
 */
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

            /**prime numbers */
            if ($flag == true) {

                /**storing in a array */
                array_push($primeno, $i);
                // echo $i;
            }
        }
        echo "\n prime upto " . $n . "are\n";

        /**printing the prime array */
        for ($k = 0; $k < sizeof($primeno); $k++) {
            echo $primeno[$k];
        }
    }
/**function to check anagram */
    public static function checkAnagram($str1, $str2)
    {

        /**check length of two string are equal */
        if (count($str1) == count($str2)) {

            /** split to array*/
            $str1Arr = str_split($str1);
            $str2Arr = str_split($str2);

            /** sort array by values */
            asort($str1Arr);
            asort($str2Arr);

            /**array to string by "" */
            $str3 = implode("", $str1Arr);
            $str4 = implode("", $str2Arr);

            /**check both string are equal */
            if ($str3 == $str4) {
                echo "Anagram \n";
            } else {
                echo "Not Anagram";
            }

        }
    }
/**
 * function to print prime number of size n
 */
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
/**
 * function to print prime anagram of prime array
 */
    public static function printPrimeAnagram($prime)
    {

        /** init array */
        $primeAnagram = array();
        $count = 0;
        for ($i = 0; $i < sizeof($prime); $i++) {
            for ($j = $i + 1; $j < sizeof($prime); $j++) {

                /** check two index are anagram */
                if (Utility::isPrimeAnagram("$prime[$i]", "$prime[$j]") == true) {
                    /**if true then add to array */
                    $primeAnagram[$count] = $prime[$i];
                    $count++;
                    $primeAnagram[$count++] = $prime[$j];
                }
            }
        }
        echo "\n prime anagram number are \n";

        /** printing the anagram array */
        for ($k = 0; $k < sizeof($primeAnagram); $k++) {
            echo $primeAnagram[$k] . "  ";
        }
    }
/**
 * function to check two string are prime anagram in array
 */
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
/**
 * function check whether prime numbers are palindrome
 */
    public static function printPrimePalindrome($arr)
    {
        $palindrome = array();
        $count = 0;
        for ($i = 0; $i < sizeof($arr); $i++) {

            /**check each array value is palindrome */
            if (Utility::isPalindrome("$arr[$i]")) {

                /**it is palidnrome then addd to array */
                $palindrome[$count] = $arr[$i];
                $count++;
            }
        }
        echo "\n prime palindrome number are \n";

        /**print prime palindrome */
        for ($k = 0; $k < sizeof($palindrome); $k++) {
            echo $palindrome[$k] . " ";
        }
    }
/**
 * function to check it is a palindrome
 */
    public static function isPalindrome($arr1)
    {

        /**reverse number is equal to original then palindrome */
        $arr2 = strrev($arr1);
        if ($arr1 == $arr2) {
            return true;
        } else {
            return false;
        }
    }

 /**function to check the year is leap yr or not
 * @param : input the year to check leap year
 */
public static function checkLeapYear($yr)
{

    /**year must 4 digits */
    while ($yr < 999 && $yr < 10000) { 
        echo "enter valid year must be 4 digit \n";
        $yr = Utility::readInt();
        Utility::checkLeapYear($yr);
    }
    $flag = false;

    if ($yr % 400 == 0) { 
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


/**
 * function to find element in using binarysearch
 * @param : input length
 */
    public static function binarySearch($n)
    {
        echo "\t1 : Binaray search\n";
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

        /**intial size of array */
        $beg = 0;

        /**length of array */
        $end = count($arr) - 1;

        while ($beg <= $end) {

            /**calculate mid  */
            $mid = floor(($beg + $end) / 2);

            /**if mid of array is key then key is found */
            if ($arr[$mid] == $key) {
                echo "key found at " . $mid . "\n";
                break;
            }
            /**if key is less than mid of array then array moves forward*/
            else if ($key < $arr[$mid]) {
                $end = $mid - 1;
            }
            /**if key>arry of mid then mid+1 */
            else {
                $beg = $mid + 1;
            }
        }
        if ($beg > $end) {
            echo "element not found\n";
        }
        $stop = Utility::stopTime();
        $elapsed = Utility::elapsedTime($start, $stop);
        $sec = $elapsed / 1000;
        $min = $sec / 60;
        echo "\n" . ($sec) . " sec elasped  " . $min . "  minutes\n";
        return $elapsed;
    }
/**
 * function to find element in using binarysearch with string
 * @param : $input length
 */
    public static function binarySearchString($n)
    {
        echo "\t2 : binarysearch string \n";
        $start = Utility::startTime();
        $arr = array();
        echo "enter element in string\n";

        /**enter elements into array */
        for ($i = 0; $i < $n; $i++) {
            $arr[$i] = Utility::getStringArray();
        }
        sort($arr);
        print_r($arr);
        echo "enter element to search \n";

        /**read string */
        $key = Utility::readString();
        $beg = 0;
        $end = count($arr) - 1;
        while ($beg <= $end) {
            $mid = floor(($beg + $end) / 2);

            /**strccmp of two string is 0 then elemnet is mid */
            if (strcmp($arr[$mid], $key) == 0) {
                echo "found at " . $mid;
                break;
            }
            /*strcmp of two string is lessthan 0 then mid+1 */
            else if (strcmp($arr[$mid], $key) < 0) {
                $beg = $mid + 1;
            }
            /**strcmp of two string is greater than 0 then mid-1 */
            else if (strcmp($arr[$mid], $key) > 0) {
                $end = $mid - 1;
            }
        }

        /**beg is greater than end not found */
        if ($beg > $end) {
            echo "element not found\n";
        }

        $stop = Utility::stopTime();
        $elapsed = Utility::elapsedTime($start, $stop);
        $sec = $elapsed / 1000;
        $min = $sec / 60;
        echo "\n" . ($sec) . " sec elasped  " . $min . "  minutes\n";
        return $elapsed;
    }
/**
 * function to sort integers using insertion sort
 * @param : input length
 */
    public static function insertionSort($n)
    {
        echo "                3: insertion sort \n";
        $start = Utility::startTime();
        $arr = array();
        echo "enter element \n";

        /**read integer */
        for ($i = 0; $i < $n; $i++) {
            $arr[$i] = Utility::readInt();
        }
        $len = sizeof($arr);

        /**taking next element as key and comparing with cother in every loop */
        for ($i = 1; $i < $len; $i++) {
            $key = $arr[$i];
            $j = $i - 1;
            while ($j >= 0 && $arr[$j] > $key) {
                $arr[$j + 1] = $arr[$j];
                $j--;
            }
            $arr[$j + 1] = $key;
        }

        /**printing array */
        for ($i = 0; $i < $len; $i++) {
            echo $arr[$i] . " ";
        }
        echo "\n";
        $stop = Utility::stopTime();
        $elapsed = Utility::elapsedTime($start, $stop);
        $sec = $elapsed / 1000;
        $min = $sec / 60;
        echo "\n" . ($sec) . " sec elasped  " . $min . "  minutes\n";
        return $elapsed;
    }
/**
 * function to sort integers using insertion sort for strings
 * @param :input length
 */
    public static function insertionSortString($n)
    {
        echo "                   4 : insertion sort string \n";
        $start = Utility::startTime();
        $arr = array();
        echo "enter element in string\n";

        /**read String */
        for ($i = 0; $i < $n; $i++) {
            $arr[$i] = Utility::readString();
        }
        $len = sizeof($arr);

        /**taking next element as key and comparing with cother in every loop */
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
        $sec = $elapsed / 1000;
        $min = $sec / 60;
        echo "\n" . ($sec) . " sec elasped  " . $min . "  minutes\n";
        return $elapsed;
    }
/**
 * function to sort using bubblesort
 * @param : input length
 */
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

        /**comparing with adjacent elements  */
        for ($i = 0; $i < $len; $i++) {
            for ($j = $i + 1; $j < $len; $j++) {

                /**if it is greater than other then swap */
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
        $sec = $elapsed / 1000;
        $min = $sec / 60;
        echo "\n" . ($sec) . " sec elasped  " . $min . "  minutes\n";
        return $elapsed;
    }
/**
 * function to sort using bubblesort for strings
 * @param: input length
 */
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

        /**comparing with adjacent elements  */
        for ($i = 0; $i < $len; $i++) {
            for ($j = $i + 1; $j < $len; $j++) {

                /**if it is greater than other then swap */
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
        $sec = $elapsed / 1000;
        $min = $sec / 60;
        echo "\n" . ($sec) . " sec elasped  " . $min . "  minutes\n";
        return $elapsed;
    }
/**
 * function to start stopwatch
 */
    public static function startTime()
    {

        /**microtime calculate time in milisec */
        $start = round(microtime(true) * 1000);
        return $start;
    }
/**
 * function to stop stopwatch
 */
    public static function stopTime()
    {
        /**microtime calculate time in milisec */
        $stop = round(microtime(true) * 1000);
        return $stop;
    }

    /**
     * function to return total of  stopwatch
     */
    public static function elapsedTime($start, $stop)
    {
        return $elapsed = $stop - $start;
        unset($start);
        unset($stop);
    }
/**
 * binarysearch of string from file
 * @param : input array
 */
    public static function binarySearchFile($arr)
    {

        
        echo "\nenter element to search \n";
        $key = Utility::readString();
        $beg = 0;
        $end = count($arr) - 1;
        while ($beg <= $end) {
            $mid = floor(($beg + $end) / 2);

            /**strccmp of two string is 0 then elemnet is mid */
            if (strcmp($arr[$mid], $key) == 0) {
                echo "found at " . $mid."\n";
                break;
            }
            /*strcmp of two string is lessthan 0 then mid+1 */
            else if (strcmp($arr[$mid], $key) < 0) {
                $beg = $mid + 1;
            }
            /**strcmp of two string is greater than 0 then mid-1 */
            else if (strcmp($arr[$mid], $key) > 0) {
                $end = $mid - 1;
            }
        }

        /**beg is greater than end not found */
        if ($beg > $end) {
            echo "element not found";
        }
    }
/**
 * insertion sort of string from file
 * @param : input array
 */
    public static function insertionSortFile($arr)
    {

        /**taking next element as key and comparing with cother in every loop */
        for ($i = 1; $i < sizeof($arr); $i++) {
            $key = $arr[$i];
            $j = $i - 1;
            while ($j >= 0) {
                if (strcmp($arr[$j], $key) < 0) {
                    break;
                }
                $arr[$j + 1] = $arr[$j];
                $j--;
            }
            $arr[$j + 1] = $key;
        }
        echo "after sorting \n";

        /**print array */
        for ($i = 0; $i < sizeof($arr); $i++) {
            echo $arr[$i] . " ";
        }
    }
/**
 * perform bubble sort from the file
 * @param : input array
 */
    public static function bubbleSortFile($arr)
    {

        /**comparing with adjacent elements  */
        for ($i = 0; $i < sizeof($arr); $i++) {
            for ($j = $i + 1; $j < sizeof($arr); $j++) {

                /**if it is greater than other then swap */
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
        echo "\n";
    }
/**
 * function to calculate the minimum number of Notes as well as the Notes to be returned by the Vending Machine as a Change
 * @param : input notes array nand amount
 */
    public static function vendingMachine($notes, $amount)
    {
        $tempamount = $amount;
        $totalNotes = 0;
        $flag = false;
        for ($i = 0; $i < sizeof($notes); $i++) {
            if (floor($tempamount / $notes[$i]) > 0) {

                /**checking each array is greater than 0 */
                $Nonotes = floor($tempamount / $notes[$i]);

                /**dividing given amount with array of notes */
                $tempamount = floor($tempamount % $notes[$i]);

                /**printing notes until less than 0 */
                echo $Nonotes . " " . $notes[$i] . "rs\n";
                $totalNotes++;
                $flag = true;
                break;
            }
        }

        /**recursively checking  */
        if ($flag) {
            Utility::vendingMachine($notes, $tempamount);
        }
        return $totalNotes;
    }

/**
 * function to calculate day for year and date
 * @param month year date
 * @return : d0
 */
    public static function calculateDay($d, $m, $y)
    {
        $y0 = floor($y - (14 - $m) / 12) + 1;
        $x = floor($y0 + $y0 / 4 - $y0 / 100 + $y0 / 400);
        $m0 = ($m + 12 * floor(((14 - $m) / 12)) - 2);
        $d0 = floor(($d + $x + floor((31 * $m0) / 12)) % 7);
        return $d0;
    }

/**
 * function to convert number to binary
 * @param : input number
 */
    public static function toBinary($num)
    {
        $str = array();
        $i = 0;
        echo "Binary representation of " . "$num\n";
        while ($num > 0) {

            /**binary number by dividing by 2 */
            $rem = floor($num % 2);
            // array_push($str, $i);
            $num = floor($num / 2);

            /**add to array */
            $str[$i] = $rem;
            $i++;
        }

        $new = array_reverse($str);
        for ($i = 0; $i < sizeof($new); $i++) {
            echo $new[$i] . " ";
        }

        return $new;
    }
/**
 *  convert binary to decimal
 * @param : input binary string
 */
    public static function toDecimal($strBin)
    {
        $strBinArr = array_reverse($strBin);
        
        $res = 0;
        for ($i = 0; $i < sizeof($strBinArr); $i++) {
            $res = $res + $strBinArr[$i] * pow(2, $i);
        }
        echo "\ndecimal value\n";
        echo $res . "\n";
    }

/**
 * binary nibbles
 * @param : input binary array */
    public static function binaryNibbles($binaryArr)
    {

        /**convert array to string */
        $strBinary = implode("", $binaryArr);
        $len = 8 - strlen($strBinary);

        /**adding 8 bit format  */
        for ($i = 0; $i < $len; $i++) {
            $strBinary = "0" . $strBinary;
        }

        echo "\nconverting to 8 bits \n" . $strBinary . "\n";

        /**dividing to two subarray string */
        $str1 = substr($strBinary, 0, 4);
        $str2 = substr($strBinary, 4, 8);

        //swapping two strings
        $str3 = $str2 . $str1;
        echo "after swapping and converting to decimal ";
        echo $str3;
        $str4 = str_split($str3);
        Utility::toDecimal($str4);
    }
/**
 * to compute the square root of a nonnegative number c
 * @param: input value
 */
    public static function sqrt($c)
    {
        $t = $c;

        /**calculate by applying formula */
        $epsilon = 1e-15;
        while (abs($t - ($c / $t)) > $epsilon * $t) {
            $t = ($c / $t + $t) / 2;
        }
        echo $t;
    }
/**
 * convert temperature to celcuis and celcuis to tempearture
 */
    public static function tempConverstation($c)
    {
        switch ($c) {

            /**celcuis to farenheit */
            case 1:echo "enter the value of celcuis\n";
                $celcius = Utility::readFloat();
                $faren = ($celcius * 9) / 5 + 32;
                echo "celcius to farenheit  " . $faren . "\n";
                break;

            /**farenheit to celcius */
            case 2:echo "enter the value of farenheit\n";
                $farenheit = Utility::readFloat();
                $celci = (($farenheit - 32) * 5) / 9;
                echo "farenheit to celcuis  " . $celci . "\n";
                break;
            default:
                echo "invalid choice\n";
        }
    }
/**
 * function to calculate monthy payment for amount
 * @param : year , rate, principal
 */
    public static function paymentMonthly($p, $y, $R)
    {

        /**calculate by applying formula */
        $r = $R / (12 * 100);
        $n = 12 * $y;
        $payment = ($p * $r) / (1 - pow(1 + $r, -$n));
        echo "monthly payment :" . $payment . "\n";
    }

/**
 * program to perform mergersort on strings
 * @param : input array
 * @return : output array
 */

/**
* function to perform merge sort
*@param : input string
*/
    public static function mergeSort($input)
    {
     
        
        $len = count($input);
        if (count($input) == 1) {
            return $input;
        }

        /**calculate mid */
        $mid = floor(count($input) / 2);

        /**divide array into two halves until is size is 1 */
        $left = array_slice($input, 0, $mid);
        $right = array_slice($input, $mid, $len - 1);
        $left = Utility::mergeSort($left);
        $right = Utility::mergeSort($right);

        /**merge sort the subarrays */
        return Utility::merge($left, $right);
    }
    /**to perform merge operation */
    public static function merge($left, $right)
    {
        $res = array();

        /**sorting the elements of subarray */
        while (count($left) > 0 && count($right) > 0) {
            if ($left[0] > $right[0]) {
                $res[] = $right[0];

                /**after adding to array remove element */
                $right = array_slice($right, 1);
            } else {
                $res[] = $left[0];
                $left = array_slice($left, 1);
            }
        }

        /**adding remaining elements into array */
        while (count($left) > 0) {
            $res[] = $left[0];
            $left = array_slice($left, 1);
        }
        while (count($right) > 0) {
            $res[] = $right[0];
            $right = array_slice($right, 1);
        }

        /**return the sorted array */
        return $res;
    }
/**
 * program to guess the number
 * @param : array,startlength,end length
 */
    public static function findNumber($arr, $start, $end)
    {

        if ($start - $end == 0) {
            return $arr[$start];
        } else {

            /**calculate mid  */
            $mid = floor(($start + $end) / 2);

            /**if your number is mid  */
            // echo "your number is " . $mid . "\n";
            if ($arr[$start] == $mid) {
                echo "number is " . $start . "\n";
            } else {

                /**if your number lies between start and mid type true or false */
                echo "your number is between" . $start . " and " . $mid . "\n";
                $ans = Utility::readString();
                trim($ans);
                strtolower($ans);
                if ($ans == "no" || $ans == "n") {
                    Utility::findNumber($arr, $mid, $end);
                } else if ($ans == "yes" || $ans == "y") {
                    Utility::findNumber($arr, $start, $mid);
                }else{
                    echo "invalid input\n";
                }
            }
        }

    }

}
?>