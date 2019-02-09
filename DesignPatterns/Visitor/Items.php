<?php
require_once ('Visitor.php');
interface Items
{
    public function accept(CartVisitor $visitor);
}
?>