<?php
/**
 * overview : Create a Program which creates Banking Cash Counter where people come in to deposit Cash and withdraw Cash. Have an input panel to add people
 *              to Queue to either deposit or withdraw money and dequeue the people
 * Purpose : Panel to add People to Queue to Deposit or Withdraw Money and dequeue.
 * @author : karthik
 * @version : 1.0
 * @since : 23-01-2019
 */
require 'utility.php';
require 'Queue.php';

/**create object queue */
$queue = new Queue;

echo "enter the number of people to add \n";

/**read number of people to add */
$people = Utility::readInt();
$str = "";
$amount = 10000;
echo "enter the name \n";
for ($i = 0; $i < $people; $i++) {

    /** read names */
    $name = Utility::readString();

    /**add to the queue */
    $queue->enqueue($name);
}
$queue->display();
echo "are added to queue \n";

/** traverse queue */
for ($i = 0; $i < $queue->size(); $i++) {
    $qname = $queue->dequeue();
    // $queue1->enqueue($queue->dequeue());
    echo ($i + 1) . "  " . $qname . "\n";

    /** enter the option  */
    echo "1: deposit  2: withdrawal 3: quit\n";
    $j = Utility::readInt();
    switch ($j) {

        /**read the amount to add */
        case 1:echo "enter the amount to deposit\n";
            $damount = Utility::readInt();
            if ($amount >= $damount) {
                $amount += $damount;
                echo "balance update " . $amount . "\n";
                // $queue1->enqueue($damount);
            } else {
                echo "amount should greater than " . $amount;
            }
            break;

        case 2:echo "enter the amount to withdraw \n";
            echo "remaining balance " . $amount . " \n";
            $wamount = Utility::readInt();

            $amount -= $wamount;

            // $queue1->enqueue($wamount*-1);
            while ($amount < 0) {
                echo "enter lesser amount\n";
                $wamount = Utility::readInt();
            }
            echo $wamount . " withdrawled \n";
            break;
        case 3:break;
        default:echo "enter valid option\n";
    }
    echo $qname . " dequed " . " \n";
}
?>
// for($i=0;$i<$queue1->size();$i++){
//     echo $queue1->dequeue();

// }

// $def= new SplQueue;

// for($i=0;$i<3;$i++){
//     $newq = new Queue;
//     $newq= $queue->dequeue();

//     echo $new->;

// }

// for($i=0;$i<$people;$i++){
//     echo "enter the name";
//     $name = Utility::readString();
//     echo "enter 1 : Deposit 2: Withdrawal 3: exit \n";
//     $choice = Utility::readInt();
//     $queue->enqueue($name);
//     $j=1;
//     while($j<($choice+3)){
//         switch($j){
//             case 1: echo "enter amount\n";
//                     $damount = Utility::readInt();
//                     $queue1->enqueue($damount);
//                     $j++;
//                     break;

//             case 2: echo "enter amount to wd";
//                     $wdamount = Utility::readInt();
//                     if($wdamount<$damount){
//                         $queue1->enqueue($wdamount*-1);
//                         $j++;
//                     } else{
//                         echo "enter amount less than ".$damount."\n";
//                     }

//                     break;
//             case 3: $out= $queue->dequeue();
//                     $str = $str.$out." ";
//                     echo "exited\n";
//                     $j++;
//                     break;

//     }
//     }

// }
// echo "queue :[".$str.",]";
