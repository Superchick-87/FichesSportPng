<?php
$tutu = 'kgkgk';
$Championnat = $_POST['Championnat'];
$editeur = $_POST['editeur'];
// echo $editeur;
echo $_POST['choix1'];
echo $_POST['choix2'];
$RencontreF = $_POST['choix1'] . ' ' . $_POST['choix2'];

include(dirname(__FILE__) . '/includes/ddc.php');
include(dirname(__FILE__) . '/includes/EquipesStades' . ddc($Championnat) . '.php');
include(dirname(__FILE__) . '/includes/accesserver.php');
include(dirname(__FILE__) . '/includes/texteCoupe.php');
include(dirname(__FILE__) . '/includes/Apostrophe.php');
include(dirname(__FILE__) . '/includes/choixCompetition.php');
include(dirname(__FILE__) . '/includes/Formts.php');
include(dirname(__FILE__) . '/includes/HdeHeure.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Compte rendu - Composition des équipes</title>
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

	</header>
	<!-- <h2>Rencontre</h2>
	<p id="AlertSel" class="" style="display: block;">Sélectionner vos équipes</p> -->


	<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////        CHOIX DES EQUIPES        ///////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
	<input id="discipline" type="text" value="<?php echo $discipline; ?>" style="display:block;">

	<!--=================================================
 =            		FORMULAIRE      	       		=
 =================================================-->

	<form id="Formulaire" method="get" action="verifCompteRendu.php" style="display:block;">
		<input id="equipeA" type="text" name="RencontreA" value="<?php echo $_POST['choix1']; ?>" style="display:none;">
		<input id="equipeB" type="text" name="RencontreB" value="<?php echo $_POST['choix2']; ?>" style="display:none;">
		<input id="schemaTactiqueA" type="text" name="schemaTactiqueA" value="" style="display:block;">
		<input id="schemaTactiqueB" type="text" name="schemaTactiqueB" value="" style="display:block;">
		<?php echo '<input id="Championnat" name="Championnat" value= "' . $Championnat . '" style="display:none;">' ?>
		<?php echo '<input id="Editeur" name="Editeur" value= "' . $editeur . '" style="display:none;">' ?>

		<?php
		$nom_fichier = 'CompteRendu_' . $editeur . '_' . ddc($RencontreF) . '.php';
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
			include(dirname(__FILE__) . '/datas/' . $discipline . '/CompteRendu_' . $editeur . '_' . ddc($RencontreF) . '.php');
		} else {
			/**
			 * #2 si absent on crée le fichier php vide
			 */
			echo '<h2>' . "Vous débutez une nouvelle fiche" . '</h2>';
			echo '</br>';
			// echo $nom_fichier;
			$fichierv = fopen("datas/" . $discipline . "/CompteRendu_" . $editeur . "_" . ddc($RencontreF) . ".php", 'w+');
			$big = '$DatasFront';
			$texte = ("<?php " . $big . "=array ('','','','','','','','','','','','','','','','','','','','','','','','','','','') ?>");
			fwrite($fichierv, $texte);
			fclose($fichierv);
		}
		/**
		 * #3 on l'include
		 */
		include(dirname(__FILE__) . '/datas/' . $discipline . '/CompteRendu_' . $editeur . '_' . ddc($RencontreF) . '.php');

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
		$csv = dirname(__FILE__) . '/datas/' . $discipline . '/CompteRendu_' . $editeur . '_' . ddc($RencontreF) . '.csv';
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
				// $tac == "init";
				// $tactiqueB = "B";
				include(dirname(__FILE__) . '/includes/footTactique.php');
				// Paramétrage de l'écriture du futur fichier CSV
				$chemin = 'datas/' . $discipline . '/CompteRendu_' . $editeur . '_' . ddc($RencontreF) . '.csv';
				$delimiteur = ','; // Pour une tabulation, utiliser $delimiteur = "t";

				$fichier_csv = fopen($chemin, 'w+');

				foreach ($lignes as $ligne) {
					// chaque ligne en cours de lecture est insérée dans le fichier
					// les valeurs présentes dans chaque ligne seront séparées par $delimiteur
					fputcsv($fichier_csv, $ligne, $delimiteur);
				}
				// fermeture du fichier csv
				fclose($fichier_csv);
			}
		} else {
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
		<!-- # -----------  Scrore final  ------------->
		<div class="infosHaut">
			<div>
				<label for="ScoreFinalDom">
					<h3>Score final</h3>
				</label>
				<input class="score" style="width:50px;" value="<?php echo explode("-", $DatasFront[9])[0]; ?>" type="number" min="0" id="ScoreFinalDom" name="ScoreFinalDom" required onchange="verifierChamps()">
				<input class="score" style="width:50px;" value="<?php echo explode("-", $DatasFront[9])[1]; ?>" type="number" min="0" id="ScoreFinalExt" name="ScoreFinalExt" required onchange="verifierChamps()">
			</div>
		</div>
		<div class="infosHaut">
			<!-- # -----------  Lieu  ------------->
			<div>
				<label for="Lieu">
					<h3>Lieu</h3>
				</label>
				<input style="width:180px;" value="<?php echo $DatasFront[4]; ?>" type="text" id="Lieu" name="stade" size="15" placeholder="Ex. Stade Matmut Atlantique" required onchange="verifierChamps()">
			</div>
			<!-- # -----------  Date | Horaire | Arbitre | Spectateurs  ------------->
			<div>
				<label for="Date">
					<h3>Date</h3>
				</label>
				<input value="<?php echo HdeHeureRevers($DatasFront[0]); ?>" type="date" id="Date" name="Date" size="15" placeholder="" maxlength="15" required onchange="verifierChamps()">
			</div>
			<div>
				<label for="Horaire">
					<h3>Horaire</h3>
				</label>
				<input value="<?php echo HdeHeureRevers($DatasFront[1]); ?>" type="time" id="Horaire" name="Horaire" required onchange="verifierChamps()" />
			</div>
			<div>
				<label for="Arbitre">
					<h3>Arbitre</h3>
				</label>
				<input value="<?php echo $DatasFront[5]; ?>" style="width:180px;" type="text" id="Arbitre" name="Arbitre" size="15" placeholder="Entrez le nom de l'arbitre" maxlength="50" required onchange="verifierChamps()">
			</div>
			<div>
				<label for="Spectateurs">
					<h3>Spectateurs</h3>
				</label>
				<input value="<?php echo $DatasFront[6]; ?>" style="width:80px;" type="number" id="Spectateurs" name="Spectateurs" size="15" placeholder="Entrez le nombre de spectateurs" maxlength="50" required onchange="verifierChamps()">
			</div>
		</div>

		<!-- # -----------  Météo / Terrain  ------------->
		<div id="meteoTerrain" class="infosHaut">
			<div>
				<label for="Meteo">
					<h3>Météo</h3>
				</label>
				<input value="<?php echo $DatasFront[7]; ?>" class="Meteo" style="width:180px;" type="text" id="Meteo" name="Meteo" required onchange="verifierChamps()">
			</div>
			<div>
				<label for="Terrain">
					<h3>Terrain</h3>
				</label>
				<input value="<?php echo $DatasFront[8]; ?>" class="Terrain" style="width:180px;" type="text" id="Terrain" name="Terrain" required onchange="verifierChamps()">
			</div>
		</div>

		<!-- # -----------  Scrore mi-temps Foot | Rugby ------------->
		<div id="scoreMt" class="infosHaut">
			<div>
				<label for="ScoreMitpsDom">
					<h3>Score à la mi-temps</h3>
				</label>
				<input class="score rf" style="width:50px;" value="<?php echo explode("-", $DatasFront[10])[0]; ?>" type="number" min="0" id="ScoreMitpsDom" name="ScoreMitpsDom" required onchange="verifierChamps()">
				<input class="score rf" style="width:50px;" value="<?php echo explode("-", $DatasFront[10])[1]; ?>" type="number" min="0" id="ScoreMitpsExt" name="ScoreMitpsExt" required onchange="verifierChamps()">
			</div>
		</div>
		<div id="scoreQt" class="infosHaut">
			<div>
				<label for="ScoreQt1">
					<h3>Score QT 1</h3>
				</label>
				<input class="score b" style="width:50px;" type="number" min="0" id="ScoreQt1Dom" name="ScoreQt1Dom" required onchange="verifierChamps()">
				<input class="score b" style="width:50px;" type="number" min="0" id="ScoreQt1Ext" name="ScoreQt1Ext" required onchange="verifierChamps()">
			</div>
			<div>
				<label for="ScoreQt2">
					<h3>Score QT 2</h3>
				</label>
				<input class="score b" style="width:50px;" type="number" min="0" id="ScoreQt2Dom" name="ScoreQt2Dom" required onchange="verifierChamps()">
				<input class="score b" style="width:50px;" type="number" min="0" id="ScoreQt2Ext" name="ScoreQt2Ext" required onchange="verifierChamps()">
			</div>
			<div>
				<label for="ScoreQt3">
					<h3>Score QT 3</h3>
				</label>
				<input class="score b" style="width:50px;" type="number" min="0" id="ScoreQt3Dom" name="ScoreQt3Dom" required onchange="verifierChamps()">
				<input class="score b" style="width:50px;" type="number" min="0" id="ScoreQt3Ext" name="ScoreQt3Ext" required onchange="verifierChamps()">
			</div>
			<div>
				<label for="ScoreQt4">
					<h3>Score QT 4</h3>
				</label>
				<input class="score b" style="width:50px;" type="number" min="0" id="ScoreQt4Dom" name="ScoreQt4Dom" required onchange="verifierChamps()">
				<input class="score b" style="width:50px;" type="number" min="0" id="ScoreQt4Ext" name="ScoreQt4Ext" required onchange="verifierChamps()">
			</div>
		</div>



		<!--====  End of PARTIE GENERIQUE   ====-->

		<!-- <div style="display: flex; justify-content: space-around;"> -->

		<!--=======================================
 =            PARTIE EQUIPE 1             =
 ========================================-->
		<hr class="separation">
		<div class="blocHaut">
			<div class="equipeGauche">
				<h2>Equipe domicile</h2>

				<!-- # -----------  OPTION FOOT SCHEMA  ------------->

				<div id="schemaTac1" style="">
					<h3>Schéma tactique</h3>
					<select id="schemaTacSel1" name="schemaTactique1" class="largeurInput" onchange="affichageSchemaFoot(); verifierChamps();">
						<?php
						foreach ($schemaTactique as $schemaTactiq) {
							if ($schemaTactiq == $DatasFront[25]) {
								$selected_D = ($schemaTactiq == $DatasFront[25]) ? "selected" : "";
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
								<select id="EquipeDomCap' . $i . '" name="EquipeDomCap' . $i . '" style="width:50px; height: 34px;" onchange="verifierChamps()">';

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
					<div id="RempEquipe1">
						<label for="SelectionneursD">
							<h3>Entraîneur(s)</h3>
						</label>
						<input type="text" id="SelectionneursD" value="<?php echo $DatasFront[11]; ?>" name="SelectionneursD" placeholder="ex. Avants : M. x / Arrières : M. y" maxlength="300" required onchange="verifierChamps()"><br />
						<label for="RemplacantsD">
							<h3>Remplacement(s)</h3>
						</label>
						<textarea maxlength="550" id="RemplacantsD" name="RemplacantsD" cols="20" rows="40" placeholder="" onchange="verifierChamps()"><?php echo $DatasFront[12]; ?></textarea><br />
					</div>

					<!-- # -----------  Champs buteurs équipe 1  ------------->

					<div id="buteursEquipe1">
						<label for="buteursD">
							<h3><?php echo disciplineButsPts($Championnat); ?></h3>
						</label>
						<textarea id="buteursD" name="buteursD" cols="20" rows="40" placeholder="" maxlength="550" onchange="verifierChamps()"><?php echo $DatasFront[15]; ?></textarea><br />
					</div>
					<!-- # -----------  Champs jaunes équipe 1  ------------->

					<div id="jaunesDom">
						<label for="jaunesD">
							<h3>Avertissement(s)</h3>
						</label>
						<textarea id="jaunesD" name="jaunesD" cols="20" rows="40" placeholder="" maxlength="550" onchange="verifierChamps()"><?php echo $DatasFront[17]; ?></textarea><br />
					</div>

					<!-- # -----------  Champs rouges équipe 1  ------------->

					<div id="rougesDom">
						<label for="rougesD">
							<h3>Expulsions(s)</h3>
						</label>
						<textarea id="rougesD" name="rougesD" cols="20" rows="40" placeholder="" maxlength="550" onchange="verifierChamps()"><?php echo $DatasFront[19]; ?></textarea><br />
					</div>
					<!-- </div> -->
				</div>
				<hr id="filetMob">
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
							if ($schemaTactiq == $DatasFront[26]) {
								$selected_D = ($schemaTactiq == $DatasFront[26]) ? "selected" : "";
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
				echo $i;
				// <input type="text" id="EquipeExt' . $i . '" name="EquipeExt' . $i . '" placeholder="Nom du joueur" required onchange="verifierChamps()" value="' . $csv[$i + ($entrees - 1)][5] . '">
				for ($i = 1; $i < $entrees; $i++) {
					echo '
						<div class="colChamps">
							<div class="spacearound" style="order: 3;">
								<label for="EquipeExt' . $i . '"><h4>Nom ' . $i . '</h4></label>
								<input type="text" id="EquipeExt' . $i . '" name="EquipeExt' . $i . '" placeholder="Nom du joueur" required onchange="verifierChamps()" value="' . $csv[$i + ($entrees - 1)][5] . '">
							</div>
							<div class="spacearound champsNumeros" style="order: 2;">
								<label for="EquipeExt' . $i . '"><h4>N°</h4></label>
								<input class="champsNumerosInp" type="number" min="0" id="EquipeExtNum' . $i . '" name="EquipeExtNum' . $i . '" style="width:50px;" placeholder="Son n°" required onchange="verifierChamps()" value="' . $csv[$i + ($entrees - 1)][7] . '">
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
				<div class="colChampPlus ListeChampionnats">
					<div id="ExtRempEquipe2">
						<label for="equipeAS">
							<h3>Entraîneur(s)</h3>
						</label>
						<input type="text" class="champDroite" id="SelectionneursE" value="<?php echo $DatasFront[13]; ?>" name="SelectionneursE" placeholder="ex. Avants : M. x / Arrières : M. y" maxlength="300" required onchange="verifierChamps()"><br />
						<label for="RemplacantsE">
							<h3>Remplacement(s)</h3>
						</label>
						<textarea maxlength="550" id="RemplacantsE" name="RemplacantsE" cols="20" rows="40" placeholder="" onchange="verifierChamps()"><?php echo $DatasFront[14]; ?></textarea><br />
					</div>

					<!-- # -----------  Champs buteurs équipe 2  ------------->

					<div id="buteursEquipe2">
						<label for="buteursE">
							<h3><?php echo disciplineButsPts($Championnat); ?></h3>
						</label>
						<textarea maxlength="550" id="buteursE" name="buteursE" cols="20" rows="40" placeholder="" onchange="verifierChamps()"><?php echo $DatasFront[16]; ?></textarea><br />
					</div>
					<!-- # -----------  Champs jaunes équipe 2  ------------->

					<div id="jaunesExt">
						<label for="jaunesE">
							<h3>Avertissement(s)</h3>
						</label>
						<textarea maxlength="550" id="jaunesE" name="jaunesE" cols="20" rows="40" placeholder="" onchange="verifierChamps()"><?php echo $DatasFront[18]; ?></textarea><br />
					</div>

					<!-- # -----------  Champs rouges équipe 2  ------------->

					<div id="rougesExt">
						<label for="rougesE">
							<h3>Expulsions(s)</h3>
						</label>
						<textarea maxlength="550" id="rougesE" name="rougesE" cols="20" rows="40" placeholder="" onchange="verifierChamps()"><?php echo $DatasFront[20]; ?></textarea><br />
					</div>
					<!-- # -----------  FIN AFFICHAGE CHAMPS ENTRAINEURS || REMPLCANTS EQUIPE 2  ------------->
				</div>
			</div>
		</div>
		</div>

		<!--====  End of PARTIE EQUIPE 2   ====-->

		<!--=======================================
 =            CONFRONTATIONS             =
 =======================================-->

		<!--  <h3>Les dernières confrontations entre les deux équipes</h3>
		 <div class="flexConfrontations">
		 	<h4> Victoire(s) équipe 1</h4>
		 	<input type="number" min="0" name="VictoiresDom" class="SerieExt" placeholder="ex.3" required maxlength="2">
		 	<h4> Nul(s)</h4>
		 	<input type="number" min="0" name="Nuls" class="SerieExt" placeholder="ex.3" required maxlength="2">
		 	<h4> Victoire(s) équipe 2</h4>
		 	<input type="number" min="0" name="VictoiresExt" class="SerieExt" placeholder="ex.3" required maxlength="2">
		 </div> -->

		<!--====  End of CONFRONTATIONS    ====-->

		<!-- # -----------  FORMAT PAR DEFAUT SELECT (à garder) ------------->
		<hr class="separation">
		<div style="display: none;">
			<h2 class="match">Format pour le print</h2>
			<?php
			echo '<select class="Format" name="format" onchange="Function(this.value);" required>';
			foreach ($formats as $format) {
				echo '<option value="' . $format . '" name="' . $format . '">' . $format . '</option>';
			};
			echo '</select>';
			?>
		</div>
		<br>
		<!-- # -----------  FIN PAR DEFAUT SELECT  ------------->

		<!-- <input id="validezback" type="submit" value="VALIDEZ" /> -->
		<div id="boutonContainer">
		</div>
	</form>

	<!--=====================================================
 =            		FIN FORMULAIRE      	       		=
 ======================================================-->

</body>


<script type="text/javascript">
	$('.single-checkbox').on('change', function() {
		if ($('.single-checkbox:checked').length > 2) {
			this.checked = false;
		}
	});
</script>
<!-- <script src="js/camelize.js" type="text/javascript"></script>
<script src="js/affichageSchemaFoot.js" type="text/javascript"></script>
<script src="js/menuDeroulant.js" type="text/javascript"></script>
<script>
	menuDeroulantBis();
</script>
<script>
	menuDeroulant();
</script>
<script>
	menuDeroulant_M();
</script> -->
<!-- <script src="js/restrictionsFormulaire.js" type="text/javascript"></script>
<script>
	displayChampNum();
</script>
<script>
	displayScoreBasket();
</script> -->
<script>
	const element_D = document.getElementById('choix_D');
	const element_M = document.getElementById('choix_M');
	if (screen.width < 580) {
		element_D.remove();
	} else {
		element_M.remove();
	}
	console.log(screen.width);
	// function screem(){
	// }
</script>

</html>