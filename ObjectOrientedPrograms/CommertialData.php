<?php
/**
* overview :maintains a list of CompanyShares object which has
*   Stock Symbol and Number of Shares as well as DateTime of the transaction. When buy or sell is initiated StockAccount checks if CompanyShares are available and accordingly update or create an Object
* purpose : prints the wind chill.
* @author : karthik
* @version : 1.0   
* @since : 03-02-2019
 ***********************************************************************************/
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