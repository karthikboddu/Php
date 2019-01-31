<?php 
class Stock{
    public $stockName;
    private $numberOfShare;
    private $stockPrice;

    public function setStockName($stName){
        $this->stockName = $stName;
    }
    public function getStockName(){
        return $this->stockName;
    }

    function setNoShare($numOfShare){
        $this->numberOfShare = $numOfShare;
    }
    function getShare(){
        return $this->numberOfShare;
    }

    function setPrice($stckPrice){
        $this->stockPrice = $stckPrice;
    }
    function getPrice(){
        return $this->stockPrice;
    }
 
    function readJson($jData){

    }
    function writeJson($file){
        
        $stck = new Stock();
        $sfd= $stck->getStockName();
        echo "sfd".$sfd;
        $obj[] = array('stock name'=>$stck->getStockName(),'no of shares'=>$stck->getShare(),'share price'=>$stck->getPrice());
        $data = json_encode($obj);
        file_put_contents($file,$data);
    }
}


?>