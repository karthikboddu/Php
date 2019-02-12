<?php 
 
class StockItem {
  
  private $quantity;
  private $status;
  private $price;
  private $model;
  public function __construct($quantity, $status ,$price,$model){
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