<?php 
require('utility.php');
$path = "wordsString.txt";
$file = fopen($path,"r");
$filestr = fgets($file);
$str = explode(",",$filestr) or die("file not found");

for($i=0;$i<sizeof($str);$i++){
    echo $str[$i]." ";
    echo " \n";
}
echo "\n";
Utility::insertionSortFile($str);

?>