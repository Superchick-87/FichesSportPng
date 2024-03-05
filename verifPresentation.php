<?php
@$valid = $_GET['VALIDEZ'];
@$sav = $_GET['SAVE'];
?>
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


/**
 * *                                       
 * * RECUPERATION DES DONNEES PRESENTATION 
 * *                                       

 * £ #1 PHP - Toutes données sauf compos
 * @ #2 CSV - Compo des équipes 
 */

// *> ----------  Données concernant la rencontre ----------
$ClubDom = $_GET['RencontreA'];
$ClubExt = $_GET['RencontreB'];
$Lieu = apostropheencode($_GET['stade']);
$Date = $_GET['Date'];
$Horaire = $_GET['Horaire'];
$Arbitre = $_GET['Arbitre'];
@$tv = $_GET['tv'];

// *> ----------  Tactique & format ----------
$format = $_GET['format'];
$tactiqueA = $_GET['schemaTactiqueA'];
$tactiqueB = $_GET['schemaTactiqueB'];

// *> ----------  Sélectionneurs & Remplaçants  ----------*/
$SelectionneursD = $_GET["SelectionneursD"];
$RemplacantsD = $_GET["RemplacantsD"];
$SelectionneursE = $_GET["SelectionneursE"];
$RemplacantsE = $_GET["RemplacantsE"];

// *> ----------  CLASSEMENT / PTS OU SCORE  ----------
$ClassScoreDom = $_GET["ClassPtsScoreDom"];
@$ClassScoreExt = $_GET["ClassPtsScoreExt"];

// *> ----------  SERIE EN COURS  ----------
@$SerieDom1 = $_GET["SerieDom1"];
@$SerieDom2 = $_GET["SerieDom2"];
@$SerieDom3 = $_GET["SerieDom3"];
@$SerieDom4 = $_GET["SerieDom4"];
@$SerieDom5 = $_GET["SerieDom5"];
@$SerieExt1 = $_GET["SerieExt1"];
@$SerieExt2 = $_GET["SerieExt2"];
@$SerieExt3 = $_GET["SerieExt3"];
@$SerieExt4 = $_GET["SerieExt4"];
@$SerieExt5 = $_GET["SerieExt5"];

// *> ----------  CONFRONTATIONS  ----------
function val_Min($x)
{
	if ($x == '') {
		$x == 0;
		return $x;
	} else {
		return $x;
	}
};
$VictoiresDom = $_GET["VictoiresDom"];
$Nuls = $_GET["Nuls"];
$VictoiresExt = $_GET["VictoiresExt"];
@$TotalConfrontations = val_Min($VictoiresDom) + val_Min($Nuls) + val_Min($VictoiresExt);

// £ FIN #1 Données pour fichier PHP 

// @ #2 Données pour fichier CSV 
/*--------------------  EQUIPE DOM  --------------------*/
for ($i = 1; $i < $entrees; $i++) {
	${"EquipeDom" . $i} = apostropheencode($_GET["EquipeDom" . $i]);
	${"EquipeDomCap" . $i} = $_GET["EquipeDomCap" . $i];
	${"EquipeDomNum" . $i} = $_GET["EquipeDomNum" . $i];
	${"ClubDom"} = $ClubDom;
}

/*--------------------  EQUIPE EXT  --------------------*/
for ($i = 1; $i < $entrees; $i++) {
	${"EquipeExt" . $i} = apostropheencode($_GET["EquipeExt" . $i]);
	${"EquipeExtCap" . $i} = $_GET["EquipeExtCap" . $i];
	${"EquipeExtNum" . $i} = $_GET["EquipeExtNum" . $i];
	${"ClubExt"} = $ClubExt;
}

// @ FIN #2 Données pour fichier CSV 

/**                                           
 * * FIN RECUPERATION DES DONNEES PRESENTATION 
 */

?>
<!DOCTYPE html>
<html>

<head>
	<title>Présentation - Composition des équipes</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="js/1121_jquery-ui.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.9.1/d3.min.js"></script>
	<script src="js/1121_jquery-ui.js"></script>
</head>

<body>
	<img class="logoCompetition" src="css/images/<?php echo ddc($Championnat); ?>.png">
	<header>
		<h1><?php echo $Championnat; ?><br>Présentation</h1>
		<hr class="separation">
	</header>
	<div id="resultat">
		<?php

		echo '<h2>' . $ClubDom . ' / ' . $ClubExt . '</h2>
		<div>	
			<img class="ecussonsverif" src="css/images/clubs/' . $discipline . '/' . ddc($ClubDom) . '.png"/>
			<img class="ecussonsverif" src="css/images/clubs/' . $discipline . '/' . ddc($ClubExt) . '.png"/></br>
		</div></br>';

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
		// print_r($lignes);
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
		function val_Null($x)
		{
			if ($x = null) {
				return $x = '';
			}
		}
		$fichierv = fopen("datas/" . $discipline . "/Presentation_" . $editeur . "_" . ddc($ClubDom) . "" . ddc($ClubExt) . ".php", 'w+');
		$big = '$DatasFront';
		/*$texte=("<?php ".$big."=array ('".val_Null($Date)."','".val_Null(HdeHeure($Horaire))."','".apostropheencode($ClubDom)."','".apostropheencode($ClubExt)."','".val_Null($Lieu)."','".val_Null(apostropheencode($Arbitre))."','".val_Null(apostropheencode($SelectionneursD))."','".val_Null(apostropheencode($RemplacantsD))."','".val_Null(apostropheencode($SelectionneursE))."','".val_Null(apostropheencode($RemplacantsE))."','".$SerieDom1."','".$SerieDom2."','".$SerieDom3."','".$SerieDom4."','".$SerieDom5."','".$SerieExt1."','".$SerieExt2."','".$SerieExt3."','".$SerieExt4."','".$SerieExt5."','".val_Null($VictoiresDom)."','".val_Null($Nuls)."','".val_Null($VictoiresExt)."','".$TotalConfrontations."','".val_Null($tv[0])."','".val_Null($tv[1])."','".val_Null($ClassScoreDom)."','".val_Null($ClassScoreExt)."') ?>");
		*/
		$texte = ("<?php " . $big . "=array ('" . $Date . "','" . HdeHeure($Horaire) . "','" . apostropheencode($ClubDom) . "','" . apostropheencode($ClubExt) . "','" . $Lieu . "','" . apostropheencode($Arbitre) . "','" . apostropheencode($SelectionneursD) . "','" . apostropheencode($RemplacantsD) . "','" . apostropheencode($SelectionneursE) . "','" . apostropheencode($RemplacantsE) . "','" . $SerieDom1 . "','" . $SerieDom2 . "','" . $SerieDom3 . "','" . $SerieDom4 . "','" . $SerieDom5 . "','" . $SerieExt1 . "','" . $SerieExt2 . "','" . $SerieExt3 . "','" . $SerieExt4 . "','" . $SerieExt5 . "','" . $VictoiresDom . "','" . $Nuls . "','" . $VictoiresExt . "','" . $TotalConfrontations . "','" . $tv[0] . "','" . $tv[1] . "','" . $ClassScoreDom . "','" . $ClassScoreExt . "','" . $tactiqueA . "','" . $tactiqueB . "') ?>");

		fwrite($fichierv, $texte);
		fclose($fichierv);
		?>
	</div>

	<?php
	echo '
		<div id="messageUrl" style="display:block;">
		<legend>"VISUALISER" pour vérifier votre composition</legend>
		<input id="visualiser" type=button value="VISUALISER" onclick=window.open(href="' . $redirectionPre . '' . ddc($ClubDom) . '' . ddc($ClubExt) . '&Discipline=' . $discipline . '&Editeur=' . $editeur . '") target="_blank" />
		</div>';
	$RencontreF = ddc($ClubDom) . "" . ddc($ClubExt);
	function nomFormat($a)
	{
		$a = str_replace(' ', '', $a);
		$a = str_replace('x', '', $a);
		return $a;
	}
	if (isset($valid)) {
		echo '
				<div id="messageUrl" style="display:block;">
					<legend>Copier / coller l\'iframe dans votre article pour le web</legend>
					<textarea onclick="this.select();" class="iframearea"> &lt;iframe src="' . $redirectionPre . '' . ddc($ClubDom) . '' . ddc($ClubExt) . '&Discipline=' . $discipline . '&Editeur=' . $editeur . '" border="0" ' . tailleiframe($editeur) . '"&gt;&lt;/iframe></textarea>
				</div>';
		include(dirname(__FILE__) . '/pdf_' . nomFormat($format) . '_Presentation.php');
	};


	?>
	<form id="emailForm" name="emailForm" method="post" action="">
		<legend>"RETOUR" pour modifier votre composition</legend>
		<div>
			<input id='visualiser' type=button value='RETOUR' onclick='history.go(-1)' />
		</div>
	</form>
</body>
<footer style="background-image:url(css/images/signature<?php echo $editeur; ?>.svg);"></footer>

<script language="javascript">
	function change_class() {
		var btn = document.getElementById("verifbdd");
		btn.className = "verifbddchange";
	}
</script>

<script type="text/javascript" src="js/alert.js"></script>
<script type="text/javascript" src="js/afficheUrl.js"></script>
<script type="text/javascript">
	console.log(resultat);
</script>

</html>