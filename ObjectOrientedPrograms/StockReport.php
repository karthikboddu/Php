<?php 
require ('utility.php');
class StockReport{
    function print(){
        echo "enter number of stocks\n";
        $no = Oops::readInt();
        for($i=0;$i<$no;$i++){
            echo "enter the stock name\n";
            $stName = Oops::readString();
            echo "enter the number of shares \n";
            $noShares = Oops::readInt();
            echo "enter the share price\n";
            $sharePrice = Oops::readInt(); 
        }

    }
    

}


?>