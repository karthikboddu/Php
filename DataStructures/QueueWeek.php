<?php
/**
 * Week Object having a list of WeekDay objects each storing the day
 *   The WeekDay objects are stored in a Queue implemented using Linked List. Further maintain also a Week Object in a Queue to
 *  finally display the Calendar
 * Purpose: print calender using queue
 * @author karthik
 * @version 1.0
 * @since 25-01-2019
 */

require 'Queue.php';
require 'utility.php';

/**create new queue */
$que = new Queue; 
echo "enter month \n";

 /**enter month */
$m = Utility::readInt();
echo " enter year \n";

/**enter year */
$y = Utility::readInt(); 
$months = array('31', '28', '31', '30', '31', '30', '31', '31', '30', '31', '30', '31');
$monthname = array('jan', 'feb', 'march', 'april', 'may', 'june', 'july', 'aug', 'sep', 'oct', 'nov', 'dev');
$week = array('Sun', 'M', 'T', 'Wed', 'Th', 'F', 'Sat');
$startDay = Utility::calculateDay(1, $m, $y); /** return day for year and moth */

echo $startDay . "\n";


/**if itis leapyear then update array with feb 29 */
if (Utility::checkLeapYear($y)) { 
    $months[1] = 29;
}

 /**validate year and month */
if (($m <= 12 && $m >= 1) && ($y >= 1000 && $y <= 9999)) {

     /** add element to queue within month range */
    for ($i = 1; $i <= $months[$m - 1]; $i++) {
        $que->enqueue($i);
    }

    /**display month name */
    echo "\t\t\t" . $monthname[$m - 1] . "\t" . $y; 
    echo "\n";

    /**display week names */
    for ($k = 0; $k < sizeof($week); $k++) {
        echo $week[$k] . "\t";
    }
    echo "\n";

    /**add spaces at starting  */
    for ($i = 0; $i < $startDay; $i++) {
        echo "\t";
    }

    /**print elements from queue  */
    for ($j = 0; $j < $que->size(); $j++) { 
        $val = $que->peek();
        echo $que->dequeue() . "\t";
        if (($val + $startDay) % 7 == 0) {
            echo "\n";
        }
    }
    echo "\n";
} else {
    echo "enter valid date & year\n";
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
