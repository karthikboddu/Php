<?php
require_once ('Observer.php');
require_once 'Subject.php';
Class MyTopic implements Subject {
    private $message;
    private $changed;
    private $user;
    public function __construct(){
        $this->user = array();
    }

    public function register(Observer $observ){
        if($observ==null){
            throw new Exception("null observers!\n");
        }
        if(!array_key_exists($observ)){
            array_push($this->user,$observ);
        }
        
    }

    public function unregister(Observer $observ){
      
    }

    public function notifyObservers(){
        $deRegister = array();
        if(!$changed){
            return;
        }
        foreach ($obj as $deRegister){

        }
    }

    public function getUpdate(Observer $observ){
        return $this->message;
    }

    public function postMessage($msg){
        echo "Message posted \n";
        $this->message = $msg;
        $this->changed = true;
        notifyObservers();
    }

}


?>