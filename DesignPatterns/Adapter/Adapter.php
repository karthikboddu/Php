<?php
require ('SocketAdapter.php');
require ('Socket.php');
require_once ('Volt.php');
require_once ('SocketClassImp.php');
class Adapter{
    function main(){
        $voltClass = new SocketClassImp();

        $voltClass->get12Volts();
        // $v3 = getVolt(3);
        // $v12 = getVolt(12);
        // $v120 = getVolt(120);
    }
}

$adapter = new Adapter;
$adapter->main();


?>