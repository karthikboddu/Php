<?php
class Contact{
    public $fName;
    public $lName;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $phone;

    public function __construct($full,$last,$add,$city,$state,$zipCode,$phoneNo){
        $this->fName = $full;
        $this->lName = $last;
        $this->address = $add;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zipCode;
        $this->phone = $phoneNo;
    }

    public function setFName($full){
        $this->$fName = $full;
    }
    public function getFName(){
        return $this->fName;
    }
    public function setLName($last){
        $this->$lName = $last;
    }
    public function getLName(){
        return $this->lName;
    }
    public function setAddress($add){
        $this->$address = $add;
    }
    public function getAddress(){
        return $this->address;
    }
    public function setCity($cName){
        $this->$city = $cName;
    }
    public function getCity(){
        return $this->city;
    }
    public function setState($stateN){
        $this->$state = $stateN;
    }
    public function getState(){
        return $this->state;
    }
    public function setZip($code){
        $this->$zip = $code;
    }
    public function getZip(){
        return $this->zip;
    }
    public function setPhone($no){
        $this->$phone = $no;
    }
    public function getPhone(){
        return $this->phone;
    }
}

?>