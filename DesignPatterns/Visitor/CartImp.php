<?php
require_once 'Cart.php';
require_once 'Fruit.php';
require_once 'Book.php';
require_once 'Visitor.php';
class CartImp implements CartVisitor
{
    public function visitBook(Book $element)
    {
        echo "BOOK\n";
        $cost = $element->getPrice()*$element->getQuantity();
        echo "Book : ".$element->getName()."\tPrice : ".$element->getPrice()."\tQuantity: ".$element->getQuantity()."\n";
        echo "Book Cost :".$element->getPrice()*$element->getQuantity()."\n";
        return $cost;
    }

    public function visitFruit(Fruit $element)
    {   
        echo "\nFRUIT \n";
        $cost = $element->getPrice();
        echo "price : ".$element->getPrice()."\tmodelNo : ".$element->getModel()."\n";
        echo "Fruit Cost : ".$element->getPrice()."\n";
        return $cost;
    }
}



?>