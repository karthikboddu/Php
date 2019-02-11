<?php

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


