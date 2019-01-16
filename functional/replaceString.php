<?php
    include('../Utility/utility.php');
    $str = Utility::readString();

    $inputStr = "Hello <<UserName>>, How are you?";
    $str1 = substr($inputStr,6,12);
    $str2 = str_replace($str1,$str,$inputStr);
    echo $str2;
    
    // $str1 = str_replace("<<","",$inputStr);
    // $str2 = str_replace(">>","",$str1);
    // $str3 = str_replace("UserName","karthik",$str2);
   
  
?>