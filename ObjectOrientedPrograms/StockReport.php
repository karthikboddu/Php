<?php
require 'utility.php';
require 'Stock.php';
class StockReport extends Stock
{
    /**
     * function to write json data into file 
    */
    function writeJson($file) {
        $stck = new Stock();
        echo "enter number of stocks\n";

        //enter no of stocks
        $no = Oops::readInt();
        
        //enter the stock details
        for ($i = 0; $i < $no; $i++) {
            echo "Enter the Stock " . ($i + 1) . " details\n\n";
            echo "enter the stock name\n";
            $stName = Oops::readString();
            $stck->setStockName($stName);
            echo "enter the number of shares \n";
            $noShares = Oops::readInt();
            $stck->setNoShare($noShares);
            echo "enter the share price\n";
            $sharePrice = Oops::readInt();
            $stck->setPrice($sharePrice);
            $obj[] = array('stock name' => $stName, 'no of shares' => $noShares, 'share price' => $sharePrice);
            $jData = json_encode($obj);
            $jStr = file_put_contents($file, $jData);
            // $stck->writeJson($file);
        }
    }

    /**
     * function to read json data from a file
     */
    public function readJson($file)
    {
        //gets contents present in file and store it in a string
        $fileStr = file_get_contents($file);

        //decods the string 
        $jsonData = json_decode($fileStr, true);
        return $jsonData;
    }

    /**function to print report each inventory */
    public function printReport($jsondata)
    {
        $toalValue = 0;
        echo "STOCK REPORT \n\n";

        //traversing every object elements and printing
        foreach ($jsondata as $stock) {
            $name = $stock['stock name'];
            $noShares = $stock['no of shares'];
            $price = $stock['share price'];
            $value = $noShares * $price;

            $toalValue += $value;
            printf('Name : %s ' . "\t" . 'number of shares : %d' . "\t" . 'price : %d ' . "\t" . 'value : %d  ' . PHP_EOL, $name, $noShares, $price, $noShares * $price);
        }
        echo "Total stock value : " . $toalValue . "\n";
    }

}
$stckReport = new StockReport();
$file = "stock.json";

//function to write json to a file
$stckReport->writeJson($file);

//function to read json 
$data = $stckReport->readJson($file);
echo "\n";

//function to print report
$stckReport->printReport($data);
?>