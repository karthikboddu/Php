<?php

class QNode
{
    public $data;
    public $next;
    
    /**create node with data  */
    public function __construct($d){  
        $this->data = $d;
        $this->next = null;
    }
}
class LinkedList{
    private static $size=0;
    public $head;

    /**
     * Inserting new node at the end 
     */
    public function add($data){ 

        /** if head is null then assign it as head */
        if($this->head == null){ 
           $this->head = new QNode($data);
        }else{

            /** else assign new node as head */
            $n = $this->head; 

            /**traverse until node is not null */
            while($n->next!=null){ 
                $n = $n->next;
            }

            /**assign last node next is new node */
            $n->next = new QNode($data); 
            
        }

         /** increment size  */
        self::$size++;
    }

    /**return true if linkedlist is empty */
    public function isEmpty(){
       return $this->head == null; 
    }

    /**remove the element from the linkedlist */
    public function remove($key){

    /**assign current and prev as head */
    $current = $previous = $this->head; 
 
    /**traverse until data is not equal to key */
    while($current->data != $key) { 
        $previous = $current;
        $current = $current->next;
    }
       if($current == null){
            return ;
        }

    /** For the first QNode*/ 

    /**if itis head then move head to next node  */
    if ($current == $previous) { 
        $this->head = $current->next;
    }

    /** unlink the node present between current and prev */
    $previous->next = $current->next;  

    /**decrement size */
    self::$size--; 

    }

 /*
 *search the node and return boolean 
 * */
    public function search($data){
        $current = $this->head;
        
        /**traverse the node until not null and data is equal */
        while($current!=null){ 
            if(($current->data)==$data ){
                return true;
            }
            $current = $current->next;
        }
        return false;
    }

    /*
    * return data present at particular index *
    */
    public function index($data){ 
        $current = $this->head;
        $i =0;
        while(($current->data)==$data){
            $i++;
            $current = $current->next;
        }
        return $i;
    }


/*
*poping elements at the end 
*/
    public function pop(){ 

        /**assign new node as head  */
        $current = $this->head;
        
        /** traverse until node is not null */ 
        while($current!=null){ 
            $current->next = null;
        }

        /**if head is null then underflow */
        if(head == null){ 
            echo "underflow\n";
        }
    }   


    /**return size */
    public function size(){ 
        return self::$size;
    }

    /**display the nodes  */
    public function display(){ 
        $current = $this->head;

        /**traverse until node is not null */
        while($current!=null){ 
            echo $current->data ." ";
            $current = $current->next;
        }
    }

    /*
    *get data present in linked list s
    * */
    public function getData(){ 
        $str = "";
        $current = $this->head;
        while($current!=null){
            $str = $str.$current->data." ";
            $current = $current->next;
        }
        return $str;
    }

    /*
    *linked list to array 
    */
    public function llToArr(){ 
        $arr = array();
        $temp = $this->head;
        while($temp!=null){
            for($i=0;$i<self::$size;$i++){
                $arr[$i] = $temp->data;
                $temp = $temp->next;
            }    
            

        }
        return $arr;
    }

    /**fuction to insert at any positon  */
    public function insertAt($position,$data){

        /** reate a new node*/
        $newNode = new QNode($data); 
        $newNode->next = null;
       
        /** if head is null and position is zero skip it.*/
        if($this->head == null &&  $position != 0) { 
          return;

          /**if head null and position is zero set at the head. */
        } else if( $this.head == null && $position == 0) { 
          $this->head = $newNode;
        }
       
        /** if position is zero then new node set at the head.c */
        if($position == 0) { 
          $newNode->next = $this->head;
          $this->head = $newNode;
        }
       
        $current = $this->head;
        $previous = null;
        $i = 0;
       
        /**loop until find the given position. */
        while($i < $position) { 
          $previous = $current;
          $current = $current->$nextNode;
          if($current == null)
            break;
            $i++;
          }
       
          /**get the new node and linked the remaining nodes in the list. */
          $newNode->next = $current; 
          $previous->next = $newNode; 
    }
 

}
// $obj = new LinkedList();
// $obj->add("ava");
// $obj->add("is");
// $obj->add("an");
// $obj->add("oops");
// $obj->display();


// $obj->remove("is");
// $obj->display();
// echo "\n";
// echo "size ".$obj->size();
// $obj->pop();
// echo "\n";
// $obj->display();

?>