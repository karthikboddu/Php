<?php
require_once ('Terminal.php');
require_once ('TerminalImp.php');
require_once ('TerminalExec.php');
class TerminalExec implements Terminal{
    public $isAdim=FALSE;
    public function __construct($user,$pwd){
        global $isAdim;
        try{
            if("karthik"==$user&&"karthik123"==$pwd){
                $isAdim = TRUE;
                
            }else{
                throw new Exception("invalid credentials\n");
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
        
    }
    public function run($cmd){
        global $isAdim;
        $terminalRun = new TerminalImp;
        if($isAdim){
            $terminalRun->run($cmd);
        }
    }

 
}

?>