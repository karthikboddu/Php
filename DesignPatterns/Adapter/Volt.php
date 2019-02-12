<?php
class Volt{
    private $volts;

    function __construct($v){
        $this->volts = $v;
    }

    function getVolt(){
        return $this->volts;
    }

    function setVolt($v){
        $this->volts = $v;
    }
}

?>