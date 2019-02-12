<?php
require_once ('Volt.php');
class Socket{
    function __construct(){

    }

    /**
     * function to get default voltage
     */
    public function getVolt(){
        return new Volt(240);
    }
}
?>