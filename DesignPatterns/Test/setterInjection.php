<?php
class Product {
  private $stockItem;
  private $sku;
  
  public function __construct($sku){
    $this->sku        = $sku;
  }
  
  public function getStockItem(){
    return $this->stockItem;
  }
  
  public function getSku(){
    return $this->sku;
  }
  
  public function setStockItem(StockItem $stockItem){
    $this->stockItem = $stockItem;
    return $stockItem;
  }
}

$setter = new Product("status");
$dsf = $setter->setStockItem(new StockItem("qaul","sdrtf"));

class StockItem {
  
    private $quantity;
    private $status;
    
    public function __construct($quantity, $status){
     $this->quantity = $quantity;
     $this->status   = $status;
    }
    
    public function getQuantity(){
     return $this->quantity;
    }
    
    public function getStatus(){
     return $this->status;
    }
    
  }


?>