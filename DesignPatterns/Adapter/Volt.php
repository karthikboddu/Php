<?php
class Volt{
    private $volts;

    function __construct($v){
        $this->volts = $v;
    }

    function getVolts(){
        return $this->volts;
    }

    function setVolts($v){
        $this->volts = $v;
    }
}

?>