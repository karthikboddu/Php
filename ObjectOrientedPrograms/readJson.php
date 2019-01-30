<?php
class Inventory{
    function readJson($file){
        $fileStr = file_get_contents($file);
        $jsonData = json_decode($fileStr,true);
      //  print_r($jsonData);
        return $jsonData;
    }

    function print($jsonData){
        $str = array('Rice','Wheat','Pulses');
        for($i=0;$i<sizeof($str);$i++){
            $inven = $jsonData["$str[$i]"];

            foreach($inven as $groc){
                $name = $groc['name'];
                $weight = $groc['weight'];
                $price = $groc['price'];
                printf('%s  value %d  '.PHP_EOL, $name, $weight*$price);
            }
        }
    }
}


$file = "sample.json";
$inventory = new Inventory();
$jData = $inventory->readJson($file);
$inventory->print($jData);




// $rice = $data['Rice'];

// foreach ($rice as $r) {
//     $name = $r['name'];
//     $weight = $r['weight'];
//     $price = $r['price'];
//     printf('%s weight value %d  '.PHP_EOL, $name, $weight*$price);
   
// }


// print_r($data);


?>

