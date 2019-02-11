<?php
require_once ('Items.php');
class Fruit implements Items
{

    private $price;
    private $model;

    public function __construct($cost,$m){
        $this->price = $cost;
        $this->model = $m;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getModel(){
        return $this->model;
    }
    /**
     * Same here: visitConcreteComponentB => ConcreteComponentB
     */
    public function accept(CartVisitor $visitor)
    {
       return $visitor->visitFruit($this);
    }


}


?>