<?php
require 'utility.php';

abstract class Computer
{
    abstract public function enterDetails();
    public $dname;
    public $dspecs;
    // abstract function ServerDetails();
}

class Pc extends Computer
{
    public function __construct()
    {
        $this->enterDetails();
    }
    public function enterDetails()
    {
        echo "enter pc name\n";
        $name = Dp::readString();
        echo "enter pc specifications \n";
        $spec = Dp::readString();
        printDetails($name, $spec);
    }
}

class Server extends Computer
{
    public function __construct()
    {
        $this->enterDetails();
    }
    public function enterDetails()
    {
        echo "enter server name \n";
        $sName = Dp::readString();
        echo "enter details of server\n";
        $sDetails = Dp::readString();
        printDetails($sName, $sDetails);
    }
}
