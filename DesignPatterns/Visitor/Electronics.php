<?php
require_once ('Items.php');
require_once ('Visitor.php');
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


    public function accept(CartVisitor $visitor)
    {
        $visitor->visitBook($this);
    }

    /**
     * Concrete Components may have special methods that don't exist in their
     * base class or interface. The Visitor is still able to use these methods
     * since it's aware of the component's concrete class.
     */
}
?>