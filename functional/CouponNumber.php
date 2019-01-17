/******************************************************************************
 *  Compilation:  javac -d bin PrimeChecker.java
 *  Execution:    java -cp bin com.bridgelabz.util.PrimeChecker n
 *  
 *  Purpose: Program to generate random number and to process number of distinct coupons.
 *
 *  @author  karthik
 *  @version 1.0
 *  @since   17-01-2019
 *
 ******************************************************************************/   
<?php
  include('utility.php');
class CouponNumbers{
  
    // $range = Utility::readInt();
    // $couponNo = array();
    // $totalDistinct = 0;
    // for($i=0;$i<$range;$i++){
    //     $random = rand(1,$range);
    //     $couponNo[$i] = $random;
        
    // }
    // $uni = array_unique($couponNo);
    // $uni1 =  array_values($uni);
    // $total =sizeof($uni1);
    // for($i=0;$i<sizeof($uni1);$i++){
    //     echo "$uni1[$i]  ";
    // }
    // echo "\n"."total distinct number ".$total."\n";
 


    function coupens(){
        // to generate alpha numeric coupens
        $code = "1 2 3 4 5 6 7 8 9 0 a s d f g h j k l z x c v b n m q w e r t y u i o p";
        //converting to char array
        $arr = explode(" " , $code);
        $arrlen = count($arr); 
        $rand = rand(100000 , 10000000);
        $coupen = "cp";
        /**
         * get unique value from character array and saving it in var $coupen
         */
        while($rand>1){
            $coupen = $coupen.$arr[$rand%$arrlen];
            $rand /=$arrlen; 
        }
        //printing the coupen
        echo "Coupen is : ".$coupen."\n";
   }
   function generate(){
       echo "enter no of coupens to generate : ";
       $num = Utility::getInt();
       for ($i=0; $i < $num ; $i++) { 
           self::coupens();
       }
       echo "random used ".$num." times";
   }
}CouponNumbers::generate();
?>