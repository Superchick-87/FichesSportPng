<?php
/*Script pour afficher les logos en .fr avec lien vers sites des éditeurs */
function lienWeb($a){
	if ($a == 'So') {
		$a = 'sudouest';
		return $a;
	}
	if ($a == 'Cl') {
		$a = 'charentelibre';
		return $a;
	}
	if ($a == 'Pp') {
		$a = 'larepubliquedespyrenees';
		return $a;
	}
}
?>