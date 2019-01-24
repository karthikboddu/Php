<?php


require ('Queue.php');
require ('LinkedList.php');
require ('utility.php');

// Utility::
 //$calender = Utility::printCalender();
 $linkedl = new LinkedList();
 $que = new Queue;
 $subQueue = new Queue;
echo "enter month \n";
$m = Utility::readInt();
echo " enter year \n";
$y = Utility::readInt();
$months =array('31','28','31','30','31','30','31','31','30','31','30','31');
$startday = Utility::calculateDay(1,$m,$y);

for($i=1;$i<=$months[$m-1];$i++){
    $subQueue->enqueue($i);
    if(($i+$startday)%7 ==0||$i==$months[$m-1]){
        $que->enqueue($subQueue);
        $subQueue = new Queue;
    }
}

for($i=0;$i<$startday;$i++){
    echo "\t";
}

for($i=0;$i<$que->size();$i++){
    $cal = new Queue;
    $cal = $que->dequeue();

    for($j=0;$j<$cal->size();$j++){
        echo $cal->dequeue() ."\t";
    }
    
    echo "\n";
}










// $queue = new Queue;
// $queue1 = new Queue;
// for($j=0;$j<1;$j++){
//     $k=0;
//     while($k<6){
//         for($i=0;$i<7;$i++){
//             $queue1->enqueue($calender[$k][$i]);
//         }   
//         $queue->enqueue($queue1);
//         $k++;
//         echo "\n";
        
//     }
    
 
// }
// $queue1->display();
// // echo $queue->dequeue();
// $linkedl = $queue->dequeue();
// $linkedl->display();


?>