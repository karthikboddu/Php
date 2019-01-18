<?php
class Utility{
 /**function to read string  
 *@return String value */
static public function readString(){
    $var = readline("");
    while(is_numeric($var)){
        echo  "enter valid input ";
        fscanf(STDIN,"%s",$var);
    }
    return $var;
}
/**function to read integer 
 * @return integer value */
static public function readInt(){
    fscanf(STDIN,"%s",$i);
    // if(is_string($i)){
    //     echo "enter valid  ";
    // }else if(is_numeric($i)){
    //     return $i;
    // }

    // while(!is_numeric($i)){
    //     echo "enter valid input"."\n";
    //     fscanf(STDIN,"%d",$i);
    // }
    while(!is_numeric($i)||$i>(int)$i){
        echo "enter valid input";
        fscanf(STDIN,"%s",$i);
    }
    return $i;
}
/**  to read float values 
 *@return double value
*/
public static function readDouble(){
    fscanf(STDIN,"%f\n",$val);
    while(!is_float($val)){
        echo "ivalid input try again\n";
        fscanf(STDIN," %f\n ",$val);
    }
    return $val;
    }
/**read flaot values
 * @return float value
 */

public static function readFloat(){
    fscanf(STDIN,"%f\n",$val);
    while(!is_float($val)){
        echo "ivalid input try again\n";
        fscanf(STDIN," %f\n ",$val);
    }
    return $val;
    }
/**function to replace string with given string */
public static function stringReplace($str){
    $inputStr = "Hello <<UserName>>, How are you?";
    $str1 = "<<UserName>>";
    $str2 = str_replace($str1,$str,$inputStr);
    echo $str2;
}
/**function to take number of time to flip coin and print percentage of heads and tails   */
public static function coinFlip($flipNo){
    $tails = 0;
    $heads = 0;
    for($i=0;$i<$flipNo;$i++)
    {
        $random = rand(0,1);
        if($random<0.5){
        
            $tails++;
        }else{
            $heads++;
    }
    echo "random no ".$random."\n";
    }
    $tailPercent = ($tails/$flipNo)*100;
    $headsPercent = 100-$tailPercent;
    print "tails percentage".$tailPercent ."  %\n";
    print "heads percentage".$headsPercent."  %\n";
}
/**function to check the year is leap yr or not */
static public function checkLeapYear($yr){
    while($yr<999&&$yr<10000){
        echo "enter valid year must be 4 digit \n";
        $yr = Utility::readInt();
        Utility::checkLeapYear($yr);
    }
    $flag = FALSE;
    if($yr%400==0&&$yr>999&&yr<10000){ /**year must be 4 digit */
        $flag = TRUE;
    }else if($yr%100==0){
        $flag = FALSE;
    }else if($yr%4==0){
        $flag = TRUE;
    }
 
    if($flag){
        echo "leap year \n";
    }else{
        echo "not a leap year \n";
    }
}
/** prints a table of the
*powers of 2 that are less than or equal to 2^N*/
public static function powerOfTwo($num){
    $pow = pow(2,$num);
    $res = 0;
    echo "powers of 2 are \n";
    for($i=0;$i<=$num;$i++){
        echo pow(2,$i)."\n";
    }

}
/** PRINT Nth Harmonic value*/
public static function harmonicValue($num){
    if(!$num==0){
        $res = 0;
        echo "Nth harmonic value \n";
        for($i=1;$i<=$num;$i++){
            $res =$res+ 1/$i;
            echo 1/$i."+";
        }
    echo " = ";
    echo $res;
    }else{
        echo "enter n value > 0";
    }
}
/**function to prime factos of n */
public static  function primeFactor($n){
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
//**gambler */
public static function gamblerPlay($stack,$goal,$times){
    if($stack>$goal){
        echo "Stack is greater than goal\n";
    }
    $bets = 0 ;
    $wins = 0 ;
/** loop to PLAY no of time given by user*/
    for($i = 0 ; $i < $times ; $i++){
        $cash = $stack ;
        /** lopp till player got broke or win*/
        while($cash>0&&$cash<$goal){
            $bets++;
            $rand = rand(0,1);
            echo $rand." \n"; 
            if($rand <0.5){
                $cash++;
            }
            else{
                $cash--;
            }
            if($cash==$goal){
                $wins++;
            }
        }
}
// display results of gamble
echo $wins." wins out of ".$times;
echo "\ntotal bets : ".$bets."\n" ;
echo "wins% is ".($wins/$times * 100)."%\n";

}
/**function to print 2 Dimensional Array. */
static public function printTwoDArray($rows,$cols,$arr){
    echo "enter the " .$rows*$cols." elements";
    for($i=0;$i<$rows;$i++){
        for($j=0;$j<$cols;$j++){
            $twoDArr[$i][$j] = Utility::readInt();
        }
    }
    for($i=0;$i<$rows;$i++){
        for($j=0;$j<$cols;$j++){
            print $twoDArr[$i][$j]." ";
        }
        echo "\n";
    }
    // print_r($twoDArr);
}
/**number of triples that sum to exactly 0. */
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
            echo $i."  ";
        }
    }
}
/**prints the Euclidean distance  */
public static function distance($x,$y){
    $squareX = pow($x,$x); /**power of x,x */
    $squareY = pow($y,$y);/**power of y,y */
    $distance = sqrt($squareX+$squareY);
    echo "Euclidean distance \n";
    echo $distance;
}
/**
 * calcualte roots from expression
 */
public static function quadratic($a,$b,$c){
    $delta = pow($b,$b) - 4 * $a *$c;
    $root1 = -($b+sqrt($delta))/2*$a;
    $root2 = -($b-sqrt($delta))/2*$a;

    echo "Root 1 is ".$root1."\n";
    echo "Root 2 is ".$root2."\n";
}
/**calcualte windchill */
public static function windChill($t,$v){
    if($w>50||$v>120||$v<3){
        echo "enter valid value\n";
    }else{
        $w = 35.74+0.6215*$t+(0.4275*$t-35.75)*pow($v,0.16);
        echo "wind chill value \n";
        echo $w ."\n";
    }
}
/** */
public static function stopWatch(){
    echo "enter to start\n";
    fgets(STDIN);
    $strt = Utility::start();
    echo "enter to stop \n";
    fgets(STDIN);
    $stop = Utility::stop();
    $elapsed = $stop - $strt;
    echo $elapsed/1000."\n";
    // switch($c){
    //     case 1: Utility::start();
    //             break;
    //     case 2: Utility::stop();
    //             break;
    //     default:
    //             echo "invalid choice \n";
    //             break;                
    // }
    
}
public static function start(){
    $start =round( microtime()*1000);
    echo $start ."\n";
    return $start;
}
public static function stop(){
    $stop =round( microtime()*1000);
    echo $stop ."\n";
    return $stop;
}
/**function to check anagram of prime numbers */
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