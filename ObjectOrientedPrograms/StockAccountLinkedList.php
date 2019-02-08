<?php
require ('utility.php');
require ('StockAccount.php');
class StockLl extends StockAccount
{
    function addToStock($arr)
    {
        $stockObj = new StockLl();
        echo "enter the  stock name:";
        $uname = Oops::readString();
        
        echo "enter the share:";
        $ushare = Oops::readInt();
        echo "enter the price:";
        $uprice = Oops::readInt();
        
        $stockobj->name = $uname;
        $stockobj->share = $ushare;
        $stockobj->price = $uprice;
        /**
         * storing the object of class in to an array
         */
        $arr = $obj;
        /**
         * returning the stored value.
         */
        return $arr;
    }

}



function removeStock($objs)
{
    echo "enter the stock name:";
    $sname = Oops::getString();
    /**
     * function which it is used to search the user given named in a linked list
     */
    $bool = search($sname, $objs);
    /**
     * if bool ==true it indicates the presenece of a user given name in a linked list
     */
    if ($bool == true) {
        /**
         * function used to delete the user given stock name
         */
        delete($sname, $objs);
    } else {
        /**
         * printing it wheteher it is not available in linkedlist
         */
        echo "the entered stock name is not present in linked list";
    }
}

/**
 * function which it is used to delete the user given name.
 */
function delete($key, $objs)
{
    $temp = $objs->head;
    while ($temp != null && $temp->data->name == $key) {
        $head = $temp->next;
    }
    while ($temp != null && $temp->data->name != $key) {
        $previous = $temp;
        $temp = $temp->next;
    }
    $previous->next = $temp->next;
}
/**
 * function developed to search a given stock name is present or not
 */
function search($key1, $objs)
{
    $n = $objs->head;
    while ($n != null) {
        if (($n->data->name) == $key1) {
            return true;
        }
        $n = $n->next;
    }
    return false;
}
/**
 * function used to exit from the program
 */
function ToExit()
{
    exit();
}


