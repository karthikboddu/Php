<?php
/**
* overview  : program to initialize deck of cards having suit ("Clubs","Diamonds", "Hearts", "Spades") & Rank ("2", "3", "4", "5", "6", "7", "8", "9", "10","Jack", "Queen", "King", "Ace").
*               Shuffle the cards using Random method and then distribute 9 Cards to 4 Players
* purpose   : Shuffle the cards using Random method and then distribute 9 Cards to 4 Players and Print the Cards the received by the 4 Players using 2D Array...
* @author   : karthik
* @version  : 1.0   
* @since    : 01-02-2019
 ***********************************************************************************/
set_error_handler(function($e){
    echo "EROOR !!--";
    echo $e->getMessage();
}
);

    /**
     * function to readjson from a file
     */
    function readJson($file){
        $fileStr = file_get_contents($file);
        $jsonData = json_decode($fileStr,true);
        return $jsonData;
    }
   /**
     * function to print json data
     */
    function printJson($jsonData){
        $str = array('Rice','Pulses');

        //taking every object in json array and printing
            foreach($jsonData as $groc){
                $name = $groc['name'];
                $weight = $groc['weight'];
                $price = $groc['price'];
                echo "Details of inventory\n";
                printf('Name : %s '.PHP_EOL.'weight : %d'.PHP_EOL. 'price : %d '.PHP_EOL.'value : %d  '.PHP_EOL.PHP_EOL, $name,$weight,$price, $weight*$price);
            }
    }

$file = "sample1.json";

//calling the writejson function 

$jData = readJson($file);
printJson($jData);
?>


