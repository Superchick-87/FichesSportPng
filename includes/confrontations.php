<?php
	@$b='';
	function confrontations($a,$b){
	if ($a == 1) {
		$b = 'La seule confrontation';
		return $b;
	}
	if ($a > 1){
		$b = 'Les '.$a.' dernières confrontations';
		return $b;
	}
}
?>