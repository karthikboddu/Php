<?php

class stockItems
{
//    public function __construct($fileName){
    //         $this->$fileName = $fileName;
    //     }
    // private $stName;
    // private $numOfShare;
    // private $stckPrice;
    // private $date;

    public function setStockName($stName)
    {
        $this->stockName = $stName;
    }
    public function getStockName()
    {
        return $this->stockName;
    }

    public function setNoShare($numOfShare)
    {
        $this->numberOfShare = $numOfShare;
    }
    public function getShare()
    {
        return $this->numberOfShare;
    }

    public function setPrice($stckPrice)
    {
        $this->stockPrice = $stckPrice;
    }

    public function getPrice()
    {
        return $this->stockPrice;
    }
    public function __construct($stckSymbol, $stNoShare, $price)
    {
        $this->stockName = $stckSymbol;
        $this->stockShare = $stNoShare;
        $this->pric = $price;
    }
}
?>