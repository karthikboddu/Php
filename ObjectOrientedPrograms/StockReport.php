<?php 
require ('utility.php');
require ('Stock.php');
class StockReport extends Stock{

    function print($file){
        $stck = new Stock();
        echo "enter number of stocks\n";
        $no = Oops::readInt();
        for($i=0;$i<$no;$i++){
            echo "enter the stock name\n";
            $stName = Oops::readString();
            $stck->setStockName($stName);
            echo "enter the number of shares \n";
            $noShares = Oops::readInt();
            $stck->setNoShare($noShares);
            echo "enter the share price\n";
            $sharePrice = Oops::readInt();
            $stck->setPrice($sharePrice);
            $obj[] = array('stock name'=>$stName,'no of shares'=>$noShares,'share price'=>$sharePrice);

            $jData = json_encode($obj);
            $jStr = file_put_contents($file,$jData);
            
            // $stck->writeJson($file);
        }
    }
        function readJson($file){
            $fileStr = file_get_contents($file);
            $jsonData = json_decode($fileStr,true);
            return $jsonData;
        }

        function printReport($jsondata){

            echo "STOCK REPORT\n\n";
            foreach($jsondata as $stock){
                $name = $stock['stock name'];
                $weight = $stock['no of shares'];
                $price = $stock['share price'];
                printf('Name : %s '."\t".'number of shares : %d'."\t". 'price : %d '."\t".'value : %d  '.PHP_EOL, $name,$weight,$price, $weight*$price);
            }
        }

        

    
    

}
$stckReport = new StockReport();
$file = "stock.json";
$stckReport->print($file);
$data = $stckReport->readJson($file);
$stckReport->printReport($data);
?>