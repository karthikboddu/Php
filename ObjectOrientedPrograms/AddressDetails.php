<?php
class Contact
{
    public $fName;
    public $lName;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $phone;

    public function __construct()
    {
        $NoOfArguments = func_num_args(); //return no of arguments passed in function
        $arg = func_get_args();
        switch($NoOfArguments){
            case 1 : $con = new Contact();
                     return $con;   
                     break;   
            case 7 : self::construct1($arg[0],$arg[1],$arg[2],$arg[3],$arg[4],$arg[5],$arg[6]);                                                                                                        
                     break;
        }

    }

    public function construct1($full,$last,$state,$city,$zipCode,$add,$phoneNo){
        $this->fName = $full;
        $this->lName = $last;
        $this->address = $add;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zipCode;
        $this->phone = $phoneNo;
    }

    public function construct2(){
            // case 1 : self::setFName($full);
            //           break;
            // case 2 : self::getFName();
            //             break;
            // case 3 : self::setLName($last);
            //             break;
            // case 4 : self::getLName();
            //             break;
            // case 5 : self::setAddress($add);
            //             break;
            // case 6 : self::getAddress();
            //             break; 
            // case 7 : self::setCity($cName);
            //             break;
            // case 8 : self::getCity();
            //             break;
            // case 9 : self::setState($stateN);
            //             break;
            // case 10 : self::getState();
            //             break;  
            // case 9 : self::setZip($code);
            //             break;
            // case 10 : self::getZip();
            //             break;     
            // case 9 : self::setPhone($no);
            //             break;
            // case 10 : self::getPhone();
            //             break;   
    }

    public function setFName($full)
    {
        $this->fName = $full;
    }
    public function getFName()
    {
        return $this->fName;
    }
    public function setLName($last)
    {
        $this->lName = $last;
    }
    public function getLName()
    {
        return $this->lName;
    }
    public function setAddress($add)
    {
        $this->address = $add;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function setCity($cName)
    {
        $this->city = $cName;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function setState($stateN)
    {
        $this->state = $stateN;
    }
    public function getState()
    {
        return $this->state;
    }
    public function setZip($code)
    {
        $this->zip = $code;
    }
    public function getZip()
    {
        return $this->zip;
    }
    public function setPhone($no)
    {
        $this->phone = $no;
    }
    public function getPhone()
    {
        return $this->phone;
    }
}
