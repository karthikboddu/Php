<?php
class Items{
    var $name;
    var $weight;
    var $price;
    var $cate;

    function setName($Iname){
        $this->name = $Iname;
    }
    function getName(){
        return $this->name;
    }

    function setWeight($IWeight){
        $this->weight = $IWeight;
    }

    function getWeight(){
        return $this->weight;
    }

    function setPrice($IPrice){
        $this->price = $IPrice;
    }

    function getPrice(){
        return $this->price;
    }

}

?>
