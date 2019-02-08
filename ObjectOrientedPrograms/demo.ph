<?php

/**
 * set top level error handler function to handle in case of error occurence
 * 
 */
set_error_handler(function ($errno, $errstr, $error_file, $error_line) {
    echo "!!!!Error Occured!!!!!!!\n";
    echo "Error: [$errno] $errstr - $error_file:$error_line \n";
    echo "Terminating!!!!!!!!!\n";

    die();
});

//require teh files from the below files
require("Utility.php");

/**
 * function to get valid integer from the console
 */
function validInt($int, $min, $max)
{
    while (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
        echo ("Variable value is not within the legal range\n");
        echo "enter again : ";
        $int = Utility::getInt();
    }
    return $int;
}

//class to create object of stock
class Stock
{
    //var to store the data of stock
    public $name;
    //price of stack
    public $price;
    //quantity of share in the stock
    public $quantity;

    //constructor to initialize the variables in the class
    function __construct($name, $price, $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}

/**
 * funtion to but stocks from the list and add it to the account
 */
function buy($account)
{
    //var_dump($account);
    //list var to store the list the stock to purachase from
    $list = printStockList();
    //askins use rfor input
    echo "Enter No with Stock To Buy : ";
    //var ch to store stock to buy
    $ch = validInt(Utility::getInt(), 1, 8);
    echo $list[$ch-1]->name . " selected!\nEnter No Of Shares To Buy of " . $list[$ch-1]->name . " : ";
    //amnt to store the no of shares to buy
    $amnt = validInt(Utility::getInt(), 0, $list[$ch-1]->Quantity);
    if($account[0]->account<($list[$ch-1]->price*$amnt)){
        echo "insufficient fund\n";
        menu();
    }
    $list[$ch-1]->Quantity -= $amnt;
    saveList($list);
    //getting the stock from the list
    $stock = $list[$ch - 1];
    //creating new stock
    $stock = new Stock($stock->name, $stock->price, $amnt);
    //adding the stock to the account if already in the list and return
    $account[0]->account-= $amnt;
    for ($i = 1; $i < count($account); $i++) {
        if ($account[$i]->name == $stock->name) {
            $account[$i]->quantity += $stock->quantity;
            echo "Bought $stock->quantity " . "$stock->name shares successfully";
            return $account;
        }
    }
    //or else adds the new stack the end pf the list
    $account[] = $stock;
    echo "Bought $stock->quantity " . "$stock->name shares successfully";
    //waiting for user to see the result
    fscanf(STDIN, "%s\n");
    return $account;
}

function saveList($list){
    file_put_contents("StockList.json", json_encode($list));
}

/**
 * function to sell the stock from the list
 */
function sell($account)
{
    //show the stock from the list to the user
    printAccount($account);
    //taking the user input
    echo "Enter No with Stock To Sell : ";
    //validating the input
    $ch = validInt(Utility::getInt(), 1, count($account));
    echo $account[$ch]->name . " selected!\nEnter No Of Shares To Sell of " . $account[$ch]->name . " : ";
    $qt = validInt(Utility::getInt(), 1, $account[$ch]->quantity);
    //removing the stock
    $account[$ch]->quantity -= $qt;
    $list = printStockList(1);
    $list[$ch-1]->Quantity += $qt ;
    $account[0]->account += ($qt*$list[$ch-1]->price);
    saveList($list);

    echo "sold $qt shares successfully";
    //check if the shares are empty to delete the entry completely
    if ($account[$ch]->quantity == 0) {
        array_splice($account, ($ch), 1);
    }
    fscanf(STDIN, "%s\n");
    return $account;
}

//function to save the stocks to the file
function save($account)
{
    file_put_contents("Account.json", json_encode($account));
}

//function to display the menu and run the program
function menu($account)
{
    echo "Menu :\n";
    echo "Press 1 to Enter To Buy New Stock \nPress 2 to Sell Stocks\n";
    echo "Enter 3 to Print Stock Report\nEnter anything else to exit\n";
    $choice = Utility::getInt();
    //switch case to run according to condition
    switch ($choice) {
        case '1':
            $account = buy($account);
            echo "\n\n";
            menu($account);
            break;
        case '2':
            $account = sell($account);
            echo "\n\n";
            menu($account);
            break;
        case '3':
            report($account);
            menu($account);
            break;
        default:
            echo "press 1 to save";
            if (Utility::getInt() == 1) { 
                //var_dump($account); 
                save($account);
                echo "Transaction saved\n";
            }
            echo "Exit  ..!!!\n";
            break;
    }
}

/**
 * function to display the report of the stocks
 */
function report($account)
{
        // /    var_dump($portfolio);
    $total = 0;
    echo "Stock Name | Per Share Price | No. Of Shares | Stock Price\n";
    for ($i=1; $i < count($account) ; $i++) {
        $key = $account[$i];
        echo sprintf("%-10s | rs %-12u | %-13u | rs %u", $key->name, $key->price, $key->quantity, ($key->quantity * $key->price)) . "\n";
        $total += ($key->quantity * $key->price);
    }
    echo "Total Value Of Stocks is : " . $total . " rs\namount left in account : ".$account[0]->account;
    echo "\nenter to menu ";
    fscanf(STDIN, "%s\n");
}

//function to print the stock currently in the stock
function printAccount($account)
{
    echo "No | Stock Name | Share Price | No. Of Shares | Stock Price \n";
    $i = 0;
    for ($i=1; $i < count($account) ; $i++) {
        $key = $account[$i];
        echo sprintf("%-2u | %-10s | rs %-8u | %-13u | rs %u", $i, $key->name, $key->price, $key->quantity, ($key->quantity * $key->price)) . "\n";
    }
}

/**
 * function to print the list the stocks available to buy
 */
function printStockList(int $s=0)
{
    $list = json_decode(file_get_contents("StockList.json"));
    if($s===0){
        echo "No | Stock Name | Share Price | Available\n";
    $i = 0;
    foreach ($list as $key) {
        echo sprintf("%-1u. | %-10s | Rs %-12u | %-9u", ++$i, $key->name, $key->price , $key->Quantity) . "\n";
    }
    }
    return $list;
}

//checking the user account
$account = json_decode(file_get_contents("Account.json"));
//calling the user input
menu($account);
?>





 * creating an array of players
 */
$rrr = array("player1", "player2", "player3", "player4");
for ($i = 0; $i < 4; $i++) {
    /**
     * used to call the enqueue method to store
     */
    $object->enqueue($rrr[$i]);
}
for ($i = 0; $i < sizeof($cardspack); $i++) {
    $array1 = array();
    for ($j = 0; $j < sizeof($cardspack[$i]); $j++) {
        /**
         * function used to store the elements in an array
         */
        $array1[$j] = $cardspack[$i][$j];
    }
    /**
     * sorting the elements in an array
     */
    array_multisort($array1);
    for ($k = 0; $k < sizeof($array1); $k++) {
     /**
      * used to call and store in a queue a  set of array elements
      */
        $obj->enqueue($array1[$k]);
    }
}
for ($i = 0; $i < 4; $i++) {
    /**
     * calling the dequeue method
     */
    $value = $object->dequeue();
    /**
     * printing the value of it
     */
    echo $value . "::";
    for ($j = 0; $j < 9; $j++) {
        /**
         * calling the dequeue method and storing in the address variable
         */
        $address = $obj->dequeue();
        /**
         * printing the value of a variable
         */
        echo $address . "  ";
    }
    echo "\n";










<?php


/**
 * set top level error handler function to handle in case of error occurence
 * 
 */
set_error_handler(function ($errno, $errstr, $error_file, $error_line) {
    echo "!!!!Error Occured!!!!!!!\n";
    echo "Error: [$errno] $errstr - $error_file:$error_line \n";
    echo "Terminating!!!!!!!!!\n";
    die();
});

//require teh files from the below files
require("/home/bridgelabz/Chirag/BridgeLabzPHP/DataStructure/Stack.php");
require("/home/bridgelabz/Chirag/BridgeLabzPHP/DataStructure/Queue.php");
require_once("/home/bridgelabz/Chirag/BridgeLabzPHP/DataStructure/Node.php");
require("Utility.php");

/**
 * function to get valid integer from the console
 */
function validInt($int, $min, $max)
{
    //checks for input iteratively untill gets correct input
    while (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
        echo ("Variable value is not within the legal range\n");
        echo "enter again : ";
        $int = Utility::getInt();
    }
    return $int;
}

//class to create object of stock
class Stock
{
    //var to store the data of stock
    public $name;
    //price of stack
    public $price;
    //quantity of share in the stock
    public $quantity;

    //constructor to initialize the variables in the class
    function __construct($name, $price, $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}

class StockAccount
{
    public $account;
    public $stack;
    public $queue;

    public function __construct($account = [],$stack = [], $queue =[])
    {
        $this->account = $account;
        $this->stack = $stack;
        $this->queue = $queue;
    }
    function getAccount()
    {
        return $this->account;
    }
    function getStack()
    {
        return $this->stack;
    }
    function getQueue()
    {
        return $this->queue;
    }
    function setStack($stack)
    {
        $this->stack = $stack;
    }
    function setQueue($queue)
    {
        $this->queue = $queue;
    }
    function setAcc($account)
    {
        $this->account = $account;
    }
}

/**
 * funtion to but stocks from the list and add it to the account
 */
function buy($stockacc)
{
    $account = $stockacc->account;
    $stack = $stockacc->stack;
    $queue = $stockacc->queue;
    //var_dump($account);
    //list var to store the list the stock to purachase from
    $list = printStockList();
    //askins use rfor input
    echo "Enter No with Stock To Buy : ";
    //var ch to store stock to buy
    $ch = validInt(Utility::getInt(), 1, 8);
    echo $list[$ch - 1]->name . " selected!\nEnter No Of Shares To Buy of " . $list[$ch - 1]->name . " : ";
    //amnt to store the no of shares to buy
    $amnt = validInt(Utility::getInt(), 0, 90000);
    //getting the stock from the list
    $stock = $list[$ch - 1];
    //creating new stock
    $stock = new Stock($stock->name, $stock->price, $amnt);
    //adding the stock to the account if already in the list and return
    for ($i = 0; $i < count($account); $i++) {
        if ($account[$i]->name == $stock->name) {
            $account[$i]->quantity += $stock->quantity;
            echo "Bought $stock->quantity " . "$stock->name shares successfully";
            $stack[]= ($account[$ch - 1]->name . " bought");
            $queue[]=("$amnt " . $account[$ch - 1]->name . "shares bought at " . date("h:i:s D d/m/y"));
            $stockacc->account = $account;
            $stockacc->stack = $stack;
            $stockacc->queue = $queue;
            return $stockacc;
        }
    }
    //or else adds the new stack the end pf the list
    $account[] = $stock;
    echo "Bought $stock->quantity " . "$stock->name shares successfully";
    $stack[]=(" bought");
    $queue[]=($amnt . " " . $stock->name . " shares bought at " . date("h:i:s D d/m/y"));
    //waiting for user to see the result
    fscanf(STDIN, "%s\n");
    $stockacc->account = $account;
    $stockacc->stack = $stack;
    $stockacc->queue = $queue;
    return $stockacc;
}

/**
 * function to sell the stock from the list
 */
function sell($stockacc)
{
    $account = $stockacc->account;
    $stack = $stockacc->stack;
    $queue = $stockacc->queue;
    //show the stock from the list to the user
    printAccount($account);
    //taking the user input
    echo "Enter No with Stock To Sell : ";
    //validating the input
    $ch = validInt(Utility::getInt(), 1, count($account));
    echo $account[$ch - 1]->name . " selected!\nEnter No Of Shares To Sell of " . $account[$ch - 1]->name . " : ";
    $qt = validInt(Utility::getInt(), 1, $account[$ch - 1]->quantity);
    //removing the stock
    $account[$ch - 1]->quantity -= $qt;
    $stack[]=($account[ch - 1]->name . " sold");
    $queue[]=($account[ch - 1]->name . " shares sold at " . date("h:i:s D d/m/y"));
    print_r($stack);
    print_r($queue);
    echo "sold $qt shares successfully";
    //check if the shares are empty to delete the entry completely
    if ($account[$ch - 1]->quantity == 0) {
        array_splice($account, ($ch - 1), 1);
    }
    fscanf(STDIN, "%s\n");
    $stockacc->account = $account;
    $stockacc->stack = $stack;
    $stockacc->queue = $queue;
    return $stockacc;
}

/**
 *  function to save the stocks to the file
 */
function save($stockacc)
{
    file_put_contents("Account2.json", json_encode($stockacc));
}

//function to display the menu and run the program
function menu($stockacc)
{
    echo "Menu :\n";
    echo "Press 1 to Enter To Buy New Stock \nPress 2 to Sell Stocks\n";
    echo "Enter 3 to Print Stock Report\nEnter 4 to see Transaction History\nEnter anything else to exit\n";
    $choice = Utility::getInt();
    //switch case to run according to condition
    switch ($choice) {
        case '1':
            $stockacc = buy($stockacc);
            echo "\n\n";
            menu($stockacc);
            break;
        case '2':
            $stockacc = sell($stockacc);
            echo "\n\n";
            menu($stockacc);
            break;
        case '3':
            report($stockacc);
            menu($stockacc);
            break;
        case '4':
            transactions($stockacc->queue);
            menu($stockacc);
            break;
        default:
            echo "press 1 to save";
            if (Utility::getInt() == 1) { 
                //var_dump($account); 
                save($stockacc);
                echo "Transaction saved\n";
            }
            echo "Exit  ..!!!\n";
            break;
    }
}

/**
 * function to display the report of the stocks
 */
function report($stockacc)
{
    $account = $stockacc->account;
        // /    var_dump($portfolio);
    $total = 0;
    echo "Stock Name | Per Share Price | No. Of Shares | Stock Price\n";
    foreach ($account as $key) {
        echo sprintf("%-10s | rs %-12u | %-13u | rs %u", $key->name, $key->price, $key->quantity, ($key->quantity * $key->price)) . "\n";
        $total += ($key->quantity * $key->price);
    }
    echo "Total Value Of Stocks is : " . $total . " rs\n";
    echo "enter to menu ";
    fscanf(STDIN, "%s\n");
}

function transactions($queue)
{
    echo "Transaction History :\n";
    foreach ($queue as $key) {
        echo $key."\n";
    }
    echo"\n enter to Menu\n";
    fscanf(STDIN, "%s\n");

}

//function to print the stock currently in the stock
function printAccount($stockacc)
{
    $account = $stockacc->account;
    echo "No | Stock Name | Share Price | No. Of Shares | Stock Price \n";
    $i = 0;
    foreach ($account as $key) {
        echo sprintf("%-2u | %-10s | rs %-8u | %-13u | rs %u", ++$i, $key->name, $key->price, $key->quantity, ($key->quantity * $key->price)) . "\n";
    }
}

/**
 * function to print the list the stocks available to buy
 */
function printStockList()
{
    $list = json_decode(file_get_contents("StockList.json"));
    echo "No | Stock Name | Share Price \n";
    $i = 0;
    foreach ($list as $key) {
        echo sprintf("%-1u. | %-10s | Rs %-12u ", ++$i, $key->name, $key->price) . "\n";
    }
    return $list;
}

/**
 * convert standard stdClass object to custom object cast
 * @param $destination Object to which to convert
 * @param stdClass $source Source std:class object
 */
function cast(&$destination, stdClass $source)
{
    $sourceRef = new ReflectionObject($source);
    $sourceProperties = $sourceRef->getProperties();
    foreach ($sourceProperties as $sourceProperty) {
        $name = $sourceProperty->getName();
        if (gettype($destination->{$name}) == "object") {
            echo "rec";
            cast($destination->{$name}, $source->$name);
        } else {
            $destination->{$name} = $source->$name;
        }
    }
}

function fixCast(&$destination, $source)
{
    if (is_array($source)) {
        $getClass = get_class($destination[0]);
        $array = array();
        foreach ($source as $sourceItem) {
            $obj = new $getClass();
            fixCast($obj, $sourceItem);
            $array[] = $obj;
        }
        $destination = $array;
    } else {
        $sourceReflection = new \ReflectionObject($source);
        $sourceProperties = $sourceReflection->getProperties();
        foreach ($sourceProperties as $sourceProperty) {
            $name = $sourceProperty->getName();
            if (is_object(@$destination->{$name})) {
                fixCast($destination->{$name}, $source->$name);
            } else {
                $destination->{$name} = $source->$name;
            }
        }
    }
}

//checking the user account
$stockacc = json_decode(file_get_contents("Account2.json") , true );

if($stockacc==null){
    $stockacc = new StockAccount();
}
else{
    $stockacc = new StockAccount($stockacc["account"] ,$stockacc["stack"],$stockacc["queue"]);
}
// var_dump($stack);
 //transactions($stockacc->queue);
menu($stockacc);

?>