<?php
class Utility
{
/**
 * function to read string
 *@return :String value 
 */
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

/**
 * function to read integer
 * @return :integer value 
 * */
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

/** To read float values
 *@return: double value
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

/**
*read flaot values
* @return: float value
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

/**
 * To get Strings array 
 * */
    public static function getStringArray()
    {
        return trim(fgets(STDIN));
    }
    public static function getBoolean()
    {
        fscanf(STDIN, "%s\n", $val);
        while ($val !== 't' && $val !== 'f') {
            echo "ivalid input try again\n";
            fscanf(STDIN, " %s\n ", $val);
        }
        return $val;
    }

/**
 * function to replace string with given string
 * @param : input string
 */
    public static function stringReplace($str)
    {
        trim($str);

        /**replace the username with the given string */
        $inputStr = "Hello <<UserName>>, How are you?";
        $str1 = "<<UserName>>";
        $str2 = str_replace($str1, $str, $inputStr);
        echo $str2;
    }

/**
 * function to take number of time to flip coin and print percentage of heads and tails
 * @param : number of times to flip
 */
    public static function coinFlip($flipNo)
    {
        $tails = 0;
        $heads = 0;
        for ($i = 0; $i < $flipNo; $i++) {

            /**generate random upto given range */
            $random = rand(0, 1);

            /**if random less than 0.5 inc tails else heads */
            if ($random < 0.5) {
                $tails++;
            } else {
                $heads++;
            }
            echo "random no " . $random . "\n";
        }
        $tailPercent = ($tails / $flipNo) * 100;
        $headsPercent = 100 - $tailPercent;
        print "tails percentage  " . $tailPercent . "  %\n";
        print "heads percentage  " . $headsPercent . "  %\n";
    }

/**
 * function to check the year is leap yr or not
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

        /**divided by 400 or 4 then it is leap year else not  */
        if ($yr % 400 == 0) {
            $flag = true;
        } else if ($yr % 100 == 0) {
            $flag = false;
        } else if ($yr % 4 == 0) {
            $flag = true;
        }

        if ($flag) {
            echo "leap year \n";
        } else {
            echo "not a leap year \n";
        }
    }

/**
 * function to generate coupon number
*/
    public static function generateCoupon($range)
    {
        $alpha = array();
        $letters = "a";
        for ($i = 0; $i < 26; $i++) {
            $alpha[$i] = $letters++;
        }
        $couponletters = array('1', '2', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'k', 'l');
        $couponNo = array();
        $totalDistinct = 0;
        $j=0;
        for ($i = 0; $i < $range; $i++) {
            
            $random = rand(1, $range);
            
            $couponNo[$j++] = $couponletters[$random];
        }
        $uni = array_unique($couponNo);
        $uniOne = array_values($uni);
        $total = sizeof($uniOne);
        for ($i = 0; $i < sizeof($uniOne); $i++) {
            echo "$uniOne[$i] ";
        }
        echo "\n" . "total distinct number " . $total . "\n";
    }

/** prints a table of the
 *powers of 2 that are less than or equal to 2^N
 *@param : input the number to print table
 */
    public static function powerOfTwo($num)
    {
        $pow = pow(2, $num);
        $res = 0;
        echo "powers of 2 are \n";

        /**power's of 2 upto  given input */
        for ($i = 0; $i <= $num; $i++) {
            echo pow(2, $i) . "\n";
        }

    }
/** print Nth Harmonic value
 * @param : input the number to print harmonic value
 */
    public static function harmonicValue($num)
    {
        if (!$num == 0) {
            $res = 0;
            echo "Nth harmonic value \n";

            for ($i = 1; $i <= $num; $i++) {
                $res = $res + 1 / $i;
                echo "1" . "/" . $i;

                if ($i >= $num) {
                    echo "";
                } else {
                    echo " + ";
                }
            }
            echo " = ";
            echo $res . "\n";
        } else {
            echo "enter n value > 0";
        }
    }
/**
 * function to prime factos of n
 * @param : input the number to print prim factors
 */
    public static function primeFactor($n)
    {
        echo "prime factors are : \n";

        // prime num start from 2
        for ($num = 2; $num <= $n; $num++) {
            $flag = true;
            for ($j = 2; $j <= $num / 2; $j++) {

                // it it is divided by zero it's not a prime
                if ($num % $j == 0) {
                    $flag = false;
                    break;
                }
            }
            if ($flag == true) {

                // prime numbers divided by inputs
                while ($n % $num == 0) {
                    echo $num . " \n";
                    $n = $n / $num;
                }

            }
        }
    }

/** 
 * Gambler play
 * @param : input stack,goal, no of times to play
 */
    public static function gamblerPlay($stack, $goal, $times)
    {
        if ($stack > $goal) {
            echo "Stack is greater than goal\n";
        }
        $bets = 0;
        $wins = 0;

/** loop to PLAY no of time given by user*/
        for ($i = 0; $i < $times; $i++) {
            $cash = $stack;

            /** lopp till player got broke or win*/
            while ($cash > 0 && $cash < $goal) {
                $bets++;
                $rand = rand(0, 1);
                if ($rand < 0.5) {
                    $cash++;
                } else {
                    $cash--;
                }
                if ($cash == $goal) {
                    $wins++;
                }
            }
        }

// display results of gamble
        echo $wins . " wins out of " . $times;
        echo "\ntotal bets : " . $bets . "\n";
        echo "wins% is " . ($wins / $times * 100) . "%\n";

    }

/**
 * function to print 2 Dimensional Array.
 * @param : input rows, columns ,array
 */
    public static function printTwoDArray($rows, $cols, $arr)
    {
        // echo "enter 1 :Integer 2: string";
        echo "enter the " . $rows * $cols . " elements";

        /** enter the values into an array */
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                $twoDArr[$i][$j] = Utility::readInt();
            }
        }

        /**print the array */
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                print $twoDArr[$i][$j] . "     ";
            }
            echo "\n";
        }
// print_r($twoDArr);
    }

/**
 * number of triples that sum to exactly 0.
 * @param : input number of elements in array
 */
    public static function distinctTriplets($n)
    {
        $arr = array();
        echo "enter the elements \n";

        //enter the elements to array
        for ($i = 0; $i < $n; $i++) {
            $arr[$i] = Utility::readInt();
        }
        $totalDistinct = 0;

        for ($i = 0; $i < sizeof($arr); $i++) {
            for ($j = $i + 1; $j < sizeof($arr); $j++) {
                for ($k = $j + 1; $k < sizeof($arr); $k++) {

                    //sum of three values of arry is equal to 0
                    if (($arr[$i] + $arr[$j] + $arr[$k]) == 0) {
                        echo $arr[$i] . " ", $arr[$j] . " " . $arr[$k] . " ";
                        $totalDistinct++;
                    }
                }
            }
        }
        echo "\n total distinct triplets are " . $totalDistinct . "\n";
    }
/** print prime number */
    public static function primeNumberUpto($n)
    {
        for ($i = 2; $i < $n; $i++) {
            $flag = true;
            for ($j = 2; $j < $i / 2; $j++) {
                if ($i % $j == 0) {
                    $flag = false;
                    break;
                }
            }
            if ($flag == true) {
                echo $i . "  ";
            }
        }
    }
/**
 * prints the Euclidean distance
 * @param : enter x and y value for distance
 */
    public static function distance($x, $y)
    {
        /**power of x,x */
        $squareX = pow($x, $x);

        /**power of y,y */
        $squareY = pow($y, $y);

        /** calculate distancec*/
        $distance = sqrt($squareX + $squareY);
        echo "Euclidean distance \n";
        echo $distance."\n";
    }
/**
 * calcualte roots from expression
 * @param : enter a ,b,c value for quadratic exp
 */
    public static function quadratic($a, $b, $c)
    {
        $delta = pow($b, $b) - 4 * $a * $c;

        /**calculate root1 */
        $root1 = -($b + sqrt($delta)) / 2 * $a;

        /** calculate root2 */
        $root2 = -($b - sqrt($delta)) / 2 * $a;
        echo "Root 1 is " . $root1 . "\n";
        echo "Root 2 is " . $root2 . "\n";
    }
/**
 * calcualte windchill
 * @param : enter temperature and speed for windchill
 */
    public static function windChill($t, $v)
    {
        if ($w > 50 || $v > 120 || $v < 3) {
            echo "enter valid value\n";
        } else {
            $w = 35.74 + 0.6215 * $t + (0.4275 * $t - 35.75) * pow($v, 0.16); // calcualte windchill
            echo "wind chill value \n";
            echo $w . "\n";
        }
    }
/** */
    public static function stopWatch()
    {
        echo "enter to start\n";
        fgets(STDIN);
        $strt = Utility::start();
        echo "enter to stop \n";
        fgets(STDIN);
        $stop = Utility::stop();
        $elapsed = $stop - $strt;
        echo "elapsed time ".($elapsed / 1000) . "\n";

    }
    /**function to start time */
    public static function start()
    {
        $start = round(microtime(true) * 1000);
        echo $start . "\n";
        return $start;
    }

    /**function to stop time */
    public static function stop()
    {
        $stop = round(microtime(true) * 1000);
        echo $stop . "\n";
        return $stop;
    }

/**function to check anagram of prime numbers */
    public static function checkAnagram($str1, $str2)
    {
        //check length of two string are equal
        if (strlen($str1) == strlen($str2)) {

            // split to array
            $str1Arr = str_split($str1);
            $str2Arr = str_split($str2);

            /**sort array by values */
            asort($str1Arr);
            asort($str2Arr);

            /** array to string by ""*/
            $str3 = implode("", $str1Arr);
            $str4 = implode("", $str2Arr);

            /**check both string are equal*/
            if ($str3 == $str4) {
                echo "Anagram \n";
            } else {
                echo "Not Anagram";
            }
        }
    }

    /**find string permutation */
    public static function stringPermutation($str)
    {
        echo "permution words are \n";
        $str1 = trim($str);
        if (!empty($str)) {
            Utility::permuation("", $str1);
        } else {
            echo "enter alteast one character \n";
        }
    }
/**implement string permutation */
    public static function permuation($output, $word)
    {
        if (empty($word)) {
            echo $output . $word . "\n"; /** */
        } else {
            for ($i = 0; $i < strlen($word); $i++) {
                Utility::permuation($output . $word{$i}, substr($word, 0, $i) . substr($word, $i + 1, strlen($word)));
            }
        }
    }

}
?>