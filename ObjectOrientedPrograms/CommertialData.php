<?php
require ('utility.php');
require ('StockAccount.php');
interface comData{
    function stockAcc($file);
    function buy($amount,$symbol);
    function sell($amount,$symbol);
    function save($file);
    function printReport();
}
class CommertialData  {
    function Commertial(){
        
        // $stckAcc= new stockAccount;
        echo "1 : create new account 2 : Display 3 :Exit\n";
        $choice =  Oops::readInt();
        switch($choice){
            case 1: echo "enter name\n";
                    $fileName = Oops::readString();
                    stockAccount::stockAcc($fileName);
                    break;
            case 2 : echo "enter name to display report\n";
                    $stName = Oops::readString();
                     display($stName);
                    break;        
        }
    }

    

}
$comm = new CommertialData();
$comm->Commertial();


?>