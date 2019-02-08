<?php
require_once ('Volt.php');
class Socket{
    function __construct(){

    }

    public function getVolt(){
        return new Volt(240);
    }
}
?>