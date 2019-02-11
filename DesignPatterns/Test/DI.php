<?php 
 
class StockItem {
  
  private $quantity;
  private $status;
  private $price;
  public function __construct($quantity, $status ,$price){
   $this->quantity = $quantity;
   $this->status   = $status;
   $this->price = $price;
  }
  
  public function getQuantity(){
   return $this->quantity;
  }
  
  public function getStatus(){
   return $this->status;
  }
  
}

?>