<?php
$str = '[
    {
        
            "name": "Biryani rice",
            "weight": "5",
            "price": "80"
        
    },
    {
        
            "name": "pulseType",
            "weight": "5",
            "price": "30"
        
    },
    {
	
		"name":"wheats type ",
		"weight":"6",
		"price":"50"
    }	
]';

$json = json_decode($str);
print_r($json);

?>
