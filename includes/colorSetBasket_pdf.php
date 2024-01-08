<?php
/*=========================================================================================================================
=            Script pour attribuer la couleur aux maillot dans le pdf - doit correspondre à "colorSetFoot.css"            =
=========================================================================================================================*/

/*----------  Fonction qui attribut la couleur au maillot  ----------*/

function CouleurFond($Equipe,$colorFill){
	
	/************ National ***************/
	
	if ($Equipe == 'Boulazac') {$colorFill = array(20,15,16,0);return $colorFill;}
	elseif ($Equipe == 'BoulogneLevallois') {$colorFill = array(0,0,0,30);return $colorFill;}
	elseif ($Equipe == 'BourgEnBresse') {$colorFill = array(0,0,0,30);return $colorFill;}
	elseif ($Equipe == 'Chalonsaone') {$colorFill = array(0,100,100,0);return $colorFill;}
	elseif ($Equipe == 'ChalonsReims') {$colorFill = array(0,0,0,30);return $colorFill;}
	elseif ($Equipe == 'Cholet') {$colorFill = array(0,100,100,0);return $colorFill;}
	elseif ($Equipe == 'Dijon') {$colorFill = array(0,0,0,100);return $colorFill;}
	elseif ($Equipe == 'GravelinesDunkerque') {$colorFill = array(8,48,94,0);return $colorFill;}
	elseif ($Equipe == 'LeMans') {$colorFill = array(0,79,100,0);return $colorFill;}
	elseif ($Equipe == 'Limoges') {$colorFill = array(90,30,90,0);return $colorFill;}
	elseif ($Equipe == 'LePortel') {$colorFill = array(0,0,0,30);return $colorFill;}
	elseif ($Equipe == 'LyonVilleurbanne') {$colorFill = array(20,15,16,0);return $colorFill;}
	elseif ($Equipe == 'Orleans') {$colorFill = array(8,48,94,2);return $colorFill;}
	elseif ($Equipe == 'Monaco') {$colorFill = array(0,100,100,0);return $colorFill;}
	elseif ($Equipe == 'Nanterre') {$colorFill = array(0,0,0,30);return $colorFill;}
	elseif ($Equipe == 'Strasbourg') {$colorFill = array(19,98,100,10);return $colorFill;}
	
	}

/*----------  Fonction qui attribut la couleur du numéro  ----------*/

function CouleurNum($Equipe,$colorNum){
	if ($Equipe == 'Orleans' || $Equipe == 'LyonVilleurbanne' || $Equipe == 'LePortel' || $Equipe == 'ChalonsReims' || $Equipe == 'Boulazac'|| $Equipe == 'BoulogneLevallois' || $Equipe == 'GravelinesDunkerque' || $Equipe == 'GravelinesDunkerque' || $Equipe == 'Strasbourg') {
		$colorNum = array(0,0,0,100);return $colorNum;}
	
	elseif ($Equipe == 'Monaco' || $Equipe == 'Chalonsaone' || $Equipe == 'LeMans' || $Equipe == 'Limoges' || $Equipe == 'Dijon' ) {
		$colorNum = array(0,0,0,0);return $colorNum;}
	elseif ($Equipe == 'BourgEnBresse') {
		$colorNum = array(0,100,100,0);return $colorNum;}
	elseif ($Equipe == 'Nanterre') {
		$colorNum = array(100,0,100,50);return $colorNum;}

}

/*=====  End of Script pour attribuer la couleur aux maillot dans le pdf - doit correspondre à "colorSetFoot.css"  ======*/
?>