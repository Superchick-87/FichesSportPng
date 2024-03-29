<?php
$tutu = 'kgkgk';
$Championnat = $_POST['Championnat'];
$editeur = $_POST['editeur'];
$RencontreF = $_POST['choix1'] . ' ' . $_POST['choix2'];

$ClubDom = $_POST['choix1'];
$ClubExt = $_POST['choix2'];
echo $ClubDom;
echo $ClubExt;

$typeFiche = $_POST['typeFiche'];
echo $typeFiche;
include(dirname(__FILE__) . '/includes/ddc.php');
include(dirname(__FILE__) . '/includes/EquipesStades' . ddc($Championnat) . '.php');
include(dirname(__FILE__) . '/includes/accesserver.php');
include(dirname(__FILE__) . '/includes/texteCoupe.php');
include(dirname(__FILE__) . '/includes/Apostrophe.php');
include(dirname(__FILE__) . '/includes/choixCompetition.php');
include(dirname(__FILE__) . '/includes/Formts.php');
include(dirname(__FILE__) . '/includes/tvs.php');
include(dirname(__FILE__) . '/includes/HdeHeure.php');
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
	<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="js/1121_jquery-ui.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.9.1/d3.min.js"></script>
</head>

<body>
	<header>
	</header>
	<!--=================================================
 =            		FORMULAIRE      	       		=
 =================================================-->

	<form id="Formulaire" method="get" action="verifPresentation.php" style="display:block;" name='toto'>
		<input id="discipline" type="text" value="<?php echo $discipline; ?>" style="display:none;">
		<input id="equipeA" type="text" name="RencontreA" value="<?php echo $_POST['choix1']; ?>" style="display:none;">
		<input id="equipeB" type="text" name="RencontreB" value="<?php echo $_POST['choix2']; ?>" style="display:none;">
		<input id="schemaTactiqueA" type="text" name="schemaTactiqueA" value="" style="display:none;">
		<input id="schemaTactiqueB" type="text" name="schemaTactiqueB" value="" style="display:none;">
		<?php echo '<input id="Championnat" name="Championnat" value= "' . $Championnat . '" style="display:none;">' ?>
		<?php echo '<input id="Editeur" name="Editeur" value= "' . $editeur . '" style="display:none;">' ?>

		<?php
		/**
		 * * Include sert à l'initialisation ou à la lecture des fichiers datas :
		 * @ csv
		 * £ php
		 */
		include(dirname(__FILE__) . '/includes/datasCreateOrDone.php');
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

				<input style="width:180px;" value="<?php echo @$DatasFront[4]; ?>" type="text" id="Lieu" name="stade" size="15" placeholder="Ex. Stade Matmut Atlantique" required onchange="verifierChamps()">
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
				<input value="<?php echo @$DatasFront[5]; ?>" type="text" id="Arbitre" name="Arbitre" size="15" placeholder="Entrez le nom de l'arbitre" required onchange="verifierChamps()" maxlength="50">
			</div>
		</div>
		<div class="boiteHaut">
			<h2>Chaînes télé</h2>
			<p id="AlertTv" class="">Choix télés : 2 chaînes max.<br />(Facultatif)</p>
			<div class="ListeTeles">
				<?php
				foreach ($tvs as $tv) {
					echo '<label class="container">
	            	<input onchange="verifierChamps()" ' . chekecTV(@$DatasFront[24], @$DatasFront[25], $tv) . ' class="single-checkbox" type="checkbox" id="sel' . $tv . '" name="tv[]" value="' . $tv . '">
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
					<input required onchange="verifierChamps()" value="<?php echo @$DatasFront[6]; ?>" type="text" id="SelectionneursD" name="SelectionneursD" placeholder="ex. Avants : M. x / Arrières : M. y" maxlength="300"><br />
					<label for="RemplacantsD">
						<h3>Remplaçants</h3>
					</label>
					<textarea required onchange="verifierChamps()" maxlength="200" id="RemplacantsD" name="RemplacantsD" cols="20" rows="40" placeholder="200 signes max."><?php echo @$DatasFront[7]; ?></textarea>
				</div>

				<!-- # -----------  FIN AFFICHAGE CHAMPS ENTRAINEURS || REMPLCANTS EQUIPE 1  ------------->

				<!-- # -----------  AFFICHAGE CHAMPS CLASSEMENT || POINTS EQUIPE 1  ------------->

				<div class="colChampPlus ListeChampionnats">
					<label for="ClassPtsDom">
						<h3>Classement / pts</h3>
						<p class="ssmarge">(Facultatif)</p>
					</label>
					<input onchange="verifierChamps()" value="<?php echo @$DatasFront[26]; ?>" id="ClassPtsDom" type="text" name="ClassPtsScoreDom">
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

				<div id="ExtRempEquipe2" class="colChampPlus ListeChampionnats">
					<label for="equipeAS">
						<h3>Entraîneur(s)</h3>
					</label>
					<input required onchange="verifierChamps()" value="<?php echo @$DatasFront[8]; ?>" type="text" class="champDroite" id="SelectionneursE" name="SelectionneursE" placeholder="ex. Avants : M. x / Arrières : M. y" maxlength="300">
					<label for="RemplacantsE">
						<h3>Remplaçants</h3>
					</label>
					<textarea required onchange="verifierChamps()" maxlength="200" id="RemplacantsE" name="RemplacantsE" cols="20" rows="40" placeholder="200 signes max."><?php echo @$DatasFront[9]; ?></textarea>
				</div>
				<!-- # -----------  FIN AFFICHAGE CHAMPS ENTRAINEURS || REMPLCANTS EQUIPE 2  ------------->

				<!-- # -----------  AFFICHAGE CHAMPS CLASSEMENT || POINTS EQUIPE 2  ------------->
				<div class="colChampPlus ListeChampionnats">
					<label for="ClassPtsExt">
						<h3>Classement / pts</h3>
						<p class="ssmarge">(Facultatif)</p>
					</label>
					<input onchange="verifierChamps()" value="<?php echo @$DatasFront[27]; ?>" id="ClassPtsExt" type="text" name="ClassPtsScoreExt" class="champDroite">
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
		<div id="boutonContainer">
		</div>
	</form>

	<!--=====================================================
 =            		FIN FORMULAIRE      	       		=
 ======================================================-->



</html>