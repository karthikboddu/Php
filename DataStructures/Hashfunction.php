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
require 'SingleLinkedList.php';

$file = fopen("wordInt.txt", "r");
$integers = fread($file, filesize("wordInt.txt"));
$arr = explode(" ", $integers);
print_r($arr);
$hash = array();
for ($i = 0; $i < 11; $i++) {

    $hash[$i] = new LinkedList;
}
for ($i = 0; $i < sizeof($arr); $i++) {
    $n = (int) $arr[$i] % 11;
    $hash[$n]->add((int) $arr[$i]);

}

function listarr($hash)
{
    $s = "";
    for ($i = 0; $i < sizeof($hash); $i++) {
        if ($hash[$i]->getString() != null) {
            $s .= $hash[$i]->getString() . " ";
        }
        return substr($s, 0, -1) . "\n";
    }
}   
    echo "list is" . listarr($arr);
    echo "enter the no to search \n";
    $num = Utility::readInt();
    $y = (int) $num % 11;
    if ($hash[$y]->search($num)) {
        echo "number found \n";
        $hash[$y]->remove($num);
    } else {
        echo "number not found \n";
        $hash[$y]->add($Num);
        echo "added to the list \n";
    }


$myfile = fopen("wordInt.txt", "w");
fwrite($myfile, listarr($hash));

?>