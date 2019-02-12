<?php
require_once ('Observer.php');
require_once 'Subject.php';
Class MyTopic implements Subject {
    private $message;
    private $observers = array();
    private $post;

    public function __construct($name){
        $this->name = $name;
    }

    /**
     * register observer
     */
    public function register(Observer $observ){
        if($observ==null){
            throw new Exception("null observers!\n");
        }
        $this->observers[] = $observ;
        
    }

    /**
     * unregister observer
     */
    public function unregister(Observer $observ){
            // Try to find out the given observer in the registered list
            $key = array_search($observ, $this->observers, true);

            if ($key !== false) {
                unset($this->observers[$key]);
            }
    }

    /**
     * Notify All Registered Observers
     */
    public function notifyObservers(){
        foreach ($this->observers as $value) {
            $value->update($this);
        }
    }
    
    /**
     * Return the Post Data
     */
    public function getUpdate(){
        return $this->post." ({$this->name})";
    }

    /**
     * new post published
     */
    public function postMessage(Post $post){
         $this->post = $post;
         $this->notifyObservers();
    }

}


?>