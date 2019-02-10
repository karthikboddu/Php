<?php
class Oops{
/**
 * function to read string
 *@return :String value 
 */
public static function readString()
{
    $var = readline("");

    /**if input is numeric then throw error */
    while (is_numeric($var)) {
        echo "enter valid input ";
        fscanf(STDIN, "%s", $var);
    }
    return $var;
}

/**
* function to read integer
* @return :integer value 
* */
public static function readInt()
{
    fscanf(STDIN, "%s", $i);

    /**if input is numeric or decimal  */
    while (!is_numeric($i) || $i > (int) $i) {
        echo "enter valid input";
        fscanf(STDIN, "%s", $i);
    }
    return $i;
}

/** To read float values
*@return: double value
*/
public static function readDouble()
{
    fscanf(STDIN, "%s\n", $val);
    while (!is_float($val)) {
        echo "ivalid input try again\n";
        fscanf(STDIN, " %f\n ", $val);
    }
    return $val;
}

/**
*read flaot values
* @return: float value
*/
public static function readFloat()
{
    fscanf(STDIN, "%s\n", $val);
    while (!is_float($val)) {
        echo "ivalid input try again\n";
        fscanf(STDIN, " %f\n ", $val);
    }
    return $val;
}

/**
* To get Strings array 
* */
public static function getStringArray()
{
    return trim(fgets(STDIN));
}
public static function getBoolean()
{
    fscanf(STDIN, "%s\n", $val);
    while ($val !== 't' && $val !== 'f') {
        echo "ivalid input try again\n";
        fscanf(STDIN, " %s\n ", $val);
    }
    return $val;
}
public static function readChar(){
    fscanf(STDIN ,"%c",$val);
    while(is_string){
        
    }
}

public static function readJson($fileName){
    $fileStr = file_get_contents($fileName);
    $jsonData = json_decode($fileStr, true);
    return $jsonData;
}

public static function printJson($data){
    print_r($data);
    echo "STOCK REPORT\n\n";
    foreach ($data as $stock) {
        $name = $stock['stockName'];
        $noShares = $stock['stockShare'];
        $price = $stock['pric'];

        printf('symbol : %s ' . "\t" .PHP_EOL. 'number of shares : %d' .PHP_EOL . 'date : %d ' . "\t"  . PHP_EOL, $name, $noShares, $price);
    }
}

public static function storeCards($cards,$suits,$rank){
    
    for($i=0;$i<sizeof($suits);$i++){
        for($j=0;$j<sizeof($rank);$j++){
            $cards[$i][$j] =$rank[$j]." ".$suits[$i];
        }
    }
    return $cards;
}

public static function suffleCards($cards,$suits,$rank){
    for($i=0;$i<sizeof($cards);$i++){
        for($j=0;$j<sizeof($cards[$i]);$j++){
            $rand1 = rand(0,3);
            $rand2 = rand(0,11);
           
            $temp = $cards[$rand1][$rand2];
            $cards[$rand1][$rand2]= $cards[$i][$j];
            $cards[$i][$j]= $temp;
        }
    }
    return $cards;
}

public static function printCards($cards){
    echo "after suffling \n";
    
    for($i=0;$i<sizeof($cards);$i++){
        echo "Player ".($i+1)." : [";
        for($j=0;$j<sizeof($cards[$i]);$j++){
            echo $cards[$i][$j]." ";
        }
        echo "]\n\n";
    }
}
public static function validInt($int, $min, $max)
{
    while (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) 
    {
        echo ("Variable value is not within the legal range\n");
        echo "enter again : ";
        $int = Oops::integer_Input();
    }
    return $int;
}

public static function integer_Input()
{
    fscanf(STDIN, "%s\n", $num);
    //validating the integer input
    while((Oops::check_float($num)) || (!(is_numeric($num))) || ($num<0))
    {
        echo "enter a valid number ";
        //calling function again if in case not valid
        $num = Oops::integer_Input();
    }
    return $num;
}
public static function check_float($num)
{
    //should be numeric and should have decimal point
    if(is_numeric($num) && strpos($num,'.'))
    {
        return true;
    }
    else
    {
        return false;
    }
}

public static function sell($account)
{
    //show the stock from the list to the user
    Oops::printAccount($account);
    //taking the user input
    echo "Enter No with Stock To Sell : ";
    //validating the input
    $ch = Oops::validInt(Oops::integer_Input(), 1, count($account));
    echo $account[$ch]->name . " selected!\nEnter No Of Shares To Sell of " . $account[$ch]->name . " : ";
    $qt = Oops::validInt(Oops::integer_Input(), 1, $account[$ch]->quantity);
    //removing the stock
    $account[$ch]->quantity -= $qt;
    $list = Oops::printStockList(1);
    $list[$ch-1]->Quantity += $qt ;
    $account[0]->account += ($qt*$list[$ch-1]->price);
    Oops::saveList($list);
    Oops::saveAccount($account);
    echo "sold $qt shares successfully";
    //check if the shares are empty to delete the entry completely
    if ($account[$ch]->quantity == 0) 
    {
        array_splice($account, ($ch), 1);
    }
    return $account;
}

public static function buy($account)
        {
            //var_dump($account);
            //list var to store the list the stock to purachase from
            $list = Oops::printStockList();
            //asking use rfor input
            echo "Enter No with Stock To Buy : ";
            //var ch to store stock to buy
            $ch = Oops::validInt(Oops::integer_Input(), 1, 8);
            echo $list[$ch-1]->name . " selected!\n";
            echo "Enter No Of Shares To Buy of " . $list[$ch-1]->name . " : ";
            //amount to store the no of shares to buy
            $amnt = Oops::validInt(Oops::integer_Input(), 0, $list[$ch-1]->Quantity);
            if($account[0]->account<($list[$ch-1]->price*$amnt))
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
        }
        /**
        * this function save item into a list
        */
        public static function saveList(&$list)
        {
            file_put_contents("karthik.json", json_encode($list));
        }
        
        //function to save the stocks to the file
        public static function saveAccount($account)
        {
            file_put_contents("nokia.json", json_encode($account));
        }
        /**
        * function to print the list the stocks available to buy
        */
        public static function printStockList(int $s=0)
        {
            $list = json_decode(file_get_contents("karthik.json"));
            print_r($list);
            if($s===0)
            {
                echo "No | Stock Name | Share Price | Available\n";
                $i = 0;
                for ($i=0; $i < count($list) ; $i++) 
                {
                    $key = $list[$i];
                    echo sprintf("%-1u. | %-10s | Rs %-12u | %-9u", ++$i, $key->stockName, $key->stockShare , $key->pric) . "\n";
                }
            }
            return $list;
        }


public static function printAccount($account){

    echo "No | Stock Name | Share Price | No. Of Shares | Stock Price \n";
   
    //looping over and printing the account details
    for ($i=0; $i < count($account) ; $i++) 
    {
        $key = $account[$i];
        echo sprintf("%-2u | %-10s | rs %-8u | %-13u | rs %u", $i, $key['stockName'], $key['stockShare'], $key['pric'], ($key['pric'] * $key['stockShare'])) . "\n";
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

?>