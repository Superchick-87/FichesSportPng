<?php
// Désactive le cache en envoyant des en-têtes HTTP
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies

$RencontreF = $_GET['front'];
$sport = $_GET['Discipline'];
$editeur = $_GET['Editeur'];

// echo $editeur;
include(dirname(__FILE__) . '/datas/' . $sport . '/Presentation_' . $editeur . '_' . $RencontreF . '.php');
include(dirname(__FILE__) . '/includes/ddc.php');
include(dirname(__FILE__) . '/includes/lienWeb.php');
include(dirname(__FILE__) . '/includes/Pourcentage.php');
include(dirname(__FILE__) . '/includes/confrontations.php');
include(dirname(__FILE__) . '/includes/dateToFrench.php');

// include (dirname(__FILE__).'/includes/choixCompetition.php');
echo '<link rel="stylesheet" type="text/css" href="css/colorSet' . $sport . '.css">';

?>
<!DOCTYPE html>
<html>

<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.9.1/d3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/styleF.css">
	<link rel="stylesheet" type="text/css" href="css/styleb.css">
	<title>Composition des équipes</title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
	<meta name="viewport" content="width=device-width" />
	<meta charset="utf-8">
</head>

<body onload="javascript:accords();">
	<?php echo '<input id="sport" value="' . $sport . '" style="display:none;">' ?>
	<?php echo '<input id="fichierCompo" value="datas/' . $sport . '/Presentation_' . $editeur . '_' . $RencontreF . '.csv" style="display:none;">' ?>
	<?php echo '<input id="confrontations" value="' . $DatasFront[23] . '" style="display:none;">' ?>
	<!-- ////////////////////////////////////////////////////
	/////////////////////// MOBILE //////////////////////
	///////////////////////////////////////////////////// -->
	<section id="mobile">
		<div class="blocTitre">
			<hr>
			<h2><?php echo dateToFrench($DatasFront[0], 'l j F'); ?></h2>
			<hr>
			<div class="lieu">
				<?php
				if ((!empty($DatasFront[24])) and (empty($DatasFront[25]))) {
					echo '<img class="tvback" src="css/images/tv/' . $DatasFront[24] . '.png"/>et sur ';
				}
				if ((!empty($DatasFront[24])) and (!empty($DatasFront[25]))) {
					echo '<img class="tvback" src="css/images/tv/' . $DatasFront[24] . '.png"/><img class="tvback" src="css/images/tv/' . $DatasFront[25] . '.png"/>et sur ';
				}
				if ((empty($DatasFront[24])) and (empty($DatasFront[25]))) {
					echo "A suivre sur";
				}
				?>
			</div>
			<div>
				<a href="https://www.<?php echo lienWeb($editeur); ?>.fr/sport/resultats/" rel="nofollow" target="_blank">
					<img class="tvback" src="css/images/tv/<?php echo 'web' . $editeur; ?>.png" />
				</a>
			</div>
			<div>
				<img class="logoMobile" src="css/images/clubs/<?php echo $sport . '/' . ddc($DatasFront[2]); ?>.png">
				<img class="logoMobile" src="css/images/clubs/<?php echo $sport . '/' . ddc($DatasFront[3]); ?>.png">
			</div>
			<div class="lieu"><?php echo $DatasFront[4] . ' à ' . $DatasFront[1]; ?></div>
			<div class="arbitre">- Arbitre : <?php echo $DatasFront[5]; ?> -</div>
			<hr>
		</div>

		<div class="blocInfo">
			<div class="titre"><?php echo $DatasFront[2]; ?></div>
			<div class="classScore"><?php echo $DatasFront[26]; ?></div>
			<div id="entraineursGM" class="sstitre">uu</div>
			<div class="text"><?php echo $DatasFront[6]; ?></div>
			<div class="sstitre">Remplaçants</div>
			<div class="text"><?php echo $DatasFront[7]; ?></div>
		</div>

		<div class="fond">
			<svg id="compoMobile" height="590" width="310" transform="scale(0.96)">
				<image xlink:href="css/images/FondTerrainMobile<?php echo $sport ?>.svg" width="310" />
			</svg>
		</div>

		<div class="blocInfo">
			<div class="titre"><?php echo $DatasFront[3]; ?></div>
			<div class="classScore"><?php echo $DatasFront[27]; ?></div>
			<div id="entraineursDM" class="sstitre">uu</div>
			<div class="text"><?php echo $DatasFront[8]; ?></div>
			<div class="sstitre">Remplaçants</div>
			<div class="text"><?php echo $DatasFront[9]; ?></div>
		</div>
		<hr>
		<!-- <h2>La série en cours</h2>
		<div class="BlocSerieEnCours">	
		</div>
			<div class="flex textS">
				<img class="logogauche" src="css/images/clubs/<?php echo $sport . '/' . ddc($DatasFront[2]); ?>.png">
				<span class="<?php echo ddc($DatasFront[10]); ?>Serie"><?php echo $DatasFront[10][0]; ?></span>
				<span class="<?php echo ddc($DatasFront[11]); ?>Serie"><?php echo $DatasFront[11][0]; ?></span>
				<span class="<?php echo ddc($DatasFront[12]); ?>Serie"><?php echo $DatasFront[12][0]; ?></span>
				<span class="<?php echo ddc($DatasFront[13]); ?>Serie"><?php echo $DatasFront[13][0]; ?></span>
				<span class="<?php echo ddc($DatasFront[14]); ?>Serie"><?php echo $DatasFront[14][0]; ?></span>
			</div>
			<div class="flex textS">
				<img class="logogauche" src="css/images/clubs/<?php echo $sport . '/' . ddc($DatasFront[3]); ?>.png">
				<span class="<?php echo ddc($DatasFront[15]); ?>Serie"><?php echo $DatasFront[15][0]; ?></span>
				<span class="<?php echo ddc($DatasFront[16]); ?>Serie"><?php echo $DatasFront[16][0]; ?></span>
				<span class="<?php echo ddc($DatasFront[17]); ?>Serie"><?php echo $DatasFront[17][0]; ?></span>
				<span class="<?php echo ddc($DatasFront[18]); ?>Serie"><?php echo $DatasFront[18][0]; ?></span>
				<span class="<?php echo ddc($DatasFront[19]); ?>Serie"><?php echo $DatasFront[19][0]; ?></span>
			</div>
			<br/>
			<hr> -->

		<h2 id="texteConfrontationsMob" class="mask"><?php echo confrontations($DatasFront[23], $b); ?></h2>
		<div class="BlocConfrontations">
			<img class="logoGauche" src="css/images/clubs/<?php echo $sport . '/' . ddc($DatasFront[2]); ?>.png">
			<span id="VictoiresDomMob" style="width: <?php echo pourcentage($DatasFront[20], $DatasFront[23]); ?>%;" class="<?php echo ddc($DatasFront[2]); ?> textS StatsConfrontations mask"><?php echo $DatasFront[20]; ?> V</span>
			<span id="NulMob" style="width: <?php echo pourcentage($DatasFront[21], $DatasFront[23]); ?>%;" class="Nul textS StatsConfrontations mask"><?php echo $DatasFront[21]; ?> N</span>
			<span id="VictoiresExtMob" style="width: <?php echo pourcentage($DatasFront[22], $DatasFront[23]); ?>%;" class="<?php echo ddc($DatasFront[3]); ?> textS StatsConfrontations mask"><?php echo $DatasFront[22]; ?> V</span>
			<img class="logoDroite" src="css/images/clubs/<?php echo $sport . '/' . ddc($DatasFront[3]); ?>.png">
		</div>
	</section>

	<!-- ////////////////////////////////////////////////////
	/////////////////////// DESKTOP /////////////////////
	///////////////////////////////////////////////////// -->
	<section id="desktop">
		<hr>
		<h2><?php echo dateToFrench($DatasFront[0], 'l j F'); ?></h2>
		<hr>
		<div class="lieu">
			<?php
			echo $DatasFront[4] . ' à ' . $DatasFront[1] . '</div>
			<div class="lieu">';
			if ((!empty($DatasFront[24])) and (empty($DatasFront[25]))) {
				echo '<img class="tvback" src="css/images/tv/' . $DatasFront[24] . '.png"/>et sur ';
			}
			if ((!empty($DatasFront[24])) and (!empty($DatasFront[25]))) {
				echo '<img class="tvback" src="css/images/tv/' . $DatasFront[24] . '.png"/><img class="tvback" src="css/images/tv/' . $DatasFront[25] . '.png"/>et sur ';
			}
			if ((empty($DatasFront[24])) and (empty($DatasFront[25]))) {
				echo "A suivre sur";
			}
			?>
			<a href="https://www.<?php echo lienWeb($editeur); ?>.fr/sport/resultats/" rel="nofollow" target="_blank">
				<img class="tvback" src="css/images/tv/<?php echo 'web' . $editeur; ?>.png" />
			</a>
		</div>
		<!-- /*----------  BASKET - Sert à récupérer le nom de l'équipe dom 
				pour js  (couleur fond / texte + logo sur terrain) ----------*/ -->
		<input id="localTeam" value="<?php echo $DatasFront[2]; ?>" style="display:none;">

		<div class="BlocLogosEquipes">
			<span class="BlocEquipeDom">
				<div class="blocInfo">
					<div class="titre">
						<img id="logoGauche" class="logoGauche" src="css/images/clubs/<?php echo $sport . '/' . ddc($DatasFront[2]); ?>.png">
						<div id="EquipeGauche" class="equipeA"><?php echo $DatasFront[2]; ?><div class="classScore"><?php echo $DatasFront[26]; ?></div>
						</div>
					</div>
				</div>
			</span>
			<span class="BlocEquipeExt">
				<div class="blocInfo">
					<div class="titre">
						<div class="equipeB"><?php echo $DatasFront[3]; ?><p class="classScore"><?php echo $DatasFront[27]; ?></p>
						</div>
						<img class="logoDroite" src="css/images/clubs/<?php echo $sport . '/' . ddc($DatasFront[3]); ?>.png">
					</div>
				</div>
			</span>
		</div>
		<div class="arbitre">- Arbitre : <?php echo $DatasFront[5]; ?> -</div>
		<!-- <a href="https://www.mollat.com/recherche?requete=rugby%20japon%202019" rel="nofollow" target="_blank"><img src="css/images/pubhs.gif"></a> -->
		<div>
			<svg id="compoDesktop" height="340" width="650" transform="scale(1)">
				<image xlink:href="css/images/FondTerrainDesktop<?php echo $sport ?>.svg" height="340" width="650" />
			</svg>
		</div>
		<div class="BlocSsTerrain">
			<div class="InfoSsTerrainGauche">
				<div id="entraineursG" class="sstitreGauche">uu</div>
				<div class="text"><?php echo $DatasFront[6]; ?></div>
				<div class="sstitreGauche">Remplaçants</div>
				<div class="text"><?php echo $DatasFront[7]; ?></div>
			</div>
			<div class="InfoSsTerrainDroite">
				<div id="entraineursD" class="sstitreDroite">uu</div>
				<div class="text"><?php echo $DatasFront[8]; ?></div>
				<div class="sstitreDroite">Remplaçants</div>
				<div class="text"><?php echo $DatasFront[9]; ?></div>
			</div>
		</div>
		<!-- <div class="BlocSerieEnCours">
			<hr class="TraitTitreSerie"><h2>La série en cours</h2><hr class="TraitTitreSerie">
		</div>
		<div  class="textS">
			<div class="flex">	
				<span class="<?php echo ddc($DatasFront[10]); ?>Serie"><?php echo $DatasFront[10][0]; ?></span>
				<span class="<?php echo ddc($DatasFront[11]); ?>Serie"><?php echo $DatasFront[11][0]; ?></span>
				<span class="<?php echo ddc($DatasFront[12]); ?>Serie"><?php echo $DatasFront[12][0]; ?></span>
				<span class="<?php echo ddc($DatasFront[13]); ?>Serie"><?php echo $DatasFront[13][0]; ?></span>
				<span class="<?php echo ddc($DatasFront[14]); ?>Serie"><?php echo $DatasFront[14][0]; ?></span>
			</div>
			<div class="flex">
				<span class="<?php echo ddc($DatasFront[15]); ?>Serie"><?php echo $DatasFront[15][0]; ?></span>
				<span class="<?php echo ddc($DatasFront[16]); ?>Serie"><?php echo $DatasFront[16][0]; ?></span>
				<span class="<?php echo ddc($DatasFront[17]); ?>Serie"><?php echo $DatasFront[17][0]; ?></span>
				<span class="<?php echo ddc($DatasFront[18]); ?>Serie"><?php echo $DatasFront[18][0]; ?></span>
				<span class="<?php echo ddc($DatasFront[19]); ?>Serie"><?php echo $DatasFront[19][0]; ?></span>
			</div>
		</div> -->

		<div id="titreConfrontationsDesk" class="BlocTitreConfrontations mask">
			<hr class="TraitTitreConfrontations">
			<h2 id="texteConfrontationsDesk"><?php echo confrontations($DatasFront[23], $b); ?></h2>
			<hr class="TraitTitreConfrontations">
		</div>
		<div class="BlocConfrontations">
			<img class="logoGauche" src="css/images/clubs/<?php echo $sport . '/' . ddc($DatasFront[2]); ?>.png">
			<span id="VictoiresDomDesk" style="width: <?php echo pourcentage($DatasFront[20], $DatasFront[23]); ?>%;" class="<?php echo ddc($DatasFront[2]); ?> stats textS mask"><?php echo $DatasFront[20]; ?> V</span>
			<span id="NulDesk" style="width: <?php echo pourcentage($DatasFront[21], $DatasFront[23]); ?>%;" class="Nul stats textS mask"><?php echo $DatasFront[21]; ?> N</span>
			<span id="VictoiresExtDesk" style="width: <?php echo pourcentage($DatasFront[22], $DatasFront[23]); ?>%;" class="<?php echo ddc($DatasFront[3]); ?> stats textS mask"><?php echo $DatasFront[22]; ?> V</span>
			<img class="logoDroite" src="css/images/clubs/<?php echo $sport . '/' . ddc($DatasFront[3]); ?>.png">
		</div>

	</section>
	<footer style="background-image:url(css/images/signature<?php echo $editeur; ?>.svg);"></footer>
</body>
<script type="text/javascript">
	var sport = document.getElementById('sport').value;
	console.log(sport)
</script>
<!-- <script src="js/compoFoot.js" type="text/javascript">var dataCompo = datas/'.$sport.'/Rencontre_'.$RencontreF.'.csv" ?></script> -->
<?php
echo '<script src="js/compo' . $sport . '.js" type="text/javascript">var dataCompo = datas/' . $sport . '/Presentation_' . $RencontreF . '.csv" ?></script>';

?>

<script>
	mobile();
</script>
<script>
	desktop();
</script>
<script src="js/ddc.js" type="text/javascript">
	ddc(str);
</script>
<script src="js/confrontations.js" type="text/javascript"></script>
<script type="text/javascript">
	effacePortion();
</script>
<script type="text/javascript">
	messageConfontation();
</script>
<script src="js/accords.js" type="text/javascript">
	accords()
</script>
<script src="js/camelize.js" type="text/javascript">
	camelize(str)
</script>

</html>