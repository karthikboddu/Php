<?php

// require ('QueueWeek.php');
require ('Stack.php');
require ('utility.php');
$stack = new Stack();
$stack1 = new Stack();
// $queueWeek = new Queue();

    echo "enter month\n";
    $m = Utility::readInt();
    echo "enter year\n";
    $y = Utility::readInt();
    // $queueWeek = Utility::queWeek();
    $week = array('Sun','M','T','Wed','Th','F','Sat');
    $months = array('31', '28', '31', '30', '31', '30', '31', '31', '30', '31', '30', '31');
    $d0 = Utility::calculateDay(1,$m,$y);
if (($m <= 12 && $m >= 1) && ($y >= 1000 && $y <= 9999)) {

    if (Utility::checkLeapYear($y)) { /**if itis leapyear then update array with feb 29 */
        $months[1] = 29;
    }
    // for($i=0;$i<sizeof($week);$i++){
    //     $stack->push($week[$i]);
    // }

    for($j=1;$j<=$months[$m-1];$j++){
        $stack->push($j);
    }

    for($k=0;$k<$stack->size();$k++){
        $stack1->push($stack->pop());
    }
    // for($i=0;$i<$queueWeek->size();$i++){
    //    echo  $queueWeek->dequeue();        
    // }
    // $stack1->display();
    for($s=0;$s<$d0;$s++){
        echo "\t";
    }
    for($i=0;$i<$stack1->size();$k++){
        $val = $stack1->peek();
        echo $stack1->pop()."\t";
        if(($val+$d0)%7==0){
            echo "\n";
        }
        
    }
    echo "\n";
}else{
    echo "enter valid date & year\n";
}    

?>