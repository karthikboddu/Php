<?php
require_once ('Grocery.php');
require_once ('Electronics.php');
interface CartVisitor
{
    public function visitBook(Book $element);

    public function visitFruit(Fruit $element); 
}

?>