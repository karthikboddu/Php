<?php
require_once 'Observer.php';
class MyTopicSubs implements Observer {
    private $name;
    private $topic;
    public function __construct($name){
        $this->$name = $name;
    }

    public function update(){
        $msg = $topic->getUpdate();
    }

    public function setSubject(Subject $subj){

    }

    public function getName(){
        return $this->name;
    }
} 


?>
