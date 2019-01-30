<?php
include ('utility.php');
$str = ' Hello <<name>>, We have your full
name as <<full name>> in our system. your contact number is 91-­xxxxxxxxxx.
Please,let us know in case of any clarification Thank you BridgeLabz 01/01/2016.';

$regex = array("/<{2}\w+>{2}/ ","/<{2}\w+\s\w+>{2}/ ","/x{10}/ "," /\d+.\d.\d+/");
$pattern = '${2}';
   
echo "enter the name \n";
$name = Oops::readString();
$str = preg_replace($regex[0], $name, $str);
echo "enter full name \n";
$fName = Oops::readString();
$str = preg_replace($regex[1],$fName,$str);
echo "enter phone number \n";
$phNo = Oops::readInt();
$str = preg_replace($regex[2],$phNo,$str);   
echo "enter the date \n";
$date = date();
$str = preg_replace($regex[3],$date,$str);

echo $str; 




// $pattern = array('<{2}\\w+<{2}','<{2}\\w+\\s<{2}','x{10}');

// echo "enter name \n";
// $name = Oops::readString();

// $new = preg_replace("<{2}\\w.>{2}","vg",$str);

// print $new;

// [
//     {
        
//             "name": "Biryani rice",
//             "weight": "5",
//             "price": "80"
        
//     },
//     {
        
//             "name": "pulseType",
//             "weight": "5",
//             "price": "30"
        
//     },
//     {
	
// 		"name":"wheats type ",
// 		"weight":"6",
// 		"price":"50"
//     }	
// ]

?>