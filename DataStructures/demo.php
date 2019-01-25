<?php

class demo {
    function df($a){
        $b = $a+100;
        return $b;
    }
    function dis($b){
        echo $b."\n";
    }
}
$a = new Demo();
$b = new Demo();

$aa=$a->df(10);
$a->dis($aa);
echo "\n";
$bb= $b->df(20);
echo "\n";
$b->dis($bb);
?>