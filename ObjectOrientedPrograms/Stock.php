<?php 
class Stock{
    private $stockName;
    private $numberOfShare;
    private $stockPrice;

    function setStockName($stName){
        $this->stockName = $stName;
    }
    function getStockName(){
        return $this->stockName;
    }
}


?>