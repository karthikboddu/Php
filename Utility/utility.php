<?php
function readString(){
    $var = readline("enter string : ");
    while(is_numeric($var)){
        echo "not valid enter again"."\n";
        fscanf(STDIN,"%s",$var);

    }
return $var;
}
function readInt(){
    $i = readline("enter int :");
    // if(is_string($i)){
    //     echo "enter valid  ";
    // }else if(is_numeric($i)){
    //     return $i;
    // }
    while(!is_numeric($i)){
        echo "enter valid input"."\n";
        fscanf(STDIN,"%d",$i);
    }
    return $i;
}

function leapYear($yr){
    readString($yr);
    $flag = FALSE;
    if($yr%400==0&&$yr>999&&yr<10000){
        $flag = TRUE;
    }else if($yr%100==0){
        $flag = FALSE;
    }else if($yr%4==0){
        $flag = TRUE;
    }
 
    return $flag;
}

?>