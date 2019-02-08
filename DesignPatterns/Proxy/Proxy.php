<?php
require_once ('TerminalExec.php');
require ('../utility.php');
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