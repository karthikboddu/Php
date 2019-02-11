<?php
require_once ('Book.php');
require_once ('Fruit.php');
interface CartVisitor
{
    public function visitBook(Book $element);

    public function visitFruit(Fruit $element); 
}

?>