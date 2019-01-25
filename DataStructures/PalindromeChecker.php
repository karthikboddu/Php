<?php 
/**
     * A palindrome is a string that reads the same forward and backward We would like to 
     *       construct an algorithm to input a string of characters and check whether it is a palindrome
     * Purpose: check whether the string is a palindrome
     * @author karthik
     * @version 1.0   
     * @since 23-01-2019
 */ 
require('utility.php');
require('DEque.php');
$dequeu = new Deque;
echo "enter the string \n";
$str = Utility::readString();
$str1 = str_split($str);
print_r($str1);
for($i=0;$i<sizeof($str1);$i++){
    $dequeu->addRear($str1[$i]);
}

$dequeu->displayForward();
echo "\n";
$string ="";
for($i=0;$i<sizeof($str1);$i++){
    $string=$string.$dequeu->removeRear();
}
echo $string."\n";

if($str==$string){
    echo "true";
}else{
    echo "false";
}


?>