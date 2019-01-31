<?php
class Items{
    var $name;
    var $weight;
    var $price;
    
    function setName($Iname){
        $this->name = $Iname;
    }
    function getName(){
        return $name;
    }

    function setWeight($IWeight){
        $this->weight = $IWeight;
    }

    function getWeight(){
        return $weight;
    }

    function setPrice($IPrice){
        $this->price = $IPrice;
    }

    function getPrice(){
        return $price;
    }

}

?>
