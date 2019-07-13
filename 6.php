<?php

function mrBruno($operator,$total,array $digit){
		$i= 0;
		$nums = ""; //Declare a variable with empty set.
		while ($i<$total){
		$i++;
		$nums = $nums.$i;
		}
		foreach ($digit as $key => $value) {
		$array[]= $nums[$value-1];
		}	
switch ($operator) {
    case "SUM":
    	echo $array[0]+$array[1]+$array[2];
        break;
    case "MUL":
    	echo $array[0]*$array[1]*$array[2];
        break;
    case "SUB":
    	echo $array[0]-$array[1]-$array[2];
        break;
    case "DIV":
    	echo $array[0]/$array[1]/$array[2];
    	break;
    default:
        echo "Your operator is not right!";
}
}

mrBruno('SUM',20,array(11,13,15));
echo "<br>";
mrBruno('MUL',20,array(12,15,17));

?>