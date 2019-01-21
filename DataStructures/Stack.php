<?php
class Node{
    public $next;
    public $data;

    function __construct($d){
        $this->data = $d;
        $this->next = null;
    }
}
class Stack{
    public $top;

    public function push($item){
        
        if($this->top == null){
            $this->top =new Node($item);
        }else{
           
           $new_node = new Node($item);
           $new_node->next = $this->top;
           $top = $new_node;
        }
    }


    public function pop(){
        $temp = $this->top;

    }

    public function display(){
        $temp = $this->top;
        while($temp !=null){
            echo $temp->data." " ;
            $temp = $temp->next;
        }
    }

    public function isEmpty(){
        return $top == null;
    }
}
$obj = new Stack;
$obj->push(10);
$obj->push(20);
$obj->push(40);


$obj->display();

?>