<?php
require 'utility.php';
$suits = array("Clubs","Diamonds", "Hearts", "Spades");
$rank = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "Jack", "Queen", "King", "Ace");
$cards = array();
$cardsArr = Oops::storeCards($cards, $suits, $rank);
$suffledCards = Oops::suffleCards($cardsArr, $suits, $rank);

    array_multisort($suffledCards);

print_r($suffledCards);

?>
