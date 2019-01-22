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
require('utility.php');
require('LinkedList.php');
$linkedList = new LinkedList;
$path = "wordInt.txt";
$file = fopen("$path","r");
$fileStr = fgets($file);
$fileArr = explode(" ",$fileStr);
sort($fileArr);
for($i=0;$i<sizeof($fileArr);$i++){
    $linkedList->add($fileArr[$i]);
}

$linkedList->display();
echo "\n enter the element to search \n";
$key = Utility::readInt();
if($linkedList->search($key)){
    $linkedList->remove($key);
    echo $key." removed\n";
}else{
    $linkedList->add($key);
    echo "file updated\n";
}
$data =$linkedList->getData();
$file2= fopen("$path","w");
if( $file2 == false ) {
    echo ( "Error in opening new file" );
    exit();
 }
$fileW = fwrite($file2,$data);
fclose($file2);
?>