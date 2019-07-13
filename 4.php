<?php

function buyEgg($tgl,$uang){
	if (isPrime($tgl) == true){
		$total = $uang/2000;
		
		if ($total >= 12){
			echo $total+=1;
		} else{
			echo $total;
		}
	
	}
	elseif ($tgl % 2 == 1){		
		$total = $uang/2000;
		if($total >=20){
			echo $total+=3;
		} else{
			echo $total;
		}
	}
	else {
		$total = $uang/2000;
		echo $total;
	}
	
	}

function isPrime($num) {
    //1 is not prime. See: http://en.wikipedia.org/wiki/Prime_number#Primality_of_one
    if($num == 1)
        return false;

    //2 is prime (the only even number that is prime)
    if($num == 2)
        return true;

    /**
     * if the number is divisible by two, then it's not prime and it's no longer
     * needed to check other even numbers
     */
    if($num % 2 == 0) {
        return false;
    }

    /**
     * Checks the odd numbers. If any of them is a factor, then it returns false.
     * The sqrt can be an aproximation, hence just for the sake of
     * security, one rounds it to the next highest integer value.
     */
    $ceil = ceil(sqrt($num));
    for($i = 3; $i <= $ceil; $i = $i + 2) {
        if($num % $i == 0)
            return false;
    }

    return true;
}
buyEgg(12,50000);


