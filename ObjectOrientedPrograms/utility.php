<?php
class Oops{
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


}

?>