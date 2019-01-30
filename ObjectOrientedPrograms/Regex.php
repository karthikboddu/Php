<?php
include ('utility.php');
$str = " Hello <<name>>, We have your full
name as <<full name>> in our system. your contact number is 91­xxxxxxxxxx.
Please,let us know in case of any clarification Thank you BridgeLabz 01/01/2016.";

$regex = "{10}x";
$new_string = preg_replace($regex, "91-­xxxxxxxxxx", "903");
echo $new_string;



// $pattern = array('<{2}\\w+<{2}','<{2}\\w+\\s<{2}','x{10}');

// echo "enter name \n";
// $name = Oops::readString();

// $new = preg_replace("<{2}\\w.>{2}","vg",$str);

// print $new;

?>