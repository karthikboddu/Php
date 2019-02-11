<?php
require_once 'CommertialData.php';

class stockAccount implements comData
{
//    public function __construct($fileName){
    //         $this->$fileName = $fileName;
    //     }
    // private $stName;
    // private $numOfShare;
    // private $stckPrice;
    // private $date;

    public function setStockName($stName)
    {
        $this->stockName = $stName;
    }
    public function getStockName()
    {
        return $this->stockName;
    }

    public function setNoShare($numOfShare)
    {
        $this->numberOfShare = $numOfShare;
    }
    public function getShare()
    {
        return $this->numberOfShare;
    }

    public function setPrice($stckPrice)
    {
        $this->stockPrice = $stckPrice;
    }

    public function getPrice()
    {
        return $this->stockPrice;
    }

    public function __construct($stckSymbol, $stNoShare, $price)
    {
        $this->stockName = $stckSymbol;
        $this->stockShare = $stNoShare;
        $this->pric = $price;
    }

    /**
     * function to create account
     */
    public function stockAcc($fileName)
    {
        try {
            $fileName = $fileName . ".json";
            if (!file_exists($fileName)) {
                echo "enter the stock name\n";
                $stName = Oops::readString();
                echo "enter number of shares \n";
                $noShare = Oops::readInt();
                echo "enter share price\n";
                $Price = Oops::readInt();
                $st[] = new stockAccount($stName, $noShare, $Price);
                $jdata = json_encode($st);
                if (file_put_contents($fileName, $jdata)) {
                    echo "Account created\n";
                    echo "1 : Buy 2 : sell 3: exit \n";
                    $ch = Oops::readInt();
                    switch ($ch) {
                        case 1:
                            stockAccount::buy($st);
                            break;
                        case 2:
                            stockAccount::sell($st);
                            break;
                        case 3:
                                break;    
                    }
                } else {
                    throw new Exception("error creating file\n");
                }
            } else {
                echo "file already exist";
                display($fileName);
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * function sell share from account
    */
    public function sell($st)
    {
        Oops::printAccount($st);
        echo "enter the stock to sell \n";
        $stNa = Oops::readInt();
        echo $st[$stNa]['stockName'] . " selected \n enter the no shares to sell of " . $st[$stNa]['stockName'];
        $amnt = Oops::readInt();
        $st[$stNa]['stockShare'] -= $amnt;
        $list = Oops::printStockList();
        $list[$stNa]->stockShare += $amnt;
        Oops::saveList($list);
        Oops::saveAccount($st);
        echo "sold $amnt shares\n";
    }

    /**
     * function to buy share from account
     */
    public function buy($st)
    {
        echo "STOCK REPORT\n\n";
        $list = Oops::printStockList();
        echo "enter no with stock to buy\n";
        $ch = Oops::readInt();
        echo $list[$ch]->stockName . "selected";
        echo "Enter No Of Shares To Buy of " . $list[$ch]->stockName . " : ";
        $amnt = Oops::readInt();

        // if ($st[0]->st < ($list[$ch]->price * $amnt)) {
        //     echo " Insufficient fund\n";
        //     return;
        // }
        $list[$ch]->stockShare -= $amnt;
        Oops::saveList($list);
        //getting the stock from the list

        $stock = $list[$ch];

        //creating new stock
        $stock = new StockAccount($stock->stockName, $stock->pric, $amnt);
    
        //adding the stock to the account if already in the list and return
        $st[0]['stockShare'] -= $amnt;
        for ($i = 0; $i < count($st); $i++) {
            if ($st[$i]['stockName'] == $stock->stockName) {
                $st[$i]['stockShare'] += $stock->stockShare;
                echo "Bought $stock->stockShare " . "$stock->stockName shares successfully";
                Oops::saveAccount($st);
                return $st;
            }
        }

        //or else adds the new stack the end pf the list
        $st[] = $stock;
        echo "Bought $stock->stockShare " . "$stock->stockName shares successfully";
        Oops::saveAccount($st);
        return $st;
    }

    public function save($file){

    }

    /**
     * function to printreport of the stock 
    */
    public function printReport($account)
    {
        echo "No | Stock Name | Share Price | No. Of Shares | Stock Price \n";

        //traversing over and printing the account details
        for ($i = 1; $i < count($account); $i++) {
            $key = $account[$i];
            echo sprintf("%-2u | %-10s | rs %-8u | %-13u | rs %u", $i, $key->name, $key->price, $key->quantity, ($key->quantity * $key->price)) . "\n";
        }

    }

    /**
     * function to print report  
    */
    public static function report($account)
    {
        $total = 0;
        echo "Stock Name | Per Share Price | No. Of Shares | Stock Price\n";
        //looping over and printing the account details and the account balance
        for ($i = 1; $i < count($account); $i++) {
            $key = $account[$i];
            echo sprintf("%-10s | rs %-12u | %-13u | rs %u", $key->name, $key->price, $key->quantity, ($key->quantity * $key->price)) . "\n";
            $total += ($key->quantity * $key->price);
        }
        echo "\n";
        echo "Total Value Of Stocks is : " . $total . " rs\namount left in account : " . $account[0]->account . "\n\n";
    }

    /**
     * function to display account info 
    */
    public function display($stFileName)
    {
        $stFileName = $stFileName.".json";
        try {
            if (file_exists($stFileName)) {
                $jData = Oops::readJson($stFileName);
                Oops::printJson($jData);
                echo "1 : Buy 2 : sell \n";
                $ch = Oops::readInt();
                switch ($ch) {
                    case 1:
                        stockAccount::buy($jData);
                        break;
                    case 2:
                        stockAccount::sell($jData);
                        break;
                }
            } else {
                throw new Exception("file not found\n");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
?>
