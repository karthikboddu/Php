<?php
require_once ('SocketAdapter.php');
require_once ('Socket.php');
require_once ('Volt.php');
$socket = new Socket;
class SocketClassImp extends Socket implements SocketAdapter{

    
    public function get120Volts(){
        return $socket->getVolt();
    }

    public function get12Volts(){
        
        $vA = $socket->getVolt();
        return convert($vA,20);
    }

    public function get3Volts(){
        $vB = getVolt();
        return convert($vB,80);
    }

    public function convert($volt,$val){
        return new Volt($volt/$val);
    }
} 

?>