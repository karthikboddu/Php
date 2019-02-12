<?php
/**
 * overview   : maintains a list of CompanyShares object which has Stock Symbol and Number of Shares as well as DateTime of the transaction. When buy or sell is initiated StockAccount checks if CompanyShares are available and accordingly update or create an Object.
 * @author    : karthik
 * @version   : 1.0
 * @since     : 31-01-2019
 ***********************************************************************************/
require ("utility.php");
require_once ('testCommData.php');
set_error_handler(function($e){
    echo "EROOR !!--";
    echo $e->getMessage();
}
);
function menu($account)
{
    $ch = 0;
    while($ch!=5)
    {
        //menu shown to the user
        echo "*************Commercial Data Processing*************\n";
        echo "Enter 1 to create a new stock account from the file\n";
        echo "Enter 2 to buy New Stock from the StockList\n";
        echo "Enter 3 to Sell Stocks\n";
        echo "Enter 4 to Print Stock Report\n";
        echo "Enter 5 to save the account and exit\n";
        $ch = Oops::readInt();
        //switch case to run according to condition
        switch ($ch) 
        {
            case 1 :    $newAccount = $account;
                        echo "New stock account is \n";
                        //to print the new account
                        Oops::printAccount($account);
                        echo "\n";
                        break;
            case 2 :
                        //calling function to buy a share and adding to account
                        $account =  Oops::buy($account);
                        echo "\n\n";
                        break;
            case 3 :
                        //calling function to sell share from account
                        $account = Oops::sell($account);
                        echo "\n\n";
                        break;
            case 4 :
                        //printing the report
                        echo "Printing the stock account details of customer\n\n";
                        Oops::report($account);
                        break;
            case 5 : 
                        echo "Account Saved to file\n";
                        break;
           default :
                        echo "enter a valid option\n";
                        break;
        }
    }
}
//checking the user account
$account = json_decode(file_get_contents("stockAccount.json"));
//calling the user input
menu($account);
?>