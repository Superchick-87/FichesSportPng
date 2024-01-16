<?php
$Championnat = $_GET['Championnat'];
$editeur = $_GET['Editeur'];

include(dirname(__FILE__) . '/includes/ddc.php');
include(dirname(__FILE__) . '/includes/EquipesStades' . ddc($Championnat) . '.php');
include(dirname(__FILE__) . '/includes/Age.php');
include(dirname(__FILE__) . '/includes/accesserver.php');
include(dirname(__FILE__) . '/includes/texteCoupe.php');
include(dirname(__FILE__) . '/includes/Apostrophe.php');
include(dirname(__FILE__) . '/includes/HdeHeure.php');
include(dirname(__FILE__) . '/includes/dateToFrench.php');
include(dirname(__FILE__) . '/includes/validationEffectif.php');
include(dirname(__FILE__) . '/includes/choixCompetition.php');
include(dirname(__FILE__) . '/includes/pdf_DateEtHeure.php');
include(dirname(__FILE__) . '/includes/confrontations.php');
include(dirname(__FILE__) . '/includes/tailleiframe.php');


error_reporting(E_ERROR | E_WARNING | E_PARSE);

/*================================================
=            RECUPERATION DES DONNEES            =
================================================*/
/*----------  type de fiche  ----------*/
/**
 *
 * Présentation
 * Compte rendu
 */

// $when = ddc($_GET['When'];

/*----------  INFOS GENERIQUE ET AFFICHAGE  ----------*/

$ClubDom = $_GET['RencontreA'];
$ClubExt = $_GET['RencontreB'];
$Lieu = apostropheencode($_GET['stade']);
$Date = $_GET['Date'];
$Horaire = $_GET['Horaire'];
$Arbitre = $_GET['Arbitre'];
$tv = $_GET['tv'];
$tactiqueA = $_GET['schemaTactiqueA'];
$tactiqueB = $_GET['schemaTactiqueB'];
$format = $_GET['format'];

/*--------------------  EQUIPE 1  --------------------*/

/*----------  Noms des joueurs  ----------*/

$EquipeDom1 = apostropheencode($_GET["EquipeDom1"]);
$EquipeDom2 = apostropheencode($_GET["EquipeDom2"]);
$EquipeDom3 = apostropheencode($_GET["EquipeDom3"]);
$EquipeDom4 = apostropheencode($_GET["EquipeDom4"]);
$EquipeDom5 = apostropheencode($_GET["EquipeDom5"]);
$EquipeDom6 = apostropheencode($_GET["EquipeDom6"]);
$EquipeDom7 = apostropheencode($_GET["EquipeDom7"]);
$EquipeDom8 = apostropheencode($_GET["EquipeDom8"]);
$EquipeDom9 = apostropheencode($_GET["EquipeDom9"]);
$EquipeDom10 = apostropheencode($_GET["EquipeDom10"]);
$EquipeDom11 = apostropheencode($_GET["EquipeDom11"]);
$EquipeDom12 = apostropheencode($_GET["EquipeDom12"]);
$EquipeDom13 = apostropheencode($_GET["EquipeDom13"]);
$EquipeDom14 = apostropheencode($_GET["EquipeDom14"]);
$EquipeDom15 = apostropheencode($_GET["EquipeDom15"]);

/*----------  N° des joueurs  ----------*/
function toto($a)
{
	if (!isset($a)) {
		return $a = '';
	} else {
		return $a;
	}
}
// toto($E);
$EquipeDomNum1 = toto($_GET["EquipeDomNum1"]);
$EquipeDomNum2 = toto($_GET["EquipeDomNum2"]);
$EquipeDomNum3 = toto($_GET["EquipeDomNum3"]);
$EquipeDomNum4 = toto($_GET["EquipeDomNum4"]);
$EquipeDomNum5 = toto($_GET["EquipeDomNum5"]);
$EquipeDomNum6 = toto($_GET["EquipeDomNum6"]);
$EquipeDomNum7 = toto($_GET["EquipeDomNum7"]);
$EquipeDomNum8 = toto($_GET["EquipeDomNum8"]);
$EquipeDomNum9 = toto($_GET["EquipeDomNum9"]);
$EquipeDomNum10 = toto($_GET["EquipeDomNum10"]);
$EquipeDomNum11 = toto($_GET["EquipeDomNum11"]);
$EquipeDomNum12 = toto($_GET["EquipeDomNum12"]);
$EquipeDomNum13 = toto($_GET["EquipeDomNum13"]);
$EquipeDomNum14 = toto($_GET["EquipeDomNum14"]);
$EquipeDomNum15 = toto($_GET["EquipeDomNum15"]);

/*----------  Capitaine  ----------*/

$EquipeDomCap1 = $_GET["EquipeDomCap1"];
$EquipeDomCap2 = $_GET["EquipeDomCap2"];
$EquipeDomCap3 = $_GET["EquipeDomCap3"];
$EquipeDomCap4 = $_GET["EquipeDomCap4"];
$EquipeDomCap5 = $_GET["EquipeDomCap5"];
$EquipeDomCap6 = $_GET["EquipeDomCap6"];
$EquipeDomCap7 = $_GET["EquipeDomCap7"];
$EquipeDomCap8 = $_GET["EquipeDomCap8"];
$EquipeDomCap9 = $_GET["EquipeDomCap9"];
$EquipeDomCap10 = $_GET["EquipeDomCap10"];
$EquipeDomCap11 = $_GET["EquipeDomCap11"];
$EquipeDomCap12 = $_GET["EquipeDomCap12"];
$EquipeDomCap13 = $_GET["EquipeDomCap13"];
$EquipeDomCap14 = $_GET["EquipeDomCap14"];
$EquipeDomCap15 = $_GET["EquipeDomCap15"];

/*----------  Sélectionneurs & Remplaçants  ----------*/

$SelectionneursD = $_GET["SelectionneursD"];
$RemplacantsD = $_GET["RemplacantsD"];

/*------------------  FIN EQUIPE 1  ------------------*/

/*--------------------  EQUIPE 2  --------------------*/

/*----------  Noms des joueurs  ----------*/

$EquipeExt1 = apostropheencode($_GET["EquipeExt1"]);
$EquipeExt2 = apostropheencode($_GET["EquipeExt2"]);
$EquipeExt3 = apostropheencode($_GET["EquipeExt3"]);
$EquipeExt4 = apostropheencode($_GET["EquipeExt4"]);
$EquipeExt5 = apostropheencode($_GET["EquipeExt5"]);
$EquipeExt6 = apostropheencode($_GET["EquipeExt6"]);
$EquipeExt7 = apostropheencode($_GET["EquipeExt7"]);
$EquipeExt8 = apostropheencode($_GET["EquipeExt8"]);
$EquipeExt9 = apostropheencode($_GET["EquipeExt9"]);
$EquipeExt10 = apostropheencode($_GET["EquipeExt10"]);
$EquipeExt11 = apostropheencode($_GET["EquipeExt11"]);
$EquipeExt12 = apostropheencode($_GET["EquipeExt12"]);
$EquipeExt13 = apostropheencode($_GET["EquipeExt13"]);
$EquipeExt14 = apostropheencode($_GET["EquipeExt14"]);
$EquipeExt15 = apostropheencode($_GET["EquipeExt15"]);

/*----------  N° des joueurs  ----------*/

$EquipeExtNum1 = toto($_GET["EquipeExtNum1"]);
$EquipeExtNum2 = toto($_GET["EquipeExtNum2"]);
$EquipeExtNum3 = toto($_GET["EquipeExtNum3"]);
$EquipeExtNum4 = toto($_GET["EquipeExtNum4"]);
$EquipeExtNum5 = toto($_GET["EquipeExtNum5"]);
$EquipeExtNum6 = toto($_GET["EquipeExtNum6"]);
$EquipeExtNum7 = toto($_GET["EquipeExtNum7"]);
$EquipeExtNum8 = toto($_GET["EquipeExtNum8"]);
$EquipeExtNum9 = toto($_GET["EquipeExtNum9"]);
$EquipeExtNum10 = toto($_GET["EquipeExtNum10"]);
$EquipeExtNum11 = toto($_GET["EquipeExtNum11"]);
$EquipeExtNum12 = toto($_GET["EquipeExtNum12"]);
$EquipeExtNum13 = toto($_GET["EquipeExtNum13"]);
$EquipeExtNum14 = toto($_GET["EquipeExtNum14"]);
$EquipeExtNum15 = toto($_GET["EquipeExtNum15"]);

/*----------  Capitaine  ----------*/

$EquipeExtCap1 = $_GET["EquipeExtCap1"];
$EquipeExtCap2 = $_GET["EquipeExtCap2"];
$EquipeExtCap3 = $_GET["EquipeExtCap3"];
$EquipeExtCap4 = $_GET["EquipeExtCap4"];
$EquipeExtCap5 = $_GET["EquipeExtCap5"];
$EquipeExtCap6 = $_GET["EquipeExtCap6"];
$EquipeExtCap7 = $_GET["EquipeExtCap7"];
$EquipeExtCap8 = $_GET["EquipeExtCap8"];
$EquipeExtCap9 = $_GET["EquipeExtCap9"];
$EquipeExtCap10 = $_GET["EquipeExtCap10"];
$EquipeExtCap11 = $_GET["EquipeExtCap11"];
$EquipeExtCap12 = $_GET["EquipeExtCap12"];
$EquipeExtCap13 = $_GET["EquipeExtCap13"];
$EquipeExtCap14 = $_GET["EquipeExtCap14"];
$EquipeExtCap15 = $_GET["EquipeExtCap15"];

/*----------  Sélectionneurs & Remplaçants  ----------*/

$SelectionneursE = $_GET["SelectionneursE"];
$RemplacantsE = $_GET["RemplacantsE"];


for ($i = 1; $i < $entrees; $i++) {
	setcookie("EquipeDom" . $i . "", $_GET['EquipeDom' . $i . ''], time() + 24 * 3600);
	setcookie("EquipeExt" . $i . "", $_GET['EquipeExt' . $i . ''], time() + 24 * 3600);
}

/*----------  CLASSEMENT / PTS OU SCORE  ----------*/

$ClassScoreDom = $_GET["ClassPtsScoreDom"];
$ClassScoreExt = $_GET["ClassPtsScoreExt"];

/*----------  SERIE EN COURS  ----------*/

$SerieDom1 = $_GET["SerieDom1"];
$SerieDom2 = $_GET["SerieDom2"];
$SerieDom3 = $_GET["SerieDom3"];
$SerieDom4 = $_GET["SerieDom4"];
$SerieDom5 = $_GET["SerieDom5"];

$SerieExt1 = $_GET["SerieExt1"];
$SerieExt2 = $_GET["SerieExt2"];
$SerieExt3 = $_GET["SerieExt3"];
$SerieExt4 = $_GET["SerieExt4"];
$SerieExt5 = $_GET["SerieExt5"];

/*----------  CONFRONTATIONS  ----------*/

$VictoiresDom = $_GET["VictoiresDom"];
$Nuls = $_GET["Nuls"];
$VictoiresExt = $_GET["VictoiresExt"];
$TotalConfrontations = $VictoiresDom + $Nuls + $VictoiresExt;


/*=====  End of RECUPERATION DES DONNEES  ======*/



// echo '<h2>'.$ClubDom.' / '.$ClubExt.'</h2>
// 	<div>	
// 		<img class="ecussonsverif" src="css/images/clubs/'.$discipline.'/'.ddc($ClubDom).'.png"/>
// 		<img class="ecussonsverif" src="css/images/clubs/'.$discipline.'/'.ddc($ClubExt).'.png"/></br>
// 	</div></br>';

// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// ::::::::::::: FABRICATION FICHIER CSV POUR JS-> INJECTION DONNEES  :::::::::::::
// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

// Ecrase et remplace
$definition = file_put_contents('datas/' . $discipline . '/Presentation_' . $editeur . '_' . ddc($ClubDom) . '' . ddc($ClubExt) . '.csv', '');

// Cré un nouveau fichier
// $definition = fopen("Rencontre_".$confrontation.".csv", "x+");

// 	::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// 	::::::::::::::::::::::::::::  CHOIX DU SPORT  :::::::::::::::::::::::::::::::: 
// 	::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

if ($discipline == 'Foot') {
	include(dirname(__FILE__) . '/includes/footTactique.php');
}
if ($discipline == 'Rugby') {
	include(dirname(__FILE__) . '/includes/rugbyTactique.php');
}
if ($discipline == 'Basket') {
	include(dirname(__FILE__) . '/includes/basketTactique.php');
}


// Paramétrage de l'écriture du futur fichier CSV
$chemin = 'datas/' . $discipline . '/Presentation_' . $editeur . '_' . ddc($ClubDom) . '' . ddc($ClubExt) . '.csv';
$delimiteur = ','; // Pour une tabulation, utiliser $delimiteur = "t";

// Création du fichier csv (le fichier est vide pour le moment)
// w+ : vide et réécrit nouvelles données -consulter http://php.net/manual/fr/function.fopen.php
$fichier_csv = fopen($chemin, 'w+');

// // Si votre fichier a vocation a être importé dans Excel,
// // vous devez impérativement utiliser la ligne ci-dessous pour corriger
// // les problèmes d'affichage des caractères internationaux (les accents par exemple)
// fprintf($fichier_csv, chr(0xEF).chr(0xBB).chr(0xBF));

// Boucle foreach sur chaque ligne du tableau
foreach ($lignes as $ligne) {
	// chaque ligne en cours de lecture est insérée dans le fichier
	// les valeurs présentes dans chaque ligne seront séparées par $delimiteur
	fputcsv($fichier_csv, $ligne, $delimiteur);
}

// fermeture du fichier csv
fclose($fichier_csv);

// :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// :::::: FABRICATION FICHIER PHP ARRAY POUR AFFICHAGE FRONT -> INJECTION DONNEES ::::::
// :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

$fichierv = fopen("datas/" . $discipline . "/Presentation_" . $editeur . "_" . ddc($ClubDom) . "" . ddc($ClubExt) . ".php", 'w+');
$big = '$DatasFront';
$texte = ("<?php " . $big . "=array ('" . dateToFrench($Date, 'l j F') . "','" . HdeHeure($Horaire) . "','" . apostropheencode($ClubDom) . "','" . apostropheencode($ClubExt) . "','" . $Lieu . "','" . apostropheencode($Arbitre) . "','" . apostropheencode($SelectionneursD) . "','" . apostropheencode($RemplacantsD) . "','" . apostropheencode($SelectionneursE) . "','" . apostropheencode($RemplacantsE) . "','" . $SerieDom1 . "','" . $SerieDom2 . "','" . $SerieDom3 . "','" . $SerieDom4 . "','" . $SerieDom5 . "','" . $SerieExt1 . "','" . $SerieExt2 . "','" . $SerieExt3 . "','" . $SerieExt4 . "','" . $SerieExt5 . "','" . $VictoiresDom . "','" . $Nuls . "','" . $VictoiresExt . "','" . $TotalConfrontations . "','" . $tv[0] . "','" . $tv[1] . "','" . $ClassScoreDom . "','" . $ClassScoreExt . "') ?>");

fwrite($fichierv, $texte);
fclose($fichierv);



echo '
<div id="messageUrl" style="display:block;">
		<legend>"VISUALISER" pour vérifier votre composition</legend>
	    <input id="visualiser" type=button value="VISUALISER" onclick=window.open(href="' . $redirectionPre . '' . ddc($ClubDom) . '' . ddc($ClubExt) . '&Discipline=' . $discipline . '&Editeur=' . $editeur . '") target="_blank" />
</div>';

$RencontreF = ddc($ClubDom) . "" . ddc($ClubExt);
// echo $RencontreF;
// echo $discipline;

function nomFormat($a)
{
	$a = str_replace(' ', '', $a);
	$a = str_replace('x', '', $a);
	return $a;
}
// echo nomFormat($format);
// echo $format;
// $toto = nomFormat($format);
// include(dirname(__FILE__) . '/pdf_' . nomFormat($format) . '_Presentation.php');

?>
<!-- <form id="emailForm" name="emailForm" method="post" action="">
					<legend>"RETOUR" pour modifier votre composition</legend>
					<div>
					<input id='visualiser' type=button value='RETOUR' onclick='history.go(-1)'/>
					<input onclick="change_class()" name="SubmitBtn" type="submit" id="submitBtn" value="VALIDER"> -->
<!-- </div>
			</form>

	</body>
	<footer style="background-image:url(css/images/signature<?php echo $editeur; ?>.svg);"></footer>

	<script language="javascript">
		function change_class() {
		var btn = document.getElementById("verifbdd");
		btn.className= "verifbddchange";
		}
	</script> -->

<!-- <script type="text/javascript" src="js/alert.js"></script>
	<script type="text/javascript" src="js/afficheUrl.js"></script>
	<script type="text/javascript">console.log(resultat);</script>
</html> -->