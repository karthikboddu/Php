<?php
require 'utility.php';
require 'Stock.php';
class StockReport extends Stock
{
    function writeJson($file) {
        $stck = new Stock();
        echo "enter number of stocks\n";
        $no = Oops::readInt();
        for ($i = 0; $i < $no; $i++) {
            echo "Enter the Stock " . ($i + 1) . " details\n";
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
    public function readJson($file)
    {
        $fileStr = file_get_contents($file);
        $jsonData = json_decode($fileStr, true);
        return $jsonData;
    }

    public function printReport($jsondata)
    {
        $toalValue = 0;
        echo "STOCK REPORT\n\n";
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
$stckReport->writeJson($file);
$data = $stckReport->readJson($file);
echo "\n";
$stckReport->printReport($data);
