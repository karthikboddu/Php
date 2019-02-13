<?php
/**
* overview  : program to initialize deck of cards having suit ("Clubs","Diamonds", "Hearts", "Spades") & Rank ("2", "3", "4", "5", "6", "7", "8", "9", "10","Jack", "Queen", "King", "Ace").
*               Shuffle the cards using Random method and then distribute 9 Cards to 4 Players
* purpose   : Shuffle the cards using Random method and then distribute 9 Cards to 4 Players and Print the Cards the received by the 4 Players using 2D Array...
* @author   : karthik
* @version  : 1.0   
* @since    : 01-02-2019
 ***********************************************************************************/
require ('utility.php');

set_error_handler(function($e){
    echo "EROOR !!--";
    echo $e->getMessage();
}
);

//intialize suits card in an array
$suits = array("♣", "♦", "♥", "♠");

// intialize rank cards in an array
$rank = array("2", "3", "4", "5", "6", "7", "8", "9", "10","Jack", "Queen", "King", "Ace");

//create an array
$cards =array();

//function to add suits and rank in twodarray.
$cardsArr = Oops::storeCards($cards,$suits,$rank);

//function to sufflecards
$suffledCards = Oops::suffleCards($cardsArr,$suits,$rank);

//function to print suffled cards
Oops::printCards($suffledCards);

?>