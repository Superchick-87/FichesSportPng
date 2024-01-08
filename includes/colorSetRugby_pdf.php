<?php
/*Script pour qui attribut les couleurs */
function CouleurFond($Equipe,$colorFill){

	// EQUIPES NATIONALES //
	if ($Equipe == 'Angleterre'){$colorFill = array(21,95,83,14);return $colorFill;}
	elseif ($Equipe == 'Ecosse'){$colorFill = array(100,79,31,18);return $colorFill;}
	elseif ($Equipe == 'France'){$colorFill = array(89,69,0,0);return $colorFill;}
	elseif ($Equipe == 'Galles'){$colorFill = array(16,86,76,5);return $colorFill;}
	elseif ($Equipe == 'Irlande'){$colorFill = array(75,15,95,2);return $colorFill;}
	elseif ($Equipe == 'Italie'){$colorFill = array(93,66,0,0);return $colorFill;}
	// EUROPE //
	elseif ($Equipe == 'Glasgow'){$colorFill = array(0,0,0,80);return $colorFill;}
	elseif ($Equipe == 'Gloucester'){$colorFill = array(21,95,83,14);return $colorFill;}
	elseif ($Equipe == 'Bath'){$colorFill = array(88,66,0,0);return $colorFill;}
	elseif ($Equipe == 'Edimbourg'){$colorFill = array(100,100,0,0);return $colorFill;}
	elseif ($Equipe == 'Bristol'){$colorFill = array(100,79,31,18);return $colorFill;}
	elseif ($Equipe == 'Sale'){$colorFill = array(100,79,31,18);return $colorFill;}
	elseif ($Equipe == 'Trevise'){$colorFill = array(87,30,100,19);return $colorFill;}
	elseif ($Equipe == 'Cardiff'){$colorFill = array(42,4,0,0);return $colorFill;}
	elseif ($Equipe == 'Connacht'){$colorFill = array(87,30,100,19);return $colorFill;}
	elseif ($Equipe == 'Northampton'){$colorFill = array(87,30,100,19);return $colorFill;}
	elseif ($Equipe == 'NewportDragons'){$colorFill = array(0,0,0,80);return $colorFill;}
	elseif ($Equipe == 'Newcastle'){$colorFill = array(0,0,0,100);return $colorFill;}
	elseif ($Equipe == 'Exeter'){$colorFill = array(0,0,0,100);return $colorFill;}
	elseif ($Equipe == 'Munster'){$colorFill = array(20,95,80,11);return $colorFill;}
	elseif ($Equipe == 'Harlequins'){$colorFill = array(42,4,0,0);return $colorFill;}
	elseif ($Equipe == 'Leinster'){$colorFill = array(88,66,0,0);return $colorFill;}
	elseif ($Equipe == 'Leicester'){$colorFill = array(90,50,75,60);return $colorFill;}
	elseif ($Equipe == 'LondonIrish'){$colorFill = array(87,30,100,19);return $colorFill;}
	elseif ($Equipe == 'Ospreys'){$colorFill = array(0,0,0,100);return $colorFill;}
	elseif ($Equipe == 'Saracens'){$colorFill = array(0,0,0,100);return $colorFill;}
	elseif ($Equipe == 'Scarlets'){$colorFill = array(0,100,100,0);return $colorFill;}
	elseif ($Equipe == 'Sharks'){$colorFill = array(0,0,0,100);return $colorFill;}
	elseif ($Equipe == 'Ulster'){$colorFill = array(0,0,0,20);return $colorFill;}
	elseif ($Equipe == 'Wasps'){$colorFill = array(0,0,0,100);return $colorFill;}
	elseif ($Equipe == 'Worcester'){$colorFill = array(100,79,31,18);return $colorFill;}
	elseif ($Equipe == 'Zebre'){$colorFill = array(0,0,0,100);return $colorFill;}
	// MONDE //
	elseif ($Equipe == 'AfriqueDuSud'){$colorFill = array(83,0,56,38);return $colorFill;}
	elseif ($Equipe == 'Australie'){$colorFill = array(0,27,100,0);return $colorFill;}
	elseif ($Equipe == 'Argentine'){$colorFill = array(42,4,0,0);return $colorFill;}
	elseif ($Equipe == 'Georgie'){$colorFill = array(21,95,83,14);return $colorFill;}
	elseif ($Equipe == 'Japon'){$colorFill = array(0,100,100,0);return $colorFill;}
	elseif ($Equipe == 'NouvelleZelande'){$colorFill = array(0,0,0,100);return $colorFill;}
	// TOP 14 - PRO D2 //
	elseif ($Equipe == 'Agen'){$colorFill = array(88,66,0,0);return $colorFill;}
	elseif ($Equipe == 'AixEnProvence'){$colorFill = array(0,0,0,40);return $colorFill;}
	elseif ($Equipe == 'Aurillac'){$colorFill = array(0,98,98,0);return $colorFill;}
	elseif ($Equipe == 'Bayonne'){$colorFill = array(44,5,0,0);return $colorFill;}
	elseif ($Equipe == 'Beziers'){$colorFill = array(0,95,80,0);return $colorFill;}
	elseif ($Equipe == 'Biarritz'){$colorFill = array(13,10,12,5);return $colorFill;}
	elseif ($Equipe == 'BordeauxBegles'){$colorFill = array(34,100,71,54);return $colorFill;}
	elseif ($Equipe == 'BourgEnBresse'){$colorFill = array(70,80,0,0);return $colorFill;}
	elseif ($Equipe == 'Brive'){$colorFill = array(0,0,0,100);return $colorFill;}
	elseif ($Equipe == 'Carcassonne'){$colorFill = array(0,0,100,10);return $colorFill;}
	elseif ($Equipe == 'Castres'){$colorFill = array(94,79,0,0);return $colorFill;}
	elseif ($Equipe == 'Clermont'){$colorFill = array(0,0,100,10);return $colorFill;}
	elseif ($Equipe == 'Colomiers'){$colorFill = array(100,81,33,21);return $colorFill;}
	elseif ($Equipe == 'Grenoble'){$colorFill = array(93,64,3,0);return $colorFill;}
	elseif ($Equipe == 'LaRochelle'){$colorFill = array(66,56,53,58);return $colorFill;}
	elseif ($Equipe == 'Lyon'){$colorFill = array(0,0,0,100);return $colorFill;}
	elseif ($Equipe == 'Massy'){$colorFill = array(44,5,0,0);return $colorFill;}
	elseif ($Equipe == 'MontDeMarsan'){$colorFill = array(3,19,100,0);return $colorFill;}
	elseif ($Equipe == 'Montauban'){$colorFill = array(84,28,77,15);return $colorFill;}
	elseif ($Equipe == 'Montpellier'){$colorFill = array(93,64,3,0);return $colorFill;}
	elseif ($Equipe == 'Nevers'){$colorFill = array(4,12,100,0);return $colorFill;}
	elseif ($Equipe == 'Oyonnax'){$colorFill = array(0,0,0,100);return $colorFill;}
	elseif ($Equipe == 'Pau'){$colorFill = array(87,30,100,19);return $colorFill;}
	elseif ($Equipe == 'Perpignan'){$colorFill = array(6,100,69,1);return $colorFill;}
	elseif ($Equipe == 'Racing'){$colorFill = array(42,4,0,0);return $colorFill;}
	elseif ($Equipe == 'Rouen'){$colorFill = array(0,0,0,100);return $colorFill;}
	elseif ($Equipe == 'SoyauxAngouleme'){$colorFill = array(77,96,0,0);return $colorFill;}
	elseif ($Equipe == 'StadeFrancais'){$colorFill = array(0,81,3,0);return $colorFill;}
	elseif ($Equipe == 'Toulon'){$colorFill = array(76,66,60,81);return $colorFill;}
	elseif ($Equipe == 'Toulouse'){$colorFill = array(13,98,100,5);return $colorFill;}
	elseif ($Equipe == 'ValenceRomans'){$colorFill = array(13,10,12,5);return $colorFill;}
	elseif ($Equipe == 'Vannes'){$colorFill = array(100,84,39,31);return $colorFill;}
	
}
function CouleurNum($Equipe,$colorNum){
	if ($Equipe == 'Cardiff' || $Equipe == 'Harlequins' || $Equipe == 'Argentine' || $Equipe == 'AixEnProvence'||$Equipe == 'Bayonne'||$Equipe == 'Beziers'||$Equipe == 'Carcassonne'||$Equipe == 'Clermont' || $Equipe == 'Massy' || $Equipe == 'MontDeMarsan'||$Equipe == 'Racing'||$Equipe == 'ValenceRomans') {$colorNum = array(0,0,0,100);return $colorNum;}
	elseif ($Equipe == 'LondonIrish' || $Equipe == 'Worcester'|| $Equipe == 'Saracens'|| $Equipe == 'NewportDragons'|| $Equipe == 'Newcastle'|| $Equipe == 'Edimbourg'|| $Equipe == 'Ospreys'|| $Equipe == 'Northampton'|| $Equipe == 'Glasgow'|| $Equipe == 'Exeter'|| $Equipe == 'Bath'|| $Equipe == 'Connacht'|| $Equipe == 'Leicester'|| $Equipe == 'Scarlets'|| $Equipe == 'Sharks'|| $Equipe == 'Japon' || $Equipe == 'Leinster'|| $Equipe == 'Gloucester'||$Equipe == 'Sale'||$Equipe == 'Bristol'|| $Equipe == 'Trevise'|| $Equipe == 'Angleterre'||$Equipe == 'Ecosse'||$Equipe == 'France'||$Equipe == 'Galles' || $Equipe == 'Georgie' || $Equipe == 'NouvelleZelande' || $Equipe == 'Irlande'||$Equipe == 'Agen'|| $Equipe == 'BordeauxBegles'|| $Equipe == 'BourgEnBresse'|| $Equipe == 'Brive'||$Equipe == 'Castres'||$Equipe == 'Colomiers'||$Equipe == 'Grenoble'|| $Equipe == 'LaRochelle'||$Equipe == 'Lyon'|| $Equipe == 'Montauban'||  $Equipe == 'Munster'|| $Equipe == 'Montpellier'||$Equipe == 'Oyonnax'||$Equipe == 'Pau'||$Equipe == 'Perpignan'||$Equipe == 'Rouen'||$Equipe == 'SoyauxAngouleme'||$Equipe == 'StadeFrancais'||$Equipe == 'Toulon'||$Equipe == 'Toulouse'|| $Equipe == 'Vannes'|| $Equipe == 'Wasps') {$colorNum = array(0,0,0,0);return $colorNum;}
	elseif ($Equipe == 'Italie') {$colorNum = array(0,22,60,0);return $colorNum;}
	elseif ($Equipe == 'Biarritz') {$colorNum = array(0,95,89,0);return $colorNum;}
	elseif ($Equipe == 'Nevers') {$colorNum = array(100,80,40,40);return $colorNum;}
	elseif ($Equipe == 'Australie') {$colorNum = array(83,0,56,38);return $colorNum;}
	elseif ($Equipe == 'AfriqueDuSud') {$colorNum = array(0,27,100,0);return $colorNum;}
	elseif ($Equipe == 'Zebre') {$colorNum = array(0,100,0,0);return $colorNum;}
	
}
?>