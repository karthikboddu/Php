<?php
require_once 'Cart.php';
require_once 'Electronics.php';
require_once 'Grocery.php';
require_once 'Visitor.php';
class CartImp implements CartVisitor
{
    public function visitBook(Book $element)
    {
        echo "BOOK\n";
        echo "Book : ".$element->getName()."\nPrice : ".$element->getPrice()."\nQuantity: ".$element->getQuantity()."\n";
    }

    public function visitFruit(Fruit $element)
    {   
        echo "FRUIT \n";
        echo "price : ".$element->getPrice()."\nmodel : ".$element->getModel()."\n";
    }
}



?>