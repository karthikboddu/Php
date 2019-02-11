<?php
/**
 * overview  : solve mobile charger which adapts to a Mobile battery needs 3 volts to charge but the normal socket produces either 120V (US) or 240V (India). So the mobile charger works as an adapter between mobile charging socket and the wall socket.
 * purpose   : Use Adapter design pattern to solve mobile charger which adapts to a Mobile battery needs 3 volts to charge but the normal socket produces either 120V (US) or 240V (India)
 * @author   : karthik
 * @version  : 1.0
 * @since    : 08-02-2019
 ***********************************************************************************/
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