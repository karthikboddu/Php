<?php
/**
* overview   : Read in the following message: Hello <<name>>, We have your full.......
*                   Use Regex to replace name, full name, Mobile#, and Date with proper value.
* purpose    : Replace inout string and Print the Modified Message.
* @author    : karthik
* @version   : 1.0   
* @since     : 31-01-2019
 ***********************************************************************************/

include ('utility.php');

/**
 * input string 
*/
$str = 'Hello <<name>>, We have your full name as <<full name>> in our system. your contact number is 91-xxxxxxxxxx.
Please,let us know in case of any clarification Thank you BridgeLabz xx/xx/xxxx.';

/**
 * regex pattern array that you want replace in the string 
 */
$regex = array("/<{2}\w+>{2}/ ","/<{2}\w+\s\w+>{2}/ ","/\d{2}\-x{10}+/ ","/\d+.\d+.\d+/ ");
$regx = array("/<{2}\w+>{2}/ ", "/<{2}\w+\s\w+>{2}/ ", "/\d{2}\-x{10}+/ ", "/x*\/x*\/x*/ ");
// array("/<{2}\w+>{2}/ ","/<{2}\w+\s\w+>{2}/ ","/\d{2}\-x{10}+/ ","/x*\/x*\/x*/ ");                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            

/**
 * input name to replace 
 */
echo "enter the name \n";
$name = Oops::readString();
$str = preg_replace($regx[0], $name, $str);

/**
 * input full name to replace 
 */
echo "enter full name \n";
$fName = Oops::readString();
$str = preg_replace($regx[1],$fName,$str);

/**
 * input phone number to replace 
 */
echo "enter phone number \n";
$phNo = Oops::readInt();
$str = preg_replace($regx[2],$phNo,$str); 

/** date function to take current date timestap*/
$date = date("d/m/y");
$str = preg_replace($regx[3],$date,$str);
echo "\n";

/**validate phone number  */
    try{
        if(strlen($phNo)<10||strlen($phNo)>10){
            throw new Exception("enter 10 digit number\n");
            
        }elseif(strlen($phNo)==10){
            echo $str."\n";
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }


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