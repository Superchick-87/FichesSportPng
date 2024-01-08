<?php
/*******************************************************************/
/*     Donne la hauteur de l'iframe selon l'éditeur      */
/*******************************************************************/

function tailleiframe($x){
	if ($x != 'So') {
		return 'height="150px"';
	}
	else{
		return 'width="100%" height="1680px"';
	}

}
?>
