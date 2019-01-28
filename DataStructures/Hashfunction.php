<?php 
/**
     * Read a List of Numbers from a file and arrange it ascending Order in a
     *      Linked List. Take user input for a number, if found then pop the number out of the
     *      list else insert the number in appropriate position
     * Purpose: Read from file the list of Numbers and take user input for a new number
     * @author karthik
     * @version 1.0   
     * @since 21-01-2019
 */ 
require ('LinkedList.php');

$arr = array('190','211','21','38');

for($i=0;$i<sizeof($arr);$i++){

    $hash[$i] = new LinkedList;
}


$linked = new LinkedList();
for($i=0;$i<sizeof($arr);$i++){
    $a = floor($arr[$i] % 11);
    $linked->add(
        $arr[$i]);
    
}

$linked->display();

?>