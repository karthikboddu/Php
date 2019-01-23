<?php
require ('Queue.php');

require ('utility.php');
// Utility::
$calender = Utility::printCalender();


$queue = new Queue;
$queue1 = new Queue;
for($j=0;$j<1;$j++){
    $k=0;
    while($k<6){
        for($i=0;$i<7;$i++){
            $queue1->enqueue($calender[$k][$i]);
            $queue->enqueue($queue1);
        }   
        $k++; 
        echo "\n";
        
    }
    
 
}
$queue1->display();
echo $queue->dequeue();


?>