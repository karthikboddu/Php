<?php
class Singleton
{
    // Hold the class instance.
    private static $noOfInstance = 0;
    private $name;

 /**
  * The constructor is private to prevent initiation with outer code.
  */
    private function __construct()
    {
        $this->name = "xyz";
        self::$noOfInstance++;
        echo "num of teachers " . self::$noOfInstance."\n";
    }
    private function __clone()
    {
        //do nothing (this overwrites the special PHP method __clone())
    }

/**
 * The object is created from within the class itself only if the class has no instance.
 */
    public static function getInstance()
    {
        if (self::$noOfInstance == null) {
            self::$noOfInstance = new Singleton();
        }

        return self::$noOfInstance;
    }

    public function takeAttendance($studentName)
    {
        //mark the student as present
        echo $studentName . " is present\n";
    }
}

class Student
{
    private $name;
    private $teacher; 

    /**
     * constructor to create object if instance is zero
     */
    public function __construct()
    {
        //create a student
        $this->teacher = Singleton::getInstance();
    }

    /**
     * function to give attendence
     */
    public function giveAtt($name)
    {
        $this->name = $name;
        $this->teacher->takeAttendance($this->name);
    }
}
$teacher = new Student();
$teacher->giveAtt('A');
$teacher->giveAtt('B');
$teacher->giveAtt('C');
$teacher->giveAtt('D');

// // All the variables point to the same object.
// $object1 = Singleton::getInstance();
// $object2 = Singleton::getInstance();
// print_r($object1);
// print_r($object2);
// if ($object1 === $object2) {
//     echo "Singleton works, both variables contain the same instance.";
// } else {
//     echo "Singleton failed, variables contain different instances.";
// }
// $object3 = Singleton::getInstance();
?>