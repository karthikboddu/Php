<?php
class Node{
    public $data;
    public $next;
    function __construct($d){
        $this->data = $d;
        $this->next = null;
    }
}
class Queue{
    public $front;
    public $rear;
    private static $size =0;
    public function enqueue($item){
        $new_node = new Node($item);
        if($this->isEmpty()){
            $this->front = $new_node;
        }else{
            $this->rear->next = $new_node;
        }
        $this->rear = $new_node;
        self::$size++;
    }
    public function isEmpty(){
        if($this->front ==null ){
            return true;
        }
        return false;
    }
    public function dequeue(){
        if(!$this->isEmpty()){
            $val = $this->front->data;
            $this->front = $this->front->next;
        }else{
            echo "underflow\n";
        }
        if($this->front == null){
            $rear = null;
        }
        self::$size--;
        return $val;
    }
    public function size(){
        return self::$size;
    }
    public function display(){
        $temp = $this->front;
        while($temp!=null){
            echo $temp->data ." ";
            $temp = $temp->next;
        }
    }

    public function getData(){
        $str = "";
        $current = $this->front;
        while($current!=null){
            $str = $str.$current->data." ";
            $current = $current->next;
        }
        return $str;
    }
}
// $queue = new Queue;
// $queue->enqueue("karthik");
// $queue->enqueue(20);
// $queue->enqueue(30);
// $queue->enqueue(40);

// $queue->display();
// echo "\n";
// echo $queue->dequeue();
// $queue->display();
// echo $queue->size();
// echo "data \n";
// echo $queue->getData();
?>