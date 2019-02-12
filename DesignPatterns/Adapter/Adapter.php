<?php
/**
 * overview  : solve mobile charger which adapts to a Mobile battery needs 3 volts to charge but the normal socket produces either 120V (US) or 240V (India). So the mobile charger works as an adapter between mobile charging socket and the wall socket.
 * purpose   : Use Adapter design pattern to solve mobile charger which adapts to a Mobile battery needs 3 volts to charge but the normal socket produces either 120V (US) or 240V (India)
 * @author   : karthik
 * @version  : 1.0
 * @since    : 08-02-2019
 ***********************************************************************************/
require ('SocketAdapter.php');
require ('../utility.php');
require ('Socket.php');
require_once ('Volt.php');
require_once ('SocketClassImp.php');
class Adapter{

    /**
     * function read input voltage and check it's charging or not
     */
    function main(){

        //creating socketclass imp 
        $voltClass = new SocketClassImp();
        $voltsA = $voltClass->get12Volt();
        $voltB = $voltClass->get3Volt();
        echo "12 volts ".$voltsA."\n";
        echo "3 volts " .$voltB."\n";

        //check whether mobile is charging or not
        try{
            echo "enter the voltage\n";
            $v = Dp::readInt(); 
            if($v == $voltClass->get3Volt()){
                echo "Mobile charging\n";
            }else{
                throw new Exception ("Mobile not charging");
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}

$adapter = new Adapter;
$adapter->main();


?>