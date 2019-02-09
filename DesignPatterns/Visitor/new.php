<?php

/**
 * The Component interface declares an `accept` method that should take the base
 * visitor interface as an argument.
 */
interface Items
{
    public function accept(CartVisitor $visitor): void;
}

/**
 * Each Concrete Component must implement the `accept` method in such a way that
 * it calls the visitor's method corresponding to the component's class.
 */
class Book implements Items
{
    /**
     * Note that we're calling `visitConcreteComponentA`, which matches the
     * current class name. This way we let the visitor know the class of the
     * component it works with.
     */
    private $name;
    private $price;
    private $quantity;

    public function __construct($gName,$gPrice,$gQuant){
        $this->name = $gName;
        $this->price = $gPrice;
        $this->quantity = $gQuant;
    }

    public function getName(){
        return $this->name;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getQuantity(){
        return $this->quantity;
    }


    public function accept(CartVisitor $visitor): void
    {
        $visitor->visitBook($this);
    }

    /**
     * Concrete Components may have special methods that don't exist in their
     * base class or interface. The Visitor is still able to use these methods
     * since it's aware of the component's concrete class.
     */
}

class Fruit implements Items
{

    private $price;
    private $model;

    public function __construct($cost,$m){
        $this->price = $cost;
        $this->model = $m;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getModel(){
        return $this->model;
    }
    /**
     * Same here: visitConcreteComponentB => ConcreteComponentB
     */
    public function accept(CartVisitor $visitor): void
    {
        $visitor->visitFruit($this);
    }


}

/**
 * The Visitor Interface declares a set of visiting methods that correspond to
 * component classes. The signature of a visiting method allows the visitor to
 * identify the exact class of the component that it's dealing with.
 */
interface CartVisitor
{
    public function visitBook(Book $element): void;

    public function visitFruit(Fruit $element): void;
}

/**
 * Concrete Visitors implement several versions of the same algorithm, which can
 * work with all concrete component classes.
 *
 * You can experience the biggest benefit of the Visitor pattern when using it
 * with a complex object structure, such as a Composite tree. In this case, it
 * might be helpful to store some intermediate state of the algorithm while
 * executing visitor's methods over various objects of the structure.
 */
class CartImp implements CartVisitor
{
    public function visitBook(Book $element): void
    {
        echo "BOOK\n";
        echo "Book : ".$element->getName()."\nPrice : ".$element->getPrice()."\nQuantity: ".$element->getQuantity()."\n";
    }

    public function visitFruit(Fruit $element): void
    {   
        echo "FRUIT \n";
        echo "price : ".$element->getPrice()."\nmodel : ".$element->getModel()."\n";
    }
}

/**
 * The client code can run visitor operations over any set of elements without
 * figuring out their concrete classes. The accept operation directs a call to
 * the appropriate operation in the visitor object.
 */
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
