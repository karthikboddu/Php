<?php
/**
 * purpose   : Create a Command Executor Program that will execute certain system commands based on the user type is admin or otherwise. 
 * @author   : karthik
 * @version  : 1.0
 * @since    : 08-02-2019
 * ****************************************************/
require_once ('TerminalExec.php');
require ('../utility.php');
set_error_handler(function($e){
    echo "EROOR !!--";
    echo $e->getMessage();
}
);
class pattern{ 

   public function main(){
        // echo "enter username\n";
        // $uName = Dp::readString();
        // echo "enter password\n";
        // $pass = Dp::readString();
        try{
            $tExec = new TerminalExec("karthik","karthik123");
            $tExec->run("ls -ltr");
            $tExec->run("rm abc.txt");
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}

$fds = new pattern();
$fds->main();


?>