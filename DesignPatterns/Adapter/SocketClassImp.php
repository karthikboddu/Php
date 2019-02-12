<?php
require_once ('SocketAdapter.php');
require_once ('Socket.php');
require_once ('Volt.php');

class SocketClassImp extends Socket implements SocketAdapter{

    /**
     * function to get 120 voltage
     */
    public function get120Volt(){
        return getVolt();
    }

    /**
     * function to get 12 voltage
     */
    public function get12Volt(){
        $vA = Socket::getVolt();
        return SocketClassImp::convert($vA->getVolt(),20);
    }

    /**
     * function to get 3 voltage
     */
    public function get3Volt(){
        $vB = Socket::getVolt();
        return SocketClassImp::convert($vB->getVolt(),80);
    }

    /**
     * function to convert to default to required voltage
     */
    public function convert($volt,$val){
        return ($volt/$val);
    }
} 

?>