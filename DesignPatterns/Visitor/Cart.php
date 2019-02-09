<?php
require_once ('Items.php');
require_once ('Electronics.php');
require_once ('Grocery.php');
require_once 'CartImp.php';


function clientCode(array $components, CartVisitor $visitor)
{
    // ...
    foreach ($components as $component) {
        $component->accept($visitor);
    }
    // ...
}

$components = [
    new Book("breaking bad",2000,2),
    new Fruit(2000,"sony"),
];


$visitor1 = new CartImp;
clientCode($components, $visitor1);
echo "\n";



// class Cart implements Items{
//     public function start(){
//         $items[] = array(new Electronics(100,"sony"),new Grocery("abc",230,2));
//         print_r($items);
//         $total = calculateTotal($items);   
//     }
    

    
// }
// function calculateTotal($arrItems){
//     $cartImp = new CartImp;
//     $visitor = new Visitor; 
//     // for($i=0;$i<sizeof($arrItems);$i++){
//     //     $arrItems[$i]->accept($cartImp);
//     // }
       

//     // foreach($arrItems as $val){
//     //      $val->accept($cartImp);
//     // }
// }
// $cart = new Cart;
// $cart->start();
?>