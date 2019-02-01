<?php
require ('utility.php');
require ('InventoryItems.php');
class Inventory extends Items{


    function readJson($file){
        $fileStr = file_get_contents($file);
        $jsonData = json_decode($fileStr,true);
        return $jsonData;
    }

    function writeJson($file){
        $inventory = new Inventory();
        echo "enter no of inventories\n";
        $no = Oops::readInt();
        for($i=0;$i<$no;$i++){
            // echo "enter category\n"; 
            // $cat = Oops::readString();
            
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

    function print($jsonData){
        $str = array('Rice','Pulses');
        // for($i=0;$i<sizeof($str);$i++){
        //     $inven = $jsonData["$str[$i]"];

            foreach($jsonData as $groc){
                $name = $groc['name'];
                $weight = $groc['weight'];
                $price = $groc['price'];
                printf('Name : %s '.PHP_EOL.'weight : %d'.PHP_EOL. 'price : %d '.PHP_EOL.'value : %d  '.PHP_EOL.PHP_EOL, $name,$weight,$price, $weight*$price);
            }
        // }
    }
}
$file = "sample1.json";
$inventory = new Inventory();
$inventory->writeJson($file);
$jData = $inventory->readJson($file);





// $rice = $data['Rice'];

// foreach ($rice as $r) {
//     $name = $r['name'];
//     $weight = $r['weight'];
//     $price = $r['price'];
//     printf('%s weight value %d  '.PHP_EOL, $name, $weight*$price);
   
// }


// print_r($data);


?>

