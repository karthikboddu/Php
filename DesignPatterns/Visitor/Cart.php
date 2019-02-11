<?php
/**
 * purpose   : Shopping cart where we can add different type of items (Elements). When we click on checkout button, it calculates the total amount to be paid. Now we can have the calculation logic in item classes or we can move out this logic to another class using visitor pattern
 * @author   : karthik
 * @version  : 1.0
 * @since    : 09-02-2019
 * ****************************************************/
require_once ('Items.php');
require_once ('Fruit.php');
require_once ('Book.php');
require_once 'CartImp.php';

function start(array $components, CartVisitor $visitor)
{
    $sum = 0;
    // ...
    foreach ($components as $component) {
        
        $sum = $sum + $component->accept($visitor);
    }
    return $sum;
   
    // ...
}
$components = [
    new Book("breaking bad",2000,2),
    new Fruit(2000,"Dragon"),
];
$visitor1 = new CartImp;
$total = start($components, $visitor1);
echo "\nEstimated Price in cart : $total";
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