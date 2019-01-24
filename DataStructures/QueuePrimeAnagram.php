<?php 
require ('utility.php');
require ('Queue.php');
echo "enter the number \n";
$num = Utility::readInt();
$primeArr = Utility::primeNumberArr($num);
$primeAna = Utility::printPrimeAnagram($primeArr);

$queue = new Queue;

for($i=0;$i<sizeof($primeAna);$i++){
    $queue->enqueue($primeAna[$i]);
}
echo "Queue prime Anagram\n";
$queue->display();