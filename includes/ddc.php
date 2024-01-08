<?php
/*Script pour renommer les nom de fichier en Dos De Chameau */

	function ddc($tring){
		//$tring =" afrique-du-sud c'est àô&éè§çïÏîÎ pas écoute AFRIQUE DU SUD";
		$tring = htmlentities($tring, ENT_NOQUOTES, $encoding='utf-8');
		$tring = preg_replace('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $tring);
		$tring = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $tring);
		$tring = preg_replace('#&[^;]+;#', '', $tring);
		$tring = str_replace("-"," ",$tring );
		$tring = mb_strtolower($tring); //oblige la chaine de caractère d'être en bas de casse
		$tring = ucwords($tring);//oglige à mettre une capitale à chaque mot
		$tring = str_replace("'","",$tring );
		$tring = str_replace(" ","",$tring );
		$tring = str_replace("/","",$tring );
		$tring = str_replace("Racing92","Racing",$tring );
		$tring = str_replace("CoteDivoire","CoteDIvoire",$tring );
		return $tring;
	};
	
	/**
	 * Sert à changer la mention 'Point(s)' en 'But(s)'
	 *
	 * @param [string] $x -> championnat
	 * @return void
	 */
	function disciplineButsPts($x){
		if ($x == 'Ligue 1' || $x == 'Ligue 2' || $x == 'Foot - Equipe de France' ) {
			return 'But(s)';
		}
		else {
			return 'Point(s)';
		}
	};

	/**
	 * Sert à changer la mention 'Point(s)' en 'But(s)' dans le pdf
	 *
	 * @param [string] $x -> discipline
	 * @return void
	 */
	function disciplineButsPtsPdf($x){
		if ($x == 'Foot') {
			return 'But(s)';
		}
		else {
			return 'Point(s)';
		}
	};
?>