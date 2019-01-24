<?php 
require ('utility.php');
require ('Stack.php');
echo "enter the number \n";
$num = Utility::readInt();
$primeArr = Utility::primeNumberArr($num);
$primeAna = Utility::printPrimeAnagram($primeArr);

$stack = new Stack();
$stack1 = new Stack(); 
for($i=0;$i<count($primeAna);$i++){
    $stack->push($primeAna[$i]);
}
for($i=0;$i<sizeof($primeAna);$i++){
    $stack1->push($stack->pop());
}
echo "stack prime anangrams\n";
$stack1->display();


?>