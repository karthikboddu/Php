<?php
/**
 * Purpose:  List of CompanyShares in a Linked List So new CompanyShares can be added or removed easily.
 * @author Nishithkumar
 * @version 1.0
 * @since 30-01-2019
 ******************************************************************************/
include 'Outility.php';
include 'LinkedList.php';
/**
 * creating a user-defined class.
 */
class Stocks
{
    /**
     * declaring the global variables
     */
    public $name;
    public $share;
    public $price;
}
/**
 * function which is used to initialize the variables of a class
 */
function ToAdd($arr)
{
    echo "enter the  stock name:";
    $uname = Outility::getString();
    echo "enter the share:";
    $ushare = Outility::getInt();
    echo "enter the price:";
    $uprice = Outility::getInt();
    $obj = new Stocks;
    $obj->name = $uname;
    $obj->share = $ushare;
    $obj->price = $uprice;
    /**
     * storing the object of class in to an array
     */
    $arr = $obj;
    /**
     * returning the stored value.
     */
    return $arr;
}
/**
 * function which it is used to remove the dta a from the storedLinkedList
 */
function ToRemove($objs)
{
    echo "enter the stock name:";
    $sname = Outility::getString();
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
/**
 * function used to display the menu of some content for the user to perform some operations.
 */
function menu($object)
{
    echo "enter 1.ToAdd 2.ToRemove 3.Toprint 4.ToExit ";
    $number = Outility::getInt();
    $arr = array();
    $objs = $object;
    switch ($number) {
        case 1:
            $rrr = ToAdd($arr);
            $objs->add($rrr);
            menu($objs);
            break;
        case 2:ToRemove($objs);
            $objs->display();
            menu($objs);
            break;
        case 3:
            $object->display();
            menu($objs);
            break;
        case 4:ToExit();
            break;

    }
}
/**
 * creating an object for the LinkedList developed class.
 */
$object = new LinkedList;
/**
 * initially calling the menu function.
 */
menu($object);