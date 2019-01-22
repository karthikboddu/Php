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
    private static $size =0;
    public function push($item){
        $new_node = new Node($item);
        if($this->top == null){
            $this->top = $new_node;
        }else{
            $new_node->next = $this->top;
            $this->top = $new_node;
        }
        self::$size++;
    }


    public function pop(){
        if($this->top == null){
            echo "stack underflow \n";
        }
        $val = $this->top->data;
        $this->top = $this->top->next;
        self::$size--;
        return $val;
    }

    public function display(){
        $current = $this->top;
        if($current == null){
            echo "stack is empty\n";
        }
        while($current!=null){
            echo $current->data ." ";
            $current = $current->next;
        }
    }

    public function size(){
        return self::$size;
    }
    public function isEmpty(){
        return $this->top == null;
    }

    public function peek(){
        if(!$this->isEmpty()){
            return $this->top->data;
        }
        else{
            echo "stack is empty\n";
        }
    }
}
$obj = new Stack;
$obj->push(10);
$obj->push(20);
$obj->push(40);
$obj->display();
echo "\n";
$obj->push(50);
echo "\n";
$obj->display();
$data= $obj->pop();
echo "das ".$data;
$obj->display();
echo "\npeek ".$obj->peek();
echo "\nsize ".$obj->size();




?>