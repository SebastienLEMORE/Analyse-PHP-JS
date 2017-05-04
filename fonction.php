<?php


function crible($n){
	if($n==0 || $n==1 || ($n%2==0 && $n!=2)){
		return false;
	}
	else{
		$racn=sqrt($n);
		for($i=3;$i<=$racn;$i=$i+2){
			if($n%$i==0){
				return false;
			}
		}
		return true;
	}		
}

function brute($n){
	if($n==0 || $n==1){
			return false;
		}
		else{
			for($i=2;$i<=$n-1;$i++){
				if($n%$i==0){
					return false;
				}
			}
			return true;
		}
}


function puissance($a,$e,$n){
 $p=0;
  
	for ($p = 1; $e > 0; $e = ($e/2)) {
    		if (($e%2) != 0){
      		$p = ($p * $a) % $n;
		}
   	$a = ($a * $a) % $n;
  	}
  return $p;
}

function miller($a,$n){

	if($n==0 || $n==1 || ($n%2==0 && $n!=2)){
		return false;
	}

	else{
		 $p; $e; $m; $i; $k;
		$debut=microtime(true);
		
  
	$m = $n - 1;
	$e = $m;

	for ($k = 0; $e % 2 == 0; $k++){
	$e = $e / 2;
	}

	$p = puissance ($a, $e, $n);
	if ($p == 1) return true;
  
	for ($i = 0; $i < $k; $i++) {
		if ($p == $m) return true;
		if ($p == 1) return false;
		$p = ($p * $p) % $n;
	}
  
  return false;
	}

}
?>