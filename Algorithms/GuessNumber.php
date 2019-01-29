<?php
require 'utility.php';
echo "enter the number \n";
$n = Utility::readInt();
$N = pow(2, $n);
echo "think a number between 0 and " . ($N - 1) . "\n";
for ($i = 0; $i < $N; $i++) {
    $arr[] = $i;
}

/**function to find guess number */
Utility::findNumber($arr, 0, sizeof($arr) - 1);
?>