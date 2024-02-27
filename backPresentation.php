<?php


$tutu = 'kgkgk';
// $Championnat = urldecode($_GET['Championnat']);
$Championnat = $_POST['Championnat'];
// $Championnat = "Top 14";
// echo $Championnat = $_POST['Championnat'];
$editeur = $_POST['editeur'];
// echo $_POST['choix1'];
// echo $_POST['choix2'];
$RencontreF = $_POST['choix1'] . ' ' . $_POST['choix2'];

// echo '<h1>',$Championnat,'</h1>';
// echo $editeur;
// echo $editeur;


include(dirname(__FILE__) . '/includes/ddc.php');
include(dirname(__FILE__) . '/includes/EquipesStades' . ddc($Championnat) . '.php');
include(dirname(__FILE__) . '/includes/accesserver.php');
include(dirname(__FILE__) . '/includes/texteCoupe.php');
include(dirname(__FILE__) . '/includes/Apostrophe.php');
include(dirname(__FILE__) . '/includes/choixCompetition.php');
include(dirname(__FILE__) . '/includes/Formts.php');
include(dirname(__FILE__) . '/includes/tvs.php');
include(dirname(__FILE__) . '/includes/HdeHeure.php');
echo ddc($RencontreF);

?>
<!DOCTYPE html>
<html>

<head>
	<title>Présentation - Composition des équipes</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="css/roll.css" rel="stylesheet">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
	<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="js/1121_jquery-ui.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.9.1/d3.min.js"></script>
</head>

<body>
	<header>
		<!-- <img class="logoCompetition" src="css/images/<?php echo ddc($Championnat); ?>.png">
		<h1><?php echo $Championnat; ?><br>Présentation</h1> -->
		<!-- <h2>Back-office</h2> -->
		<!-- <hr  class="separation"> -->
	</header>
	<!-- <h2>Rencontre</h2>
	<p id="AlertSel" class="" style="display: block;">Sélectionner vos équipes</p> -->


	<!-- // //////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////        CHOIX DES EQUIPES        ///////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////// // -->


	<!--=================================================
 =            		FORMULAIRE      	       		=
 =================================================-->

	<form id="Formulaire" method="get" action="verifPresentation.php" style="display:block;" name='toto'>
		<input id="discipline" type="text" value="<?php echo $discipline; ?>" style="display:none;">
		<input id="equipeA" type="text" name="RencontreA" value="<?php echo $_POST['choix1']; ?>" style="display:none;">
		<input id="equipeB" type="text" name="RencontreB" value="<?php echo $_POST['choix2']; ?>" style="display:none;">
		<input id="schemaTactiqueA" type="text" name="schemaTactiqueA" value="" style="display:block;">
		<input id="schemaTactiqueB" type="text" name="schemaTactiqueB" value="" style="display:block;">
		<?php echo '<input id="Championnat" name="Championnat" value= "' . $Championnat . '" style="display:none;">' ?>
		<?php echo '<input id="Editeur" name="Editeur" value= "' . $editeur . '" style="display:none;">' ?>

		<?php



		// for ($i = 1; $i <= 12; $i++) {
		//     echo "EquipeDom$i : ${'EquipeDom' . $i}<br>";
		// }

		$nom_fichier = 'Presentation_' . $editeur . '_' . ddc($RencontreF) . '.php';
		/**
		 * * Vérification fichier datas php
		 * #1 si présent on l'include
		 * #2 si absent on crée le fichier php vide
		 * #3 on l'include
		 */

		/**
		 * #1 si présent on l'include
		 */
		if (file_exists('datas/' . $discipline . '/' . $nom_fichier)) {
			echo '<h2>' . "Cette fiche est en cours" . '</h2>';
			echo '</br>';
			// echo $nom_fichier;
			include(dirname(__FILE__) . '/datas/' . $discipline . '/Presentation_' . $editeur . '_' . ddc($RencontreF) . '.php');
		} else {
			/**
			 * #2 si absent on crée le fichier php vide
			 */
			echo '<h2>' . "Vous débutez une nouvelle fiche" . '</h2>';
			echo '</br>';
			// echo $nom_fichier;
			$fichierv = fopen("datas/" . $discipline . "/Presentation_" . $editeur . "_" . ddc($RencontreF) . ".php", 'w+');
			$big = '$DatasFront';
			$texte = ("<?php " . $big . "=array ('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','') ?>");
			fwrite($fichierv, $texte);
			fclose($fichierv);
		}
		/**
		 * #3 on l'include
		 */
		include(dirname(__FILE__) . '/datas/' . $discipline . '/Presentation_' . $editeur . '_' . ddc($RencontreF) . '.php');

		/**
		 * * FIN Vérification fichier datas php
		 */

		/**
		 * * Fonction pour lire un fichier csvs
		 */
		function read($csv)
		{
			$file = fopen($csv, 'r');
			while (!feof($file)) {
				$line[] = fgetcsv($file, 1024);
			}
			fclose($file);
			return $line;
		}
		$csv = dirname(__FILE__) . '/datas/' . $discipline . '/Presentation_' . $editeur . '_' . ddc($RencontreF) . '.csv';
		/**
		 * * Vérification fichier datas csv
		 * #1 si présent on lit
		 * #2 si absent on crée le fichier csv vide
		 * #3 on l'include
		 */
		if (!file_exists($csv)) {
			if ($discipline == 'Foot') {

				for ($i = 1; $i <= 12; $i++) {
					${"EquipeDom" . $i} = '';
					${"EquipeDomCap" . $i} = '';
					${"EquipeDomNum" . $i} = '';
					${"ClubDom"} = '';
				}
				for ($i = 1; $i <= 12; $i++) {
					${"EquipeExt" . $i} = '';
					${"EquipeExtCap" . $i} = '';
					${"EquipeExtNum" . $i} = '';
					${"ClubExt"} = '';
				}
				/**
				 * !REGLER LE PROBLEME DE VARIABLES QUI S'AFFICHENT EN ERREUR
				 */
				$tactiqueA == "w";
				$tactiqueB == "";

				include(dirname(__FILE__) . '/includes/footTactique.php');

				// Cré un nouveau fichier
				// 	::::::::::::::::::::::::::::  CHOIX DU SPORT  :::::::::::::::::::::::::::::::: 
				// if ($discipline == 'Rugby') {
				// 	include(dirname(__FILE__) . '/includes/rugbyTactique.php');
				// }
				// if ($discipline == 'Basket') {
				// 	include(dirname(__FILE__) . '/includes/basketTactique.php');
				// }


				// Paramétrage de l'écriture du futur fichier CSV
				$chemin = 'datas/' . $discipline . '/Presentation_' . $editeur . '_' . ddc($RencontreF) . '.csv';
				$delimiteur = ','; // Pour une tabulation, utiliser $delimiteur = "t";

				$fichier_csv = fopen($chemin, 'w+');

				foreach ($lignes as $ligne) {
					// chaque ligne en cours de lecture est insérée dans le fichier
					// les valeurs présentes dans chaque ligne seront séparées par $delimiteur
					fputcsv($fichier_csv, $ligne, $delimiteur);
				}

				// fermeture du fichier csv
			}
			// fclose($fichier_csv);
			// $csv = read($csv);
		}
		if (file_exists($csv)) {
			$csv = read($csv);
		}
		// echo $csv[2][5];
		// echo '<pre>';
		// print_r($csv);
		// echo '</pre>';
		?>
		<!--=======================================
		=            PARTIE GENERIQUE             =
		========================================-->

		<div class="infosHaut">
			<!-- # -----------  Lieu  ------------->
			<div>
				<label for="Lieu">
					<h3>Lieu</h3>
				</label>

				<input style="width:180px;" value="<?php echo $DatasFront[4]; ?>" type="text" id="Lieu" name="stade" size="15" placeholder="Ex. Stade Matmut Atlantique" required onchange="verifierChamps()" onchange="verifierChamps()">
			</div>
			<div class="boiteHaut">
				<label for="Date">
					<h3>Date</h3>
				</label>
				<input value="<?php echo HdeHeureRevers($DatasFront[0]); ?>" type="date" id="Date" name="Date" size="15" placeholder="" required onchange="verifierChamps()" maxlength="15">
			</div>
			<div class="boiteHaut">
				<label for="Horaire">
					<h3>Horaire</h3>
				</label>
				<input value="<?php echo HdeHeureRevers($DatasFront[1]); ?>" type="time" id="Horaire" name="Horaire" required onchange="verifierChamps()" />
			</div>
			<div class="boiteHaut">
				<label for="Arbitre">
					<h3>Arbitre</h3>
				</label>
				<input value="<?php echo $DatasFront[5]; ?>" type="text" id="Arbitre" name="Arbitre" size="15" placeholder="Entrez le nom de l'arbitre" required onchange="verifierChamps()" maxlength="50">
			</div>
		</div>
		<div class="boiteHaut">
			<h2>Chaînes télé</h2>
			<p id="AlertTv" class="">Choix télés : 2 chaînes max.<br />(Facultatif)</p>
			<div class="ListeTeles">
				<?php
				foreach ($tvs as $tv) {
					echo '<label class="container">
	            	<input onchange="verifierChamps()" ' . chekecTV($DatasFront[24], $DatasFront[25], $tv) . ' class="single-checkbox" type="checkbox" id="sel' . $tv . '" name="tv[]" value="' . $tv . '">
	            	<img class="checkmark choix" src="css/images/tv/' . $tv . '.png" alt="' . $tv . '">
	            	</label>';
				};
				?>
			</div>
		</div>

		<!--====  End of PARTIE GENERIQUE   ====-->

		<!--=======================================
		=            PARTIE EQUIPE 1             =
		========================================-->

		<div class="blocHaut">
			<div class="equipeGauche">
				<h2>Equipe domicile</h2>

				<!-- # -----------  OPTION FOOT SCHEMA  ------------->

				<div id="schemaTac1" style="">
					<h3>Schéma tactique</h3>
					<select id="schemaTacSel1" name="schemaTactique1" class="largeurInput" onchange="affichageSchemaFoot(); verifierChamps();">
						<?php
						foreach ($schemaTactique as $schemaTactiq) {
							if ($schemaTactiq == $DatasFront[28]) {
								$selected_D = ($schemaTactiq == $DatasFront[28]) ? "selected" : "";
								echo '<option value="' . $schemaTactiq . '" id="selDomSchemaA' . $schemaTactiq . '" name="nameDomSchema" ' . $selected_D . ' >' . $schemaTactiq . '</option>';
							} else {

								echo '<option value="' . $schemaTactiq . '" id="selDomSchemaA' . $schemaTactiq . '" name="nameDomSchema" onchange="verifierChamps()">' . $schemaTactiq . '</option>';
							}
						};
						?>
					</select>
				</div>
				<img onselect="affichageSchemaFoot();" id="schemaTacSel1Visu" class="tactiqueGauche" src="" /></td>
				<!-- # -----------  FIN OPTION FOOT SCHEMA  ------------->

				<!-- # -----------  AFFICHAGE CHAMPS JOUEURS EQUIPE 1  ------------->
				<?php
				for ($i = 1; $i < $entrees; $i++) {
					echo '
						<div style="display:flex; justify-content: space-evenly; align-items: stretch;">
							<div class="spacearound" style="order: 1;">
								<label for="EquipeDom' . $i . '"><h4>Nom ' . $i . '</h4></label>
								<input type="text" id="EquipeDom' . $i . '" name="EquipeDom' . $i . '" placeholder="Nom du joueur" required onchange="verifierChamps()" value="' . $csv[$i][5] . '">
							</div>
							<div class="spacearound champsNumeros" style="order: 2;">
								<label for="EquipeDom' . $i . '"><h4>N°</h4></label>
								<input class="champsNumerosInp" type="number" min="0" id="EquipeDomNum' . $i . '" name="EquipeDomNum' . $i . '" style="width:50px;" placeholder="Son n°" required onchange="verifierChamps()" value="' . $csv[$i][7] . '">
							</div>
							<div class="spacearound" style="order: 3;">
								<label for="EquipeDomCap' . $i . '"><h4>Cap.</h4></label>
								<select onchange="verifierChamps()" id="EquipeDomCap' . $i . '" name="EquipeDomCap' . $i . '" style="width:50px; height: 34px;">';

					foreach ($capitaines as $capitaine) {
						if ($csv[$i][6] == "(C)") {
							$selected_D = ($capitaine == "(C)") ? "selected" : "";
							echo '<option value="' . $capitaine . '" id="selDom' . $capitaine, $i . '" name="' . $capitaine . '" ' . $selected_D . ' onchange="verifierChamps()">' . $capitaine . '</option>';
						} else {
							echo '<option value="' . $capitaine . '" id="selDom' . $capitaine, $i . '" name="' . $capitaine . '" onchange="verifierChamps()">' . $capitaine . '</option>';
						}
					};
					echo '</select>
								</div>
							</div>';
				};
				?>
				<!-- # -----------  FIN AFFICHAGE CHAMPS JOUEURS EQUIPE 1  ------------->

				<!-- # -----------  AFFICHAGE CHAMPS ENTRAINEURS || REMPLCANTS EQUIPE 1  ------------->
				<div id="RempEquipe1" class="colChampPlus ListeChampionnats">
					<label for="equipeAS">
						<h3>Entraîneur(s)</h3>
					</label>
					<input required onchange="verifierChamps()" value="<?php echo $DatasFront[6]; ?>" type="text" id="SelectionneursD" name="SelectionneursD" placeholder="ex. Avants : M. x / Arrières : M. y" maxlength="300"><br />
					<label for="RemplacantsD">
						<h3>Remplaçants</h3>
					</label>
					<textarea required onchange="verifierChamps()" maxlength="200" id="RemplacantsD" name="RemplacantsD" cols="20" rows="40" placeholder="200 signes max."><?php echo $DatasFront[7]; ?></textarea>
				</div>

				<!-- # -----------  FIN AFFICHAGE CHAMPS ENTRAINEURS || REMPLCANTS EQUIPE 1  ------------->

				<!-- # -----------  AFFICHAGE CHAMPS CLASSEMENT || POINTS EQUIPE 1  ------------->

				<div class="colChampPlus ListeChampionnats">
					<label for="ClassPtsDom">
						<h3>Classement / pts</h3>
						<p class="ssmarge">(Facultatif)</p>
					</label>
					<input onchange="verifierChamps()" value="<?php echo $DatasFront[26]; ?>" id="ClassPtsDom" type="text" name="ClassPtsScoreDom">
				</div>
				<hr id="filetMob">

				<!-- # -----------  FIN AFFICHAGE CHAMPS CLASSEMENT || POINTS EQUIPE 1  ------------->

				<!-- # -----------  AFFICHAGE SELECT SERIE EN COURS EQUIPE 1  ------------->

				<!-- 	<label for="SerieDom"><h3>Série en cours équipe 1</h3></label>
					<div id="SerieDom" class="flex"> 
    			<?php
				for ($i = 1; $i < 6; $i++) {
					echo '<div>
					<h4 class="match"> Match ' . $i . '</h4>
					<select class="SerieDom" name="SerieDom' . $i . '" onchange="Function(this.value);" required onchange="verifierChamps()">';
					foreach ($series as $serie) {
						echo '<option value="' . @$serie . '" name="' . @$serie . '">' . @$serie . '</option>';
					};
					echo '</select>
					</div>';
				};
				?>
			</div> -->
				<!-- # -----------  FIN AFFICHAGE SELECT SERIE EN COURS EQUIPE 1  ------------->
			</div>

			<!--====  End of PARTIE EQUIPE 1   ====-->

			<!--=======================================
 =            PARTIE EQUIPE 2             =
 =======================================-->
			<div class="equipeDroite">
				<h2>Equipe extérieure</h2>

				<!-- # -----------  OPTION FOOT SCHEMA  ------------->

				<div id="schemaTac2" style="">
					<h3>Schéma tactique</h3>
					<select id="schemaTacSel2" name="schemaTactique2" class="largeurInput" onchange="affichageSchemaFoot(); verifierChamps();">';

						<?php
						foreach ($schemaTactique as $schemaTactiq) {
							if ($schemaTactiq == $DatasFront[29]) {
								$selected_D = ($schemaTactiq == $DatasFront[29]) ? "selected" : "";
								echo '<option value="' . $schemaTactiq . '" id="selDom' . $schemaTactiq . '" name="' . $schemaTactiq . '" ' . $selected_D . ' >' . $schemaTactiq . '</option>';
							} else {

								echo '<option value="' . $schemaTactiq . '" id="selDom' . $schemaTactiq . '" name="' . $schemaTactiq . '" onchange="verifierChamps()">' . $schemaTactiq . '</option>';
							}
						};
						?>
					</select>
				</div>
				<img onselect="affichageSchemaFoot();" id="schemaTacSel2Visu" class="tactiqueDroite" src="" /></td>

				<!-- # -----------  FIN OPTION FOOT SCHEMA  ------------->

				<!-- # -----------  AFFICHAGE CHAMPS JOUEURS EQUIPE 2  ------------->
				<?php
				// <input type="text" id="EquipeExt' . $i . '" name="EquipeExt' . $i . '" placeholder="Nom du joueur" required onchange="verifierChamps()" value="' . $csv[$i + ($entrees - 1)][5] . '">
				for ($i = 1; $i < $entrees; $i++) {
					echo '
						<div class="colChamps">
							<div class="spacearound" style="order: 3;">
								<label for="EquipeExt' . $i . '"><h4>Nom ' . $i . '</h4></label>
								<input type="text" id="EquipeExt' . $i . '" name="EquipeExt' . $i . '" placeholder="Nom du joueur" required onchange="verifierChamps()" value="' . $csv[$i][5] . '">
							</div>
							<div class="spacearound champsNumeros" style="order: 2;">
								<label for="EquipeExt' . $i . '"><h4>N°</h4></label>
								<input class="champsNumerosInp" type="number" min="0" id="EquipeExtNum' . $i . '" name="EquipeExtNum' . $i . '" style="width:50px;" placeholder="Son n°" required onchange="verifierChamps()" value="' . $csv[$i][7] . '">
							</div>
							<div class="spacearound" style="order: 1;">
								<label for="EquipeExtCap' . $i . '"><h4>Cap.</h4></label>
								<select onchange="verifierChamps()" id="EquipeExtCap' . $i . '" name="EquipeExtCap' . $i . '" style="width:50px; height: 34px;">';

					foreach ($capitaines as $capitaine) {
						if ($csv[$i + ($entrees - 1)][6] == "(C)") {
							$selected_E = ($capitaine == "(C)") ? "selected" : "";
							echo '<option value="' . $capitaine . '" id="selDom' . $capitaine, $i . '" name="' . $capitaine . '" ' . $selected_E . ' >' . $capitaine . '</option>';
						} else {
							echo '<option value="' . $capitaine . '" id="selDom' . $capitaine, $i . '" name="' . $capitaine . '" >' . $capitaine . '</option>';
						}
					};
					echo '</select>
									</div>
								</div>';
				};

				?>

				<!-- # -----------  FIN AFFICHAGE CHAMPS JOUEURS EQUIPE 2  ------------->

				<!-- # -----------  AFFICHAGE CHAMPS ENTRAINEURS || REMPLCANTS EQUIPE 2  ------------->

				<div id="ExtRempEquipe2" class="colChampPlus ListeChampionnats">
					<label for="equipeAS">
						<h3>Entraîneur(s)</h3>
					</label>
					<input required onchange="verifierChamps()" value="<?php echo $DatasFront[8]; ?>" type="text" class="champDroite" id="SelectionneursE" name="SelectionneursE" placeholder="ex. Avants : M. x / Arrières : M. y" maxlength="300">
					<label for="RemplacantsE">
						<h3>Remplaçants</h3>
					</label>
					<textarea required onchange="verifierChamps()" maxlength="200" id="RemplacantsE" name="RemplacantsE" cols="20" rows="40" placeholder="200 signes max."><?php echo $DatasFront[9]; ?></textarea>
				</div>
				<!-- # -----------  FIN AFFICHAGE CHAMPS ENTRAINEURS || REMPLCANTS EQUIPE 2  ------------->

				<!-- # -----------  AFFICHAGE CHAMPS CLASSEMENT || POINTS EQUIPE 2  ------------->
				<div class="colChampPlus ListeChampionnats">
					<label for="ClassPtsExt">
						<h3>Classement / pts</h3>
						<p class="ssmarge">(Facultatif)</p>
					</label>
					<input onchange="verifierChamps()" value="<?php echo $DatasFront[27]; ?>" id="ClassPtsExt" type="text" name="ClassPtsScoreExt" class="champDroite">
				</div>
				<hr id="filetMob">
				<!-- # -----------  FIN AFFICHAGE CHAMPS CLASSEMENT || POINTS EQUIPE 2  ------------->

				<!-- # -----------  AFFICHAGE SELECT SERIE EN COURS EQUIPE 2  ------------->

				<!-- <label for="SerieExt"><h3>Série en cours équipe 2</h3></label>
				<div id="SerieExt" class="flex"> 
					<?php
					for ($i = 1; $i < 6; $i++) {
						echo '<div><h4 class="match"> Match ' . $i . '</h4>
							<select class="SerieExt" name="SerieExt' . $i . '" onchange="Function(this.value);" required onchange="verifierChamps()">';
						foreach ($series as $serie) {
							echo '<option value="' . $serie . '" name="' . $serie . '">' . $serie . '</option>';
						};
						echo '</select></div>';
					};
					?>
		    	</div> -->

				<!-- # -----------  FIN AFFICHAGE SELECT SERIE EN COURS EQUIPE 2  ------------->

			</div>
		</div>

		<!--====  End of PARTIE EQUIPE 2   ====-->

		<!--=======================================
		=            CONFRONTATIONS             =
		=======================================-->
		<div class="ListeChampionnats">
			<h2>Les dernières confrontations</h2>
			<div class="flexConfrontations ListeChampionnats">
				<h4 class="label"> Victoire(s) équipe 1</h4>
				<input value="<?php echo $DatasFront[20]; ?>" type="number" min="0" name="VictoiresDom" class="SerieExt" placeholder="ex.3" required onchange="verifierChamps()" maxlength="2">
				<h4 class="label"> Nul(s)</h4>
				<input value="<?php echo $DatasFront[21]; ?>" type="number" min="0" name="Nuls" class="SerieExt" placeholder="ex.3" required onchange="verifierChamps()" maxlength="2">
				<h4 class="label"> Victoire(s) équipe 2</h4>
				<input value="<?php echo $DatasFront[22]; ?>" type="number" min="0" name="VictoiresExt" class="SerieExt" placeholder="ex.3" required onchange="verifierChamps()" maxlength="2">
			</div>
		</div>
		<hr class="separation">

		<!--====  End of CONFRONTATIONS    ====-->

		<!-- # -----------  FORMAT PAR DEFAUT SELECT (à garder) ------------->

		<div style="display: none;">
			<h2 class="match">Format pour le print</h2>
			<?php
			echo '<select class="Format" name="format" onchange="Function(this.value);" required onchange="verifierChamps()">';
			foreach ($formats as $format) {
				echo '<option value="' . $format . '" name="' . $format . '">' . $format . '</option>';
			};
			echo '</select>';
			?>
		</div>

		<!-- # -----------  FIN PAR DEFAUT SELECT  ------------->
		<!-- <input id="validezback" type="submit" value="VALIDEZ"/> -->
		<div id="boutonContainer">
			<!-- <input id="save" type="submit" value="SAVE" /> -->
		</div>
	</form>

	<!--=====================================================
 =            		FIN FORMULAIRE      	       		=
 ======================================================-->



</html>