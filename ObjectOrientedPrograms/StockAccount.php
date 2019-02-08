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
    public $stName;
    private $numOfShare;
    private $stckPrice;
    private $date;

     function setStockName($stName){
        $this->stockName = $stName;
    }
     function getStockName(){
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
    function __construct($stckSymbol,$stNoShare,$date){
        $this->symbol = $stckSymbol;
        $this->share = $stNoShare;
        $this->date = $date;
    }

    function stockAcc($fileName){
        try{           
             $fileName = $fileName.".json";
             if(!file_exists($fileName)){
                 echo "enter the stock symbol\n";
                 $stckSymbol = Oops::readString();
                 echo "enter number of shares \n";
                 $noShare = Oops::readInt();
                 echo "enter share price\n";
                 $Price = Oops::readInt();
                 $st[] = new stockAccount($stckSymbol,$noShare,$Price);   
                 $jdata = json_encode($st);   
                 if(file_put_contents($fileName,$jdata)){
                     echo "Account created\n";
                     echo "1 : Buy 2 : sell \n";
                     $ch = Oops::readInt();
                     switch($ch){
                         case 1: 
                                echo "enter symbol to buy\n";
                                $symbol = Oops::readString();
                                echo "enter the amount to buy\n";
                                $amount = Oops::readInt();
                                buy($amount,$symbol);
                                break;
                         case 2:
                                echo "enter symol to sell\n";
                                $symbol = Oops::readString();
                                echo "enter the amount to sell\n";
                                $amount = Oops::readInt();
                                sell($amount,$symbol);  
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

    function sell($amount,$symbol){

    }

    function buy($amount,$symbol){
        echo "enter file name\n";
        $fileName = Oops::readString();
        $fileName = $fileName.".json";
        if(file_exists($fileName)){
            $jData = Oops::readJson($fileName);
            Oops::printJson($jData);
            echo "STOCK REPORT\n\n";
            foreach ($jData as $stock) {
                $name = $stock['symbol'];
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

    function save($file){

    }
    function printReport(){

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
                                echo "enter symbol to buy\n";
                                $symbol = Oops::readString();
                                echo "enter the amount to buy\n";
                                $amount = Oops::readInt();
                               stockAccount:: buy($amount,$symbol);
                               break;
                         case 2:
                                echo "enter symol to sell\n";
                                $symbol = Oops::readString();
                                echo "enter the amount to sell\n";
                                $amount = Oops::readInt();
                                sell($amount,$symbol);  
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