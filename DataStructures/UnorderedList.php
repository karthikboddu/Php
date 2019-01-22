<?php 
/**
     * Read the Text from a file, split it into words and arrange it as Linked List.
     *      Take a user input to search a Word in the List. If the Word is not found then add it
     *      to the list, and if it found then remove the word from the List. In the end save the
     *      list into a file
     * Purpose: Read from file the list of Words and take user input to search a Text
     * @author karthik
     * @version 1.0   
     * @since 21-01-2019
 */ 
include('utility.php');
require('LinkedList.php');
$linkedList = new LinkedList;
$path = "wordString.txt";
$file = fopen($path,"r") or die("file not found\n");
$fileString = fgets($file);
$strArr = explode(" ",$fileString);
for($i=0;$i<sizeof($strArr);$i++){
    $linkedList->add($strArr[$i]);
}

$linkedList->display();
echo "\nenter the word to search\n";
$word = Utility::readString();
if($linkedList->search($word)){
    $linkedList->remove($word);
    echo $word ." removed\n";
}else{
    $linkedList->add($word);    
    echo "file updated\n";
}
$linkedList->display();
$lListData= $linkedList->getData();
$file1 = fopen($path,"w");
fwrite($file1,$lListData);
fclose($file1);
?>