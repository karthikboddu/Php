<?php
/**
* overview  : Write a program to read in Stock Names, Number of Share, Share Price.
*                Print a Stock Report with total value of each Stock and the total value of Stock.
* purpose   : Create Inventory Object from JSON. Calculate the value for every Inventory.
* @author   : karthik
* @version  : 1.0   
* @since    : 01-02-2019
 ***********************************************************************************/
require ('utility.php');
require ('InventoryItems.php');

set_error_handler(function($e){
    echo "ERROR!!--";
    echo $e->getMessage();
});
class Inventory extends Items{
    /**
     * function to json from a file
    */
    function readJson($file){
        $fileStr = file_get_contents($file);
        $jsonData = json_decode($fileStr,true);
        return $jsonData;
    }

    /**
     * function to write json to a file 
    */
    function writeJson($file){
        $inventory = new Inventory();
        echo "enter no of inventories\n";

        //enter no of inventories
        $no = Oops::readInt();

        //enter the stock details
        for($i=0;$i<$no;$i++){
            echo "Enter the Stock " . ($i + 1) . " details\n";
            echo "enter name\n";
            $name = Oops::readString();
            $inventory->setName($name);
            echo "enter weight\n";
            $weight = Oops::readInt();
            $inventory->setWeight($weight);
            echo "ener price\n";
            $price = Oops::readInt();
            $inventory->setPrice($price);
            $jData[] = array('name'=>$inventory->getName(),'weight'=>$inventory->getWeight(),'price'=>$inventory->getPrice())   
             ;     
            $data = json_encode($jData);    
            file_put_contents($file,$data);            
            echo "\n";
        }
        // file_put_contents($file,$data);
        $jdata = $inventory->readJson($file);
        $inventory->print($jdata);
    }

    /**
     * function to print json data
     */
    function print($jsonData){
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
}
$file = "sample1.json";
$inventory = new Inventory();

//calling the writejson function 
$inventory->writeJson($file);
$jData = $inventory->readJson($file);

?>

