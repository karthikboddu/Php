<?php

class Node
{
    public $data;
    public $next;
    
    public function __construct($d){
        $this->data = $d;
        $this->next = null;
    }
}
class LinkedList{
    private static $size=0;
    public $head;
    public function add($data){
        if($this->head == null){
           $this->head = new Node($data);
        }else{
            $n = $this->head; 
            while($n->next!=null){
                $n = $n->next;
            }
            $n->next = new Node($data);
            
        }
        self::$size++;
    }

    public function isEmpty(){
       return $this->head == null;
    }

    public function remove($key){
    //     $current = $this->head;
    //     $temp = null;
    //     if($current!=null&&($current->data)==$data){
    //         $head = $current->next;
    //         return;
    //     }
    //     while($current!=null&&($current->data)!=$data){
    //         $temp = $current;
    //         $current = $current->next;
    //     }
    //     if($current == null){
    //         return ;
    //     }
    //     $temp-> next = $current->next;
    //    self::$size--;

    $current = $previous = $this->head;

    while($current->data != $key) {
        $previous = $current;
        $current = $current->next;
    }

    // For the first node
    if ($current == $previous) {
        $this->head = $current->next;
    }

    $previous->next = $current->next;

    self::$size--;

    }

    public function search($data){
        $current = $this->head;
        while($current!=null){
            if(($current->data)==$data ){
                return true;
            }
            $current = $current->next;
        }
        return false;
    }

    public function index($data){
        $current = $this->head;
        $i =0;
        while(($current->data)==$data){
            $i++;
            $current = $current->next;
        }
        return $i;
    }

    public function pop(){
        $current = $this->head;
        while($current!=null){
            $current->next = null;
        }
        if(head == null){
            echo "underflow\n";
        }
    }   

    public function size(){
        return self::$size;
    }

    public function display(){
        $current = $this->head;
        while($current!=null){
            echo $current->data ." ";
            $current = $current->next;
        }
    }

    public function getData(){
        $str = "";
        $current = $this->head;
        while($current!=null){
            $str = $str.$current->data." ";
            $current = $current->next;
        }
        return $str;
    }
 

}
// $obj = new LinkedList();
// $obj->add("ava");
// $obj->add("is");
// $obj->add("an");
// $obj->add("oops");
// $obj->display();
// echo "\n";
// echo "enter the word to search\n";
// $str = Utility::readString();
// if($obj->search($str)){
//     $obj->remove($str);
// }
// else{
//     $obj->add($str);
// }
// $obj->remove(10);
// $obj->display();
// echo "\n";
// echo "size ".$obj->size();
// if($obj->search(50)){
//     echo "true\n";
// }
// $obj->pop();
// echo "\n";
// $obj->display();
// echo $obj->index(40);
?>