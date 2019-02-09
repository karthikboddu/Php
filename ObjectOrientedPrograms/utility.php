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
public static function readChar(){
    fscanf(STDIN ,"%c",$val);
    while(is_string){
        
    }
}

public static function readJson($fileName){
    $fileStr = file_get_contents($fileName);
    $jsonData = json_decode($fileStr, true);
    return $jsonData;
}

public static function printJson($data){
    print_r($data);
    echo "STOCK REPORT\n\n";
    foreach ($data as $stock) {
        $name = $stock['symbol'];
        $noShares = $stock['share'];
        $price = $stock['date'];

        printf('symbol : %s ' . "\t" .PHP_EOL. 'number of shares : %d' .PHP_EOL . 'date : %d ' . "\t"  . PHP_EOL, $name, $noShares, $price);
    }
}

public static function storeCards($cards,$suits,$rank){
    
    for($i=0;$i<sizeof($suits);$i++){
        for($j=0;$j<sizeof($rank);$j++){
            $cards[$i][$j] =$rank[$j]." ".$suits[$i];
        }
    }
    return $cards;
}

public static function suffleCards($cards,$suits,$rank){
    for($i=0;$i<sizeof($cards);$i++){
        for($j=0;$j<sizeof($cards[$i]);$j++){
            $rand1 = rand(0,3);
            $rand2 = rand(0,11);
           
            $temp = $cards[$rand1][$rand2];
            $cards[$rand1][$rand2]= $cards[$i][$j];
            $cards[$i][$j]= $temp;
        }
    }
    return $cards;
}

public static function printCards($cards){
    echo "after suffling \n";
    
    for($i=0;$i<sizeof($cards);$i++){
        echo "Player ".($i+1)." : [";
        for($j=0;$j<sizeof($cards[$i]);$j++){
            echo $cards[$i][$j]." ";
        }
        echo "]\n\n";
    }
}



}

?>