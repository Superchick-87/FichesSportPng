<?php
function texteCoupeA($stringA){
	$charsA = preg_split('/ /', $stringA, -1, PREG_SPLIT_OFFSET_CAPTURE);
	return $charsA[0][0];		
}
function texteCoupeB($stringB){
	$charsB = preg_split('/ /', $stringB, -1, PREG_SPLIT_OFFSET_CAPTURE);
	return $charsB[2][0];		
}

	
?>