<?php
/**
 * purpose   : Use Prototype Pattern to create multiple Employee Object

 * @author   : karthik
 * @version  : 1.0
 * @since    : 08-02-2019
 * ****************************************************/
require ('../utility.php');
require_once ('Prototype.php');

class Employee implements Prototype{
    private $name;
    private $desination;
    private $address;
    
    /**
     * getter and setter for each variables
     */
    public function setName($eName){
        $this->name = $eName;
    }

    public function getName(){
        return $this->$name;
    }

    public function setDesg($eDesg){
        $this->desination = $eDesg;
    }

    public function getDesg(){
        return $this->desination;
    }

    public function setAddress($eAdd){
        $this->address = $eAdd;
    }

    public function getAddress(){
        return $this->address;
    }

    /**
     * return a new emp object with current variables 
    */
    public function  getClone(){
        return new EmpDemo($this->name,$this->desination,$this->address);
    }
}

class EmpDemo extends Employee {

    public function __construct($eName,$eDesg,$add){
        $this->name =$eName;
        $this->desination = $eDesg;
        $this->address = $add;
        echo "Employee details\n\n";
        $this->printRecords();
    }
    /**
     * function to print records
     */
    public function printRecords(){
        echo "Name : ". $this->name."\nDesignation : ".$this->desination."\nAddress : ".$this->address."\n";
    }

    /**
     * return a new emp object with current variables 
    */
    public function  getClone(){
        return new EmpDemo($this->name,$this->desination,$this->address);
    } 
}

    function Empdata(){
        $e = new Employee;
        echo "enter name\n";
        $name = Dp::readString();
        $e->setName($name);
        echo "enter desgination \n";
        $desgna = Dp::readString();
        $e->setDesg($desgna);
        echo "enter address\n";;
        $address = Dp::readString(); 
        $e->setAddress($address);
        echo "Details to emp1 object\n";
        $emp1 = new EmpDemo($name,$desgna,$address);
        echo "\nAfter cloning : ";
        $emp2 = $emp1->getClone();
        $emp2 = clone $emp1;

        $emp1->name = "karthik boddu";
        echo "\nAfter updating \n";
        $emp1->printRecords();

        echo "\nDetails of cloned object \n";
        $emp2->printRecords();

    }
Empdata();


?>