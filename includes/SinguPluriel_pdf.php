<?php
/*Script pour metre au pluriel ou singulier le mot "Entraîneur" selon le sport*/
function SinguPluriel($sport){
	if ($sport == 'Rugby') {
		$sport = 'Entraineur(s)';
		return $sport;
	}
	else{
		$sport = 'Entraineur';
		return $sport;
	}
}
?>