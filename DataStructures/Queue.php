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
    public static $size =0;
    public function enqueue($item){
        $new_QNode = new Node($item);
        if($this->isEmpty()){
            $this->front = $new_QNode;
        }else{
            $this->rear->next = $new_QNode;
        }
        $this->rear = $new_QNode;
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
            return $val;
        }else{
            
        }
        if($this->front == null){
            $rear = null;
        }
        self::$size--;
        
    }
    public function size(){
        return self::$size;
    }
    public function display(){
        $temp = $this->front;
        if($temp == null){
            echo "underflow\n";
        }
        while($temp!=null){
            echo $temp->data ." ";
            $temp = $temp->next;
        }
    }

    public function peek(){
        return $this->front->data;
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
// $queue = new Queue();
// $queu11e = new Queue();
// $queue->enqueue("karthik");
// $queue->enqueue(20);
// $queue->enqueue(30);
// $queue->enqueue(40);
// $queue->display();

// echo $queue->peek();
// // $queue->display();
// echo "\n";
// echo $queue->dequeue();
// // $queue->display();
// echo $queue->size();
// echo "data \n";
// echo $queue->getData();

// echo "\n";
// // $queue->display();
// echo "\n";

// // $queue->display();
// $queue->dequeue();
// echo "\n";
// $queue->display();
// $queu11e->enqueue(100);
// $queu11e->enqueue(200);
// $queu11e->display();
?>