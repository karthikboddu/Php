<?php 
/**
     *Program which creates Banking Cash Counter where people come in to deposit Cash and withdraw Cash. Have an input panel to add people
     *      to Queue to either deposit or withdraw money and dequeue the people
     * Purpose: Panel to add People to Queue to Deposit or Withdraw Money and dequeue.
     * @author karthik
     * @version 1.0   
     * @since 21-01-2019
 */ 
require('utility.php');
require('Queue.php');
$queue = new Queue;
$queue1 = new Queue; 

$peple = array('karthik','harry','nishith','surendra');
echo "enter the number of people to add \n";
$people = Utility::readInt();
$str ="";
for($i=0;$i<$people;$i++){
    echo "enter the name";
    $name = Utility::readString();
    echo "enter 1 : Deposit 2: Withdrawal 3: exit \n";
    $choice = Utility::readInt();
    $queue->enqueue($name);
    $j=1;
    while($j<($choice+3)){
        switch($j){
            case 1: echo "enter amount\n";
                    $damount = Utility::readInt();
                    $queue1->enqueue($damount);
                    $j++;
                    break;
                  
            case 2: echo "enter amount to wd";
                    $wdamount = Utility::readInt();
                    if($wdamount<$damount){
                        $queue1->enqueue($wdamount*-1);
                        $j++;
                    } else{
                        echo "enter amount less than ".$damount."\n";
                    }
                    
                    break;
            case 3: $out= $queue->dequeue();
                    $str = $str.$out." ";
                    echo "exited\n";
                    $j++;   
                    break;
                    
    }
    }

}
echo "queue :[".$str.",]";


?>