<?php
$RencontreF=$_GET['front'];
$sport=$_GET['Discipline'];
$editeur = $_GET['Editeur'];
	include (dirname(__FILE__).'/datas/'.$sport.'/CompteRendu_'.$editeur.'_'.$RencontreF.'.php');
	include (dirname(__FILE__).'/includes/ddc.php');
	include (dirname(__FILE__).'/includes/Pourcentage.php');
	include (dirname(__FILE__).'/includes/nbreSpectateurs.php');
	include (dirname(__FILE__).'/includes/lienWeb.php');
	echo'<link rel="stylesheet" type="text/css" href="css/colorSet'.$sport.'.css">';
?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.9.1/d3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/styleF.css">
	 <link rel="stylesheet" type="text/css" href="css/styleb.css">
	<title>Compte-rendu - Composition des équipes</title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=yes"/>
	<meta name="viewport" content="width=device-width"/>
	<meta charset="utf-8">
</head>
<body onload="javascript:accords();">
	<?php echo '<input id="sport" value="'.$sport.'" style="display:none;">'?>
	<?php echo '<input id="fichierCompo" value="datas/'.$sport.'/CompteRendu_'.$editeur.'_'.$RencontreF.'.csv" style="display:none;">'?>

<!--============================================
 =            ****** MOBILE ******            =
 ============================================-->
	<section id="mobile">
		<div class="blocTitre">
			<hr>
			<h2><?php echo $DatasFront[0]; ?></h2>
			<hr>
			<div class="lieu">- <?php echo $DatasFront[4].' à '. $DatasFront[1].' -</div>'; ?><div>
			<div class="lieu"><?php echo nbreSpectateurs($DatasFront[6]); ?></div>
			<div id="meteoTerrain" class="lieu"><?php echo 'Etat du terrain : '.$DatasFront[8].' | Météo : '.$DatasFront[7]; ?></div>
			
			<div class="flex">
				<img class="logoMobile nomargeRight" src="css/images/clubs/<?php echo $sport.'/'.ddc($DatasFront[2]); ?>.png">
				<div class="Score"><?php echo $DatasFront[9]; ?></div>
				<img class="logoMobile nomargeLeft" src="css/images/clubs/<?php echo $sport.'/'.ddc($DatasFront[3]); ?>.png">
			</div>
			<p id="scoreMt" class="miTps">(<?php echo $DatasFront[10]; ?> à la mi-temps)</p>
			<div class="arbitre">- Arbitre : <?php echo $DatasFront[5]; ?> -</div>
			<div id="scoreQt" class="blocQtps">
			<?php
				for ($i=0; $i < 4; $i++) { 
					echo '<div class="Qtps">'.$DatasFront[22+$i].'</div>';
				}
		 	?>
		</div>
			<hr>	
		</div>

	<!--===========================================
 	=            PARTIE SOUS TERRAIN             =
 	============================================-->

		<!-- /*----------  Domicile  ----------*/ -->
		
		<div class="blocInfo">
			<div class="titre"><?php echo $DatasFront[2]; ?></div>
				<div id="entraineursDom" class="bloc">
					<div id="entraineursGM" class="sstitreGauche">uu</div>
					<div id="entraineursDomtxt" class="text"><?php echo $DatasFront[11]; ?></div>
				</div>
				<div id="RemplacementDom" class="bloc">
					<div class="sstitreGauche">Remplacement(s)</div>
					<div id="RemplacementDomtxt" class="text"><?php echo $DatasFront[12]; ?></div>
				</div>
				<hr>
				<div id="ButDom" class="bloc">
					<div id="butGM" class="sstitreGauche">Point(s)</div>
					<div id="ButDomtxt" class="text"><?php echo $DatasFront[15]; ?></div>
				</div>
				<div id="AvertDom" class="bloc">
					<div class="sstitreGauche">Avertissement(s)</div>
					<div id="AvertDomtxt" class="text"><?php echo $DatasFront[17]; ?></div>
				</div>
				<div id="ExpulsionDom" class="bloc">
					<div class="sstitreGauche">Expulsion(s)</div>
					<div id="ExpulsionDomtxt" class="text"><?php echo $DatasFront[19]; ?></div>
				</div>
		</div>
		
		<!-- /*----------  Terrain  ----------*/ -->

		<div class="fond">
			<svg id="compoMobile" height="590" width="310" transform="scale(0.96)">
			<image xlink:href="css/images/FondTerrainMobile<?php echo $sport ?>.svg" width="310"/>
			</svg>
		</div>

		<!-- /*----------  Extérieur  ----------*/ -->
		
		<div class="blocInfo">
			<div class="titre"><?php echo $DatasFront[3]; ?></div>
			<div id="entraineursExt" class="bloc">	
				<div id="entraineursDM" class="sstitreDroite">uu</div>
				<div id="entraineursExttxt" class="text"><?php echo $DatasFront[13]; ?></div>
			</div>
			<div id="RemplacementExt" class="bloc">	
				<div class="sstitreDroite">Remplacement(s)</div>
				<div id="RemplacementExttxt" class="text"><?php echo $DatasFront[14]; ?></div>
			</div>
			<hr>
			<div id="ButExt" class="bloc">
				<div id="butDM" class="sstitreGauche">Point(s)</div>
				<div id="ButExtxt" class="text"><?php echo $DatasFront[16]; ?></div>
			</div>
			<div id="AvertExt" class="bloc">	
				<div class="sstitreDroite">Avertissement(s)</div>
				<div id="AvertExttxt" class="text"><?php echo $DatasFront[18]; ?></div>
			</div>
			<div id="ExpulsionExt" class="bloc">	
				<div class="sstitreDroite">Expulsion(s)</div>
				<div id="ExpulsionExttxt" class="text"><?php echo $DatasFront[20]; ?></div>
			</div>
		</div>
	<!--====  End of PARTIE SOUS TERRAIN   ====-->
	</section>
<!--========  ****** END OF MOBILE ******  ========-->

<!--============================================
 =            ****** DESKTOP ******            =
 ============================================-->
	<section id="desktop">
		<hr>
		<h2><?php echo $DatasFront[0]; ?></h2>
		<hr>
		<div class="lieu">- 
			<?php 
			echo $DatasFront[4].' à '. $DatasFront[1].' -</div>';
			?>
		<div class="flex centrer">
			<div class="lieu"><?php echo nbreSpectateurs($DatasFront[6]); ?></div>
			<div id="meteoTerrain" class="lieu"><?php echo '&nbsp;| Etat du terrain : '.$DatasFront[8].' | Météo : '.$DatasFront[7]; ?></div>
		</div>
		<!-- /*----------  BASKET - Sert à récupérer le nom de l'équipe dom 
				pour js  (couleur fond / texte + logo sur terrain) ----------*/ -->
		<input id="localTeam" value="<?php echo $DatasFront[2]; ?>" style="display:none;">

		<div class="BlocLogosEquipes">
			<span class="BlocEquipeDom">
				<div class="blocInfo">
					<div class="titre">
						<img id="logoGauche" class="logoGauche" src="css/images/clubs/<?php echo $sport.'/'.ddc($DatasFront[2]); ?>.png">
						<div id="EquipeGauche" class="equipeA"><?php echo $DatasFront[2]; ?></div>
					</div>
				</div>
			</span>
			<span  class="titre">
				<div>
					<div class="Score"><?php echo $DatasFront[9]; ?>
					</div>
					<p id="scoreMt" class="miTps">(<?php echo $DatasFront[10]; ?> à la mi-temps)</p>
				</div>
			</span>
			<span class="BlocEquipeExt">
				<div class="blocInfo">
					<div class="titre">
						<div class="equipeB"><?php echo $DatasFront[3]; ?></div>
						<img class="logoDroite" src="css/images/clubs/<?php echo $sport.'/'.ddc($DatasFront[3]); ?>.png">
					</div>
				</div>
			</span>
		</div>
		<div id="scoreQt" class="blocQtps">
			<?php
				for ($i=0; $i < 4; $i++) { 
					echo '<div class="Qtps">'.$DatasFront[22+$i].'</div>';
				}
		 	?>
		</div>
		<div class="arbitre">- Arbitre : <?php echo $DatasFront[5]; ?> -</div>
		<div>  
			<svg id="compoDesktop" height="340" width="650" transform="scale(1)">
			<image xlink:href="css/images/FondTerrainDesktop<?php echo $sport ?>.svg" height="340" width="650"/>
			</svg>
		</div>

	<!--===========================================
	 =            PARTIE SOUS TERRAIN             =
	 ============================================-->

		<div class="BlocSsTerrain">

		<!-- /*----------  Domicile  ----------*/ -->
			
			<div class="InfoSsTerrainGauche">	
				<div id="entraineursDom" class="bloc">
					<div id="entraineursG" class="sstitreGauche">uu</div>
					<div id="entraineursDomtxt" class="text"><?php echo $DatasFront[11]; ?></div>
				</div>
				<div id="RemplacementDom" class="bloc">
					<div class="sstitreGauche">Remplacement(s)</div>
					<div id="RemplacementDomtxt" class="text"><?php echo $DatasFront[12]; ?></div>
				</div>
				<hr>
				<div id="ButDom" class="bloc">
					<div id="butG" class="sstitreGauche">Point(s)</div>
					<div id="ButDomtxt" class="text"><?php echo $DatasFront[15]; ?></div>
				</div>
				<div id="AvertDom" class="bloc">
					<div class="sstitreGauche">Avertissement(s)</div>
					<div id="AvertDomtxt" class="text"><?php echo $DatasFront[17]; ?></div>
				</div>
				<div id="ExpulsionDom" class="bloc">
					<div class="sstitreGauche">Expulsion(s)</div>
					<div id="ExpulsionDomtxt" class="text"><?php echo $DatasFront[19]; ?></div>
				</div>
			</div>

		<!-- /*----------  Extérieur  ----------*/ -->

			<div class="InfoSsTerrainDroite">
				<div id="entraineursExt" class="bloc">	
					<div id="entraineursD" class="sstitreDroite">uu&nbsp;</div>
					<div id="entraineursExttxt" class="text"><?php echo $DatasFront[13]; ?></div>
				</div>
				<div id="RemplacementExt" class="bloc">	
					<div class="sstitreDroite">Remplacement(s)&nbsp;</div>
					<div id="RemplacementExttxt" class="text"><?php echo $DatasFront[14]; ?></div>
				</div>
				<hr>
				<div id="ButExt" class="bloc">
					<div id="butD" class="sstitreDroite">Point(s)&nbsp;</div>
					<div id="ButExtxt" class="text"><?php echo $DatasFront[16]; ?></div>
				</div>
				<div id="AvertExt" class="bloc">	
					<div class="sstitreDroite">Avertissement(s)&nbsp;</div>
					<div id="AvertExttxt" class="text"><?php echo $DatasFront[18]; ?></div>
				</div>
				<div id="ExpulsionExt" class="bloc">	
					<div class="sstitreDroite">Expulsion(s)&nbsp;</div>
					<div id="ExpulsionExttxt" class="text"><?php echo $DatasFront[20]; ?></div>
				</div>
			</div>
		</div>

	<!--====  End of PARTIE SOUS TERRAIN   ====-->
<!--====  ****** END OF DESKTOP ******   ====-->
  
	
	</section>
		<footer style="background-image:url(css/images/signature<?php echo $editeur;?>.png);"></footer>
</body>

	<script type="text/javascript">
		var sport = document.getElementById('sport').value;
		console.log(sport)
		
/*===============================================================
=       Si sport="Basket" -> Masque champ "météo"
=		et "état du terrain            =
================================================================*/
		var meteoTerrain = document.querySelectorAll('#meteoTerrain, #scoreMt');
		var scoreQt = document.querySelectorAll('#scoreQt');
		console.log(meteoTerrain.length);
		
		if (sport === 'Basket') {
			for (var i = 0; i < meteoTerrain.length; i++) {
				meteoTerrain[i].style.display = "none";
			}
		}
		else{
			for (var i = 0; i < scoreQt.length; i++) {
				scoreQt[i].style.display = "none";
			}
		}

/*=====  End of Affichage si texte existe dans le front  ======*/

/*===============================================================
=            Affichage si texte existe dans le front            =
================================================================*/
		var importants = document.querySelectorAll('.text');
		var champsBloc = document.querySelectorAll('.bloc');
		
			for (var i = 0; i < importants.length; i++) {
				console.log(champsBloc[i])
				if (importants[i].innerHTML === ''){
	  				champsBloc[i].style.display = 'none';
	  			}
	  			else{
                	champsBloc[i].style.display = 'block';
				}	
			}		
/*=====  End of Affichage si texte existe dans le front  ======*/
	
	</script>
	<!-- <script src="js/compoFoot.js" type="text/javascript">var dataCompo = datas/'.$sport.'/Rencontre_'.$RencontreF.'.csv" ?></script> -->
	<?php
		echo '<script src="js/compo'.$sport.'.js" type="text/javascript">var dataCompo = datas/'.$sport.'/CompteRendu_'.$RencontreF.'.csv" ?></script>';
	?>

	<script>mobile();</script>
	<script>desktop();</script>
	<script src="js/ddc.js" type="text/javascript">ddc(str);</script>
	<!-- <script src="js/confrontations.js" type="text/javascript"></script> -->
	<script src="js/accords.js" type="text/javascript">accords()</script>
	<script src="js/camelize.js" type="text/javascript">camelize(str)</script>
	<!-- <script src="js/restrictionsFront.js" type="text/javascript">accords()</script> -->
	
</html>