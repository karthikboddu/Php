<?php 
    include('utility.php');
    echo "enter the size of array";
    $n = Utility::readInt();
    $time = array();
    echo "enter the choice \n 1.Binary search 2.binarysearch string 3.insertionsort 4.insertionstring 5.bubblesort 6.bubblesort string \n";
    $c = 1;
    while($c<7){
        switch($c){
            case 1:
                $elapsed1 = Utility::binarySearch($n);
                $time[$c] = $elapsed1;
                $c++;
                break;
            case 2:
                $elapsed2 = Utility::binarySearchString($n);
                $time[$c] = $elapsed2;
                $c++;
                break;
            case 3:
                $elapsed3 = Utility::insertionSort($n);
                $time[$c] = $elapsed3;
                $c++;
                break;
            case 4:
                $elapsed4 = Utility::insertionSortString($n);
                $time[$c] = $elapsed4;
                $c++;
                break;
            case 5;
                $elapsed5 = Utility::bubbleSort($n);
                $time[$c] = $elapsed5;
                $c++;
                break;
            case 6:
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
    for($i=1;$i<sizeof($time);$i++){
        echo $time[$i]." ";
    }
// echo "enter element to search \n"; 
//  $key = Utility::readString();
// $start = Utility::startTime();
// $elapsed = Utility::binarySearch($n);
// $stop = Utility::stopTime();
// echo $start."   ".$stop."\n";
// $elapsed = Utility::elapsedTime($start,$stop);
// echo $elapsed." sec elasped";
// Utility::binarySearchString($arr,$key);
// Utility::insertionSort($arr);
// Utility::insertionSortString($arr);
// Utility::bubbleSortString($arr);
// Utility::bubbleSort($arr);
?>