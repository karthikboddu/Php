<?php
require ('utility.php');
require ("InventoryItems.php");

class Inventory extends InventoryItems {

    
    function readJson($file){
        $fileStr = file_get_contents($file);
        $jsonData = json_decode($fileStr,true);
        
        return $jsonData;
    }

    function writeJson($file){
        echo "enter no of inventories\n";
        $no = Oops::readInt();
        for($i=0;$i<$no;$i++){
            echo "enter category\n";
            $cat = Oops::readString();
            echo "enter name\n";
            $name = Oops::readString();
            echo "enter weight\n";
            $weight = Oops::readInt();
            echo "ener price\n";
            $price = Oops::readInt();
            $jData = array($cat=> array(array('name'=>$name,'weight'=>$weight,'price'=>$price))   
                        );     
            $data[$i] = json_encode($jData);    
            
        }
        print_r($data);

        for($j=0;$j<sizeof($data);$j++){   
            file_put_contents($file,$data[$j]);
            $dataOne = readJson($file);
            print($dataOne);
        }
        
        
        
    }

    function print($jsonData){
        $str = array('Rice','Pulses');
        for($i=0;$i<sizeof($str);$i++){
            $inven = $jsonData["$str[$i]"];

            foreach($inven as $groc){
                $name = $groc['name'];
                $weight = $groc['weight'];
                $price = $groc['price'];
                printf($str[$i].PHP_EOL.'Name : %s '.PHP_EOL.'weight : %d'.PHP_EOL. 'price : %d '.PHP_EOL.'value : %d  '.PHP_EOL.PHP_EOL, $name,$weight,$price, $weight*$price);
            }
        }
    }
}
$file = "sample1.json";
$inventory = new Inventory();
$inventory->writeJson($file);
$jData = $inventory->readJson($file);
// $inventory->print($jData);


// $rice = $data['Rice'];

// foreach ($rice as $r) {
//     $name = $r['name'];
//     $weight = $r['weight'];
//     $price = $r['price'];
//     printf('%s weight value %d  '.PHP_EOL, $name, $weight*$price);
   
// }


// print_r($data);


?>

