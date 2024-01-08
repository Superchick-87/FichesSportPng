<?php
/*=========================================================================================================================
=            Script pour attribuer la couleur aux maillot dans le pdf - doit correspondre à "colorSetFoot.css"            =
=========================================================================================================================*/

/*----------  Fonction qui attribut la couleur au maillot  ----------*/

function CouleurFond($Equipe,$colorFill){
	
	/************ National ***************/
	
	if ($Equipe == 'Amiens') {$colorFill = array(20,15,16,0);return $colorFill;}
	elseif ($Equipe == 'AcAjaccio') {$colorFill = array(0,95,91,0);return $colorFill;}
	elseif ($Equipe == 'AngersSco') {$colorFill = array(0,0,0,100);return $colorFill;}
	elseif ($Equipe == 'Auxerre') {$colorFill = array(100,81,0,0);return $colorFill;}
	elseif ($Equipe == 'Bastia') {$colorFill = array(88,72,0,0);return $colorFill;}
	elseif ($Equipe == 'Bordeaux') {$colorFill = array(100,90,40,38);return $colorFill;}
	elseif ($Equipe == 'BergeracFc') {$colorFill = array(100,80,30,38);return $colorFill;}
	elseif ($Equipe == 'Brest') {$colorFill = array(0,100,97,0);return $colorFill;}
	elseif ($Equipe == 'Chambly') {$colorFill = array(93,75,0,0);return $colorFill;}
	elseif ($Equipe == 'Caen') {$colorFill = array(100,94,32,30);return $colorFill;}
	elseif ($Equipe == 'Chateauroux') {$colorFill = array(100,93,28,18);return $colorFill;}
	elseif ($Equipe == 'Clermont') {$colorFill = array(0,95,91,0);return $colorFill;}
	elseif ($Equipe == 'DijonFco') {$colorFill = array(13,100,88,4);return $colorFill;}
	elseif ($Equipe == 'Dunkerque') {$colorFill = array(0,0,0,18);return $colorFill;}
	elseif ($Equipe == 'Grenoble') {$colorFill = array(93,75,0,0);return $colorFill;}
	elseif ($Equipe == 'Laval') {$colorFill = array(0,65,95,0);return $colorFill;}
	elseif ($Equipe == 'LeHavre') {$colorFill = array(100,94,33,31);return $colorFill;}
	elseif ($Equipe == 'Lille') {$colorFill = array(19,98,100,10);return $colorFill;}
	elseif ($Equipe == 'Lorient') {$colorFill = array(0,79,100,0);return $colorFill;}
	elseif ($Equipe == 'Lyon') {$colorFill = array(20,15,16,0);return $colorFill;}
	elseif ($Equipe == 'Marseille') {$colorFill = array(20,15,16,0);return $colorFill;}
	elseif ($Equipe == 'AsMonaco') {$colorFill = array(7,100,100,2);return $colorFill;}
	elseif ($Equipe == 'Montpellier') {$colorFill = array(88,76,43,44);return $colorFill;}
	elseif ($Equipe == 'Nancy') {$colorFill = array(0,0,0,0);return $colorFill;}
	elseif ($Equipe == 'FcAnnecy') {$colorFill = array(0,95,91,0);return $colorFill;}
	elseif ($Equipe == 'FcNantes') {$colorFill = array(3,13,100,0);return $colorFill;}
	elseif ($Equipe == 'Nimes') {$colorFill = array(19,98,100,10);return $colorFill;}
	elseif ($Equipe == 'OgcNice') {$colorFill = array(19,98,100,10);return $colorFill;}
	elseif ($Equipe == 'Niort') {$colorFill = array(89,73,0,0);return $colorFill;}
	elseif ($Equipe == 'Reims') {$colorFill = array(15,100,100,0);return $colorFill;}
	elseif ($Equipe == 'Rennes') {$colorFill = array(10,92,70,1);return $colorFill;}
	elseif ($Equipe == 'AsSaintEtienne') {$colorFill = array(75,41,69,38);return $colorFill;}
	elseif ($Equipe == 'FcMetz') {$colorFill = array(0,100,60,30);return $colorFill;}
	elseif ($Equipe == 'ParisSg') {$colorFill = array(100,0,0,57);return $colorFill;}
	elseif ($Equipe == 'ParisFc') {$colorFill = array(90,67,23,7);return $colorFill;}
	elseif ($Equipe == 'Pau') {$colorFill = array(13,6,92,0);return $colorFill;}
	elseif ($Equipe == 'Rodez') {$colorFill = array(0,92,84,0);return $colorFill;}
	elseif ($Equipe == 'Quevilly') {$colorFill = array(0,100,93,0);return $colorFill;}
	elseif ($Equipe == 'Toulouse') {$colorFill = array(70,69,0,0);return $colorFill;}
	elseif ($Equipe == 'RcStrasbourg') {$colorFill = array(91,72,0,0);return $colorFill;}
	elseif ($Equipe == 'Sochaux') {$colorFill = array(4,14,89,0);return $colorFill;}
	elseif ($Equipe == 'Troyes') {$colorFill = array(88,72,0,0);return $colorFill;}
	elseif ($Equipe == 'Valenciennes') {$colorFill = array(0,100,93,0);return $colorFill;}
	elseif ($Equipe == 'RcLens') {$colorFill = array(13,100,88,4);return $colorFill;}
	elseif ($Equipe == 'Versailles') {$colorFill = array(100,81,0,0);return $colorFill;}
	elseif ($Equipe == 'VillefrancheBeaujolais') {$colorFill = array(91,72,0,0);return $colorFill;}
	
	/************ International ***************/

	elseif ($Equipe == 'AfriqueDuSud') {$colorFill = array(0,20,100,0);return $colorFill;}
	elseif ($Equipe == 'Angleterre') {$colorFill = array(0,0,0,15);return $colorFill;}
	elseif ($Equipe == 'Allemagne') {$colorFill = array(0,0,0,15);return $colorFill;}
	elseif ($Equipe == 'ArabieSaoudite') {$colorFill = array(0,0,0,15);return $colorFill;}
	elseif ($Equipe == 'Argentine') {$colorFill = array(50,20,0,0);return $colorFill;}
	elseif ($Equipe == 'Australie'){$colorFill = array(0,27,100,0);return $colorFill;}
	elseif ($Equipe == 'Autriche') {$colorFill = array(0,100,100,0);return $colorFill;}
	elseif ($Equipe == 'Belgique') {$colorFill = array(0,90,90,0);return $colorFill;}
	elseif ($Equipe == 'Bosnie') {$colorFill = array(90,70,0,0);return $colorFill;}
	elseif ($Equipe == 'Bresil') {$colorFill = array(3,4,90,0);return $colorFill;}
	elseif ($Equipe == 'Bulgarie') {$colorFill = array(0,0,0,30);return $colorFill;}
	elseif ($Equipe == 'Cameroun') {$colorFill = array(75,12,90,0);return $colorFill;}
	elseif ($Equipe == 'Canada') {$colorFill = array(0,100,100,0);return $colorFill;}
	elseif ($Equipe == 'CoreeDuSud') {$colorFill = array(7,90,70,0);return $colorFill;}
	elseif ($Equipe == 'CostaRica') {$colorFill = array(0,100,100,0);return $colorFill;}
	elseif ($Equipe == 'CoteDIvoire') {$colorFill = array(0,45,95,0);return $colorFill;}
	elseif ($Equipe == 'Croatie') {$colorFill = array(0,100,100,0);return $colorFill;}
	elseif ($Equipe == 'Espagne') {$colorFill = array(20,100,100,7);return $colorFill;}
	elseif ($Equipe == 'Equateur') {$colorFill = array(10,0,80,0);return $colorFill;}
	elseif ($Equipe == 'EtatsUnis') {$colorFill = array(0,0,0,10);return $colorFill;}
	elseif ($Equipe == 'Finlande') {$colorFill = array(0,0,0,20);return $colorFill;}
	elseif ($Equipe == 'France') {$colorFill = array(100,87,30,16);return $colorFill;}
	elseif ($Equipe == 'Ghana') {$colorFill = array(0,100,100,0);return $colorFill;}
	elseif ($Equipe == 'Hongrie') {$colorFill = array(0,90,90,0);return $colorFill;}
	elseif ($Equipe == 'Iran') {$colorFill = array(0,0,0,10);return $colorFill;}
	elseif ($Equipe == 'Italie') {$colorFill = array(90,75,0,0);return $colorFill;}
	elseif ($Equipe == 'Japon') {$colorFill = array(100,81,0,0);return $colorFill;}
	elseif ($Equipe == 'Kazakhstan') {$colorFill = array(10,0,80,0);return $colorFill;}
	elseif ($Equipe == 'Maroc') {$colorFill = array(30,100,100,0);return $colorFill;}
	elseif ($Equipe == 'Mexique') {$colorFill = array(75,41,69,38);return $colorFill;}
	elseif ($Equipe == 'PaysDeGalles') {$colorFill = array(0,100,100,0);return $colorFill;}
	elseif ($Equipe == 'PaysBas') {$colorFill = array(0,65,95,0);return $colorFill;}
	elseif ($Equipe == 'Pologne') {$colorFill = array(0,0,0,15);return $colorFill;}
	elseif ($Equipe == 'Danemark') {$colorFill = array(0,100,100,0);return $colorFill;}
	elseif ($Equipe == 'Serbie') {$colorFill = array(30,100,100,0);return $colorFill;}
	elseif ($Equipe == 'Suisse') {$colorFill = array(0,100,100,0);return $colorFill;}
	elseif ($Equipe == 'Portugal') {$colorFill = array(30,100,100,0);return $colorFill;}
	elseif ($Equipe == 'Tunisie') {$colorFill = array(0,100,100,0);return $colorFill;}
	elseif ($Equipe == 'Qatar') {$colorFill = array(37,100,38,50);return $colorFill;}
	elseif ($Equipe == 'Senegal') {$colorFill = array(80,30,43,14);return $colorFill;}
	elseif ($Equipe == 'Ukraine') {$colorFill = array(8,27,78,0);return $colorFill;}
	elseif ($Equipe == 'Uruguay') {$colorFill = array(63,10,0,0);return $colorFill;}
}

/*----------  Fonction qui attribut la couleur du numéro  ----------*/

function CouleurNum($Equipe,$colorNum){
	if ($Equipe == 'Argentine' || $Equipe == 'Uruguay' || $Equipe == 'Equateur' || $Equipe == 'Bulgarie'|| $Equipe == 'Sochaux' || $Equipe == 'Laval' ||$Equipe == 'Pau'||$Equipe == 'Dunkerque'||$Equipe == 'Amiens'||$Equipe == 'Brest'||$Equipe == 'Lyon'||$Equipe == 'Marseille'||$Equipe == 'FcNantes'||$Equipe == 'FcMetz'||$Equipe == 'Belgique'|| $Equipe == 'Allemagne' || $Equipe == 'Finlande' || $Equipe == 'Kazakhstan' || $Equipe == 'Ukraine') {
		$colorNum = array(0,0,0,100);return $colorNum;}
	
	elseif ($Equipe == 'CoreeDuSud' || $Equipe == 'Serbie' || $Equipe == 'Canada' || $Equipe == 'Maroc' || $Equipe == 'Croatie' || $Equipe == 'CostaRica' || $Equipe == 'Japon' || $Equipe == 'Tunisie' || $Equipe == 'Mexique' || $Equipe == 'Qatar' || $Equipe == 'Autriche' || $Equipe == 'VillefrancheBeaujolais' || $Equipe == 'Versailles' || $Equipe == 'Bastia' || $Equipe == 'FcAnnecy' || $Equipe == 'Quevilly' || $Equipe == 'Danemark'|| $Equipe == 'Suisse'|| $Equipe == 'PaysDeGalles'|| $Equipe == 'PaysBas'|| $Equipe == 'AcAjaccio'||$Equipe == 'Valenciennes'||$Equipe == 'Troyes'||$Equipe == 'ParisFc'||$Equipe == 'Niort'||$Equipe == 'LeHavre'||$Equipe == 'Grenoble'||$Equipe == 'Clermont'||$Equipe == 'Chambly'||$Equipe == 'Chateauroux'||$Equipe == 'Caen'||$Equipe == 'Auxerre'||$Equipe == 'AngersSco'||$Equipe == 'Bordeaux'||$Equipe == 'BergeracFc'||$Equipe == 'DijonFco'||$Equipe == 'Lille'||$Equipe == 'Lorient'||$Equipe == 'AsMonaco'||$Equipe == 'Montpellier'||$Equipe == 'Nimes'||$Equipe == 'OgcNice'||$Equipe == 'Reims'||$Equipe == 'Rennes'||$Equipe == 'AsSaintEtienne'||$Equipe == 'ParisSg'||$Equipe == 'Toulouse'||$Equipe == 'RcStrasbourg'||$Equipe == 'RcLens' || $Equipe == 'Bosnie' || $Equipe == 'France' || $Equipe == 'Hongrie' || $Equipe == 'Italie') {
		$colorNum = array(0,0,0,0);return $colorNum;}
	
	elseif ($Equipe == 'Cameroun') {
		$colorNum = array(5,11,90,0);return $colorNum;}

	elseif ($Equipe == 'CoteDIvoire') {
		$colorNum = array(80,10,55,0);return $colorNum;}

	elseif ($Equipe == 'AfriqueDuSud' || $Equipe == 'Australie' || $Equipe == 'ArabieSaoudite') {
		$colorNum = array(85,0,100,0);return $colorNum;}

	elseif ($Equipe == 'EtatsUnis') {
		$colorNum = array(100,85,30,15);return $colorNum;}

	elseif ($Equipe == 'Bresil') {
		$colorNum = array(85,20,100,5);return $colorNum;}

	elseif ($Equipe == 'Ghana') {
		$colorNum = array(85,16,100,0);return $colorNum;}

	elseif ($Equipe == 'Iran') {
		$colorNum = array(17,97,97,7);return $colorNum;}

	elseif ($Equipe == 'Nancy' || $Equipe == 'Angleterre' || $Equipe == 'Pologne') {
		$colorNum = array(0,95,91,0);return $colorNum;}

	elseif ($Equipe == 'Rodez') {
		$colorNum = array(11,0,90,0);return $colorNum;}

	elseif ($Equipe == 'Espagne') {
		$colorNum = array(0,44,92,0);return $colorNum;}

	elseif ($Equipe == 'Senegal') {
		$colorNum = array(40,0,100,0);return $colorNum;}	

	elseif ($Equipe == 'Portugal') {
		$colorNum = array(0,30,71,0);return $colorNum;}
}

/*=====  End of Script pour attribuer la couleur aux maillot dans le pdf - doit correspondre à "colorSetFoot.css"  ======*/
?>