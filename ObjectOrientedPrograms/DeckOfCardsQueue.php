<?php
/**
* overview   : program to create a Player Object having Deck of Cards, and having ability to Sort by Rank and maintain the cards in a Queue implemented using Linked List
* purpose    : maintain the cards in a Queue implemented using Linked List.
* @author    : karthik
* @version   : 1.0   
* @since     : 02-02-2019
 ***********************************************************************************/
require 'utility.php';
require_once '../DataStructures/Queue.php';

$queue = new Queue;
$queue1 = new Queue;
$queue2= new Queue;
$queue3 = new Queue;

/**
 * intialize the suits card array
 */
$suits = array("Clubs","Diamonds", "Hearts", "Spades");


/**
 * intialize the rank card array
 */
$rank = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "Jack", "Queen", "King", "Ace");
$cards = array();
$cardsArr = Oops::storeCards($cards, $suits, $rank);
$suffledCards = Oops::suffleCards($cardsArr, $suits, $rank);


array_multisort($suffledCards);

/** adding twod array elements in new array*/
for($i=0;$i<sizeof($suffledCards);$i++){
    $z=0;
    for($j=0;$j<sizeof($suffledCards[$i]);$j++){
        $newArr[$z++] = $suffledCards[$i][$j];
    }
    
}
/** adding array elements into queue */
for($k=0;$k<sizeof($newArr);$k++){
    $queue->enqueue($newArr[$k]);
}

/** printing elements in queue */
echo "elements in queue\n";
for($j=0;$j<$queue->size();$j++){
    echo $queue->dequeue()." ";
}
echo "\n";


?>
