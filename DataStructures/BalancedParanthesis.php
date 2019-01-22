<?php 
/**
     * Take an Arithmetic Expression such as (5+6)∗(7+8)/(4+3)(5+6)∗(7+8)/(4+3) where parentheses are used to order the
     *   performance of operations. Ensure parentheses must appear in a balanced fashion.
     * Purpose: check it is a valid expression using stack.
     * @author karthik
     * @version 1.0   
     * @since 21-01-2019
 */ 
require('utility.php');
require('Stack.php');

$string = "(5+6∗(7+8)/(4+3(5+6∗(7+8/(4+3";
$stack = new Stack;

$strArr = str_split($string);
$count = 0;
for($i=0;$i<sizeof($strArr);$i++){
    $exp = $strArr{$i};
    if($exp =='('){
        $stack->push($exp);
        $count++;
    }else if($exp ==')'){
        $stack->pop();
        $count--;
    }
}
if($stack->isEmpty()){
    echo "true\n";
}else{
    echo "false";
}
?>