<?php 
 require ('DI.php');
class Product {
  private $stockItem;
  private $sku;
  
  public function __construct($sku, StockItem $stockItem){
    $this->stockItem  = $stockItem;
    $this->sku        = $sku;
  }
  
  public function getStockItem(){
    return $this->stockItem;
  }
  
  public function getSku(){
    return $this->sku;
  }
}
$ref = new ReflectionClass(StockItem);

print_r($ref);

$prod = new Product("qua",new StockItem("quality","status","price","model"));


?>