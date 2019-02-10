<?php
require_once ('CommertialData.php');
require ('../DataStructures/Stack.php');
require ('../DataStructures/Queue.php');
$stack = new Stack();
$queue = new Queue();

class stockAccount implements comData{ 
//    public function __construct($fileName){
//         $this->$fileName = $fileName;
//     }
    // private $stName;
    // private $numOfShare;
    // private $stckPrice;
    // private $date;

    public function setStockName($stName){
        $this->stockName = $stName;
    }
    public function getStockName(){
        return $this->stockName;
    }

    public function setNoShare($numOfShare){
        $this->numberOfShare = $numOfShare;
    }
    public function getShare(){
        return $this->numberOfShare;
    }

    public function setPrice($stckPrice){
        $this->stockPrice = $stckPrice;
    }

    public function getPrice(){
        return $this->stockPrice;
    }
    function __construct($stckSymbol,$stNoShare,$price){
        $this->stockName = $stckSymbol;
        $this->stockShare = $stNoShare;
        $this->pric= $price;
    }

    public function stockAcc($fileName){
        try{           
             $fileName = $fileName.".json";
             if(!file_exists($fileName)){
                 echo "enter the stock name\n";
                 $stName = Oops::readString();
                 echo "enter number of shares \n";
                 $noShare = Oops::readInt();
                 echo "enter share price\n";
                 $Price = Oops::readInt();
                 $st[] = new stockAccount($stName,$noShare,$Price);   
                 $jdata = json_encode($st);   
                 if(file_put_contents($fileName,$jdata)){
                     echo "Account created\n";
                     echo "1 : Buy 2 : sell \n";
                     $ch = Oops::readInt();
                     switch($ch){
                         case 1: 
                                // echo "enter symbol to buy\n";
                                // $symbol = Oops::readString();
                                // echo "enter the amount to buy\n";
                                // $amount = Oops::readInt();
                                stockAccount::buy($st);
                                break;
                         case 2:
                                // echo "enter symol to sell\n";
                                // $symbol = Oops::readString();
                                // echo "enter the amount to sell\n";
                                // $amount = Oops::readInt();
                                stockAccount::sell($st);  
                                break;

                     }
                 }else{
                     throw new Exception("error creating file\n");
                 }  
             }else{
               echo   "file already exist";
                display($fileName);
             }
    
        }catch(Exception $e){
             echo $e->getMessage();
        }
         
     }

    public function sell($st){
        Oops::printAccount($st);
        echo "enter the stock to sell \n";
        $stNa = Oops::readInt();
        echo $st[$stNa]['stockName'] ." selected \n enter the no shares to sell of ".$st[$stNa]['stockName'];
        $amnt = Oops::readInt();

        $st[$stNa]['stockShare'] -=$amnt;
        $list = Oops::printStockList();
        $list[$stNa]->stockShare +=$amnt;
        Oops::saveList($list);
        Oops::saveAccount($st);
        echo "sold $amnt shares\n";
    }

    // public static function sell1($account)
    // {
    //     //show the stock from the list to the user
    //     Utility::printAccount($account);
    //     //taking the user input
    //     echo "Enter No with Stock To Sell : ";
    //     //validating the input
    //     $ch = Utility::validInt(Utility::integer_Input(), 1, count($account));
    //     echo $account[$ch]->name . " selected!\nEnter No Of Shares To Sell of " . $account[$ch]->name . " : ";
    //     $qt = Utility::validInt(Utility::integer_Input(), 1, $account[$ch]->quantity);
    //     //removing the stock
    //     $account[$ch]->quantity -= $qt;
    //     $list = Utility::printStockList(1);
    //     $list[$ch-1]->Quantity += $qt ;
    //     $account[0]->account += ($qt*$list[$ch-1]->price);
    //     Utility::saveList($list);
    //     Utility::saveAccount($account);
    //     echo "sold $qt shares successfully";
    //     //check if the shares are empty to delete the entry completely
    //     if ($account[$ch]->quantity == 0) 
    //     {
    //         array_splice($account, ($ch), 1);
    //     }
    //     return $account;
    // }

    function buy($st){

            echo "STOCK REPORT\n\n";
            $list = Oops::printStockList($st);
            echo "enter no with stock to buy\n";
            $ch = Oops::readInt();
            echo $list[$ch]['stockName']."selected";
            echo "Enter No Of Shares To Buy of " . $list[$ch]['stockName']. " : ";
            $amnt = Oops::readInt();

            if($st[0]->st<($list[$ch]->price*$amnt))
            {
                echo " Insufficient fund\n";
                return;
            }
            $list[$ch-1]->Quantity -= $amnt;
            Oops::saveList($list);
            //getting the stock from the list
            $stock = $list[$ch - 1];
            //creating new stock
            $stock = new StockData($stock->name, $stock->price, $amnt);
            //adding the stock to the account if already in the list and return
            $account[0]->account-= $amnt;
            for ($i = 1; $i < count($account); $i++) 
            {
                if ($account[$i]->name == $stock->name) 
                {
                    $account[$i]->quantity += $stock->quantity;
                    echo "Bought $stock->quantity " . "$stock->name shares successfully";
                    Oops::saveAccount($account);
                    return $account;
                }
            }
            //or else adds the new stack the end pf the list
            $account[] = $stock;
            echo "Bought $stock->quantity " . "$stock->name shares successfully";
            //waiting for user to see the result
            Oops::saveAccount($account);
            return $account;
            foreach ($jData as $st) {
                $name = $st['stockName'];
                if($name==$symbol){
                    $stock['date'] =$amount; 
                     date(d\m\y);
                    echo "buyed\n";  
                }else{
                    echo "invalid file\n";
                }
                $noShares = $stock['share'];
                $price = $stock['date'];
        
                printf('symbol : %s ' . "\t" .PHP_EOL. 'number of shares : %d' .PHP_EOL . 'date : %d ' . "\t"  . PHP_EOL, $name, $noShares, $price);
            }
        }
    }

    public function save($file){

    }
    function printReport($account){

                    echo "No | Stock Name | Share Price | No. Of Shares | Stock Price \n";
                   
                    //looping over and printing the account details
                    for ($i=1; $i < count($account) ; $i++) 
                    {
                        $key = $account[$i];
                        echo sprintf("%-2u | %-10s | rs %-8u | %-13u | rs %u", $i, $key->name, $key->price, $key->quantity, ($key->quantity * $key->price)) . "\n";
                    }
            
    }

    public static function report($account)
    {
        $total = 0;
        echo "Stock Name | Per Share Price | No. Of Shares | Stock Price\n";
        //looping over and printing the account details and the account balance
        for ($i=1; $i < count($account) ; $i++) 
        {
            $key = $account[$i];
            echo sprintf("%-10s | rs %-12u | %-13u | rs %u", $key->name, $key->price, $key->quantity, ($key->quantity * $key->price)) . "\n";
            $total += ($key->quantity * $key->price);
        }
        echo "\n";
        echo "Total Value Of Stocks is : " . $total . " rs\namount left in account : ".$account[0]->account."\n\n";;
    }


}
function display($stFileName){

    try{  
        if(file_exists($stFileName)){
            $jData = Oops::readJson($stFileName);
            Oops::printJson($jData);
            echo "1 : Buy 2 : sell \n";
                     $ch = Oops::readInt();
                     switch($ch){
                         case 1: 
                                // echo "enter symbol to buy\n";
                                // $symbol = Oops::readString();
                                // echo "enter the amount to buy\n";
                                // $amount = Oops::readInt();
                                stockAccount:: buy($jData);
                                break;
                         case 2:
                                // echo "enter symol to sell\n";
                                // $symbol = Oops::readString();
                                // echo "enter the amount to sell\n";
                                // $amount = Oops::readInt();
                                stockAccount::sell($jData);  
                                break;
                     }


        }else{
            throw new Exception("file not found\n");
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }    
}
  

 


?>