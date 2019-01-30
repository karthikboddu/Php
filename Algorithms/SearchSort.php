<?php
/**
 * overview : Create Utility Class having following static methods binary search and string,inserion sort with string,bubble sort and string
 * Purpose: Print sorted list from the file
 * @author : karthik
 * @version : 1.0
 * @since : 17-01-2019
 */
include 'utility.php';
echo "enter the size of array";
$n = Utility::readInt();
$time = array();

/** enter the choice */
echo "enter the choice \n 1.Binary search 2.binarysearch string 3.insertionsort 4.insertionstring 5.bubblesort 6.bubblesort string \n";
$c = 1;
while ($c < 7) {
    switch ($c) {
        case 1:

        /**function print sorted and return time elapsed */
            $elapsed1 = Utility::binarySearch($n);
            $time[$c] = $elapsed1;
            $c++;
            break;
        case 2:

          /**function print search and return time elapsed */
            $elapsed2 = Utility::binarySearchString($n);
            $time[$c] = $elapsed2;
            $c++;
            break;
        case 3:

          /**function print sorted and return time elapsed */
            $elapsed3 = Utility::insertionSort($n);
            $time[$c] = $elapsed3;
            $c++;
            break;
        case 4:

          /**function print sorted and return time elapsed */
            $elapsed4 = Utility::insertionSortString($n);
            $time[$c] = $elapsed4;
            $c++;
            break;
        case 5;

          /**function print sorted and return time elapsed */
            $elapsed5 = Utility::bubbleSort($n);
            $time[$c] = $elapsed5;
            $c++;
            break;
        case 6:

          /**function print sorted and return time elapsed */
            $elapsed6 = Utility::bubbleSortString($n);
            $time[$c] = $elapsed6;
            $c++;
            break;
        default:
            echo "enter the valid choice";
            break;

    }
}

asort($time);
echo "[bs,bs string,insertionsort,insertionString,bubblesort,bubblesortstring\n";
for ($i = 1; $i < sizeof($time); $i++) {
    echo $time[$i] . " ";
}
?>
