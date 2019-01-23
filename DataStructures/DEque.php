<?php 
class Node{
    public $next;
    public $prev;
    public $data;
    function __construct($d){
        $this->data = $d;
        $this->next = null;
    }
}
class Deque{
    public $head;
    public $tail;
    public function addFront($item){
        $new_node = new Node($item);
        if($this->isEmpty()){
            $this->tail = $new_node;
        }else{
            $this->head->prev = $new_node;
        }
        $new_node->next = $this->head;
        $this->head = $new_node;
    }
    public function removeRear(){
        $temp = $this->tail;
        if($this->head ==$this->tail){
            $this->head = null;
        }
        else{
            $this->tail->prev->next = null;
            
        }
        $val = $this->tail->data;
        $this->tail = $this->tail->prev;
        $temp->prev = null;

        return $val;
    }   
    public function addRear($item){
        $new_node = new Node($item);
        if(!$this->isEmpty()){
            $this->tail->next = $new_node;
        }else{
            $this->head = $new_node;
        }
        $new_node->prev = $this->tail;
        $this->tail = $new_node;
    } 
    public function removeFront(){
        $temp = $this->head;
        if($this->head == $this->tail){
            $this->tail = null;
        }
        if($this->isEmpty()){
            echo "underflow\n";
        }
        else{
            $this->head->next->prev = null;
        }
        $this->head = $this->head->next;
        $this->temp->next = null;
    }
    public function isEmpty(){
        if($this->head == null){
            return true;
        }
        return false;
    }

    public function displayForward(){
        $temp = $this->head;
        if($temp == null){
            echo "underflow\n";
        }
        while($temp!=null){
            echo $temp->data." ";
            $temp = $temp->next;
        }
    }
    public function displayReverse(){
        $temp = $this->tail;
        while($temp!=null){
            echo $temp->data." ";
            $temp = $temp->prev;
        }
    }
    
}
// $deque = new Deque;
// $deque->addFront("a");
// $deque->addFront("b");
// $deque->addFront("c");
// $deque->displayForward();
// echo "\n";
// $deque->removeRear();
// $deque->displayForward();
// echo "\n";
// $deque->addRear("f");
// $deque->displayForward();
// echo "\n";
// $deque->addFront("g");
// $deque->displayForward();

?>