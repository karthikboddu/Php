<?php
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