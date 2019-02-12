<?php
require_once 'Observer.php';
require_once 'Post.php';
require_once 'MyTopic.php';
require_once 'Subject.php';
class MyTopicSubs implements Observer {

    //string name
    private $name;
    public function __construct($name){
        $this->name = $name;
    }

    /**
     * updates posted
     */
    public function update(Subject $subject){
        echo sprintf("%s has received a notification for post: %s \n\n", 
        $this->name,
        $subject->getUpdate()
    );
    }

    public function setSubject(Subject $subj){

    }

    public function getName(){
        return $this->name;
    }
}

echo "Begin Testing Observer Pattern \n\n";

// Create Subject
$blog = new MyTopic('Blog');

// Create Readers
$karthik = new MyTopicSubs('karthik');
$hari = new MyTopicSubs('Hari');
$nishith   = new MyTopicSubs('nishith');

// Add Observer (Reader) to Subject
$blog->register($karthik);
$blog->register($hari);
$blog->register($nishith);

// Remove an observer
$blog->unregister($nishith);

// Create New post
$blog->postMessage(
    new Post("Learning Observer Pattern in PHP")
);



?>
