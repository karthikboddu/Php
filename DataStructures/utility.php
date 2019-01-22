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




}

?>