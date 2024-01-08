<?php
session_start();
if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
}
?>
<?php
	$tutu = 'kgkgk';
	$Championnat = urldecode($_GET['Championnat']);
	$editeur = $_GET['editeur'];
	// echo $editeur;
	include (dirname(__FILE__).'/includes/ddc.php');
	include (dirname(__FILE__).'/includes/EquipesStades'.ddc($Championnat).'.php');
	include (dirname(__FILE__).'/includes/accesserver.php');
	include (dirname(__FILE__).'/includes/texteCoupe.php');
	include (dirname(__FILE__).'/includes/Apostrophe.php');
	include (dirname(__FILE__).'/includes/choixCompetition.php');
	include (dirname(__FILE__).'/includes/Formts.php');
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
	<!-- /**
     * Ligne à garder pour V2 - voir bas pour l'autoplementation
     * <body onload="javascript:affichageSchemaFoot(); menuDeroulant();autocompletion();">
     */ -->
	<body onload="javascript:affichageSchemaFoot(); menuDeroulant(); menuDeroulant_M();">
	<header>
		<img class="logoCompetition" src="css/images/<?php echo ddc($Championnat); ?>.png">
		<h1><?php echo $Championnat; ?><br>Compte rendu</h1>
		<!-- <h2>Back-office</h2> -->
		<hr  class="separation">
	</header>
	<h2>Rencontre</h2>
	<p id="AlertSel" class="" style="display: block;">Sélectionner vos équipes</p>

	
	<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////        CHOIX DES EQUIPES        ///////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////  --> 
	<input id="discipline" type="text" value="<?php echo $discipline; ?>" style="display:none;">
	<table id="choix_D">
		<tbody>
		<tr>
			<td class="EcussonClub" align="right">
				<img id="M1ResultatRussie" class="ImageEcussonClubGauche" style="display:none;" src=""/></td>
			<td><select class="SelEquipe" id="choix1" name="choix1" onchange="menuDeroulant_M();" >                 
            <?php
             	foreach ($grpa0 as $item) {
                    echo '<option value="'.$item.'" id="MenuA">'.$item.'</option>';
                    }
                    echo'</select>';
            ?> </td>
			<td><select class="SelEquipe" id="choix2" name="choix2" onchange="menuDeroulant_M();">
            <?php
                 foreach ($grpa0 as $item) {
                    echo '<option value="'.$item.'" id="MenuB" >'.$item.'</option>';
                    }
                    echo'</select>';                    
            ?></td>
			<td class="EcussonClub" align="left">
				<img onselect="menuDeroulant_M();" id="M2ResultatRussie" class="ImageEcussonClubDroite" style="display:none;" src=""/></td>
		</tr>
		</tbody>
	</table>
	<div id="choix_M" class="choixEquipes">
		<img  id="M1ResultatRussie" class="ImageEcussonClubGauche" style="display:none;" src=""/></td>
		<select class="SelEquipe" id="choix1" name="choix1" onchange="menuDeroulant_M();" >                 
            <?php
				foreach ($grpa0 as $item) {
					echo '<option value="'.$item.'" id="MenuA">'.$item.'</option>';
					}
					echo'</select>';
			?>
		<select class="SelEquipe" id="choix2" name="choix2" onchange="menuDeroulant_M();">
            <?php
				foreach ($grpa0 as $item) {
					echo '<option value="'.$item.'" id="MenuB" >'.$item.'</option>';
					}
					echo'</select>';                    
            ?>
		<img onselect="menuDeroulant_M();" id="M2ResultatRussie" class="ImageEcussonClubDroite" style="display:none;" src=""/>
	</div>

<!--=================================================
 =            		FORMULAIRE      	       		=
 =================================================-->

	<form  id="Formulaire" method="get" action="verifCompteRendu.php" style="display:block;">
		<input id="equipeA" type="text" name="RencontreA" value="" style="display:none;">
		<input id="equipeB" type="text" name="RencontreB" value="" style="display:none;">
		<input id="schemaTactiqueA" type="text" name="schemaTactiqueA" value="" style="display:none;">
		<input id="schemaTactiqueB" type="text" name="schemaTactiqueB" value="" style="display:none;">
		<?php echo'<input id="Championnat" name="Championnat" value= "'.$Championnat.'" style="display:none;">' ?>
		<?php echo'<input id="Editeur" name="Editeur" value= "'.$editeur.'" style="display:none;">' ?>
<!--=======================================
 =            PARTIE GENERIQUE             =
 ========================================-->
 		<!-- # -----------  Scrore final  ------------->	
		<div class="infosHaut">
			<div>
				<label for="ScoreFinalDom"><h3>Score final</h3></label>
				<input class="score" style="width:50px;" type="number" min="0" id="ScoreFinalDom" name="ScoreFinalDom" required value="<?php @$_SESSION["ScoreFinalDom"] ?>">
				<input class="score" style="width:50px;" type="number" min="0" id="ScoreFinalExt" name="ScoreFinalExt" required value="<?php @$_SESSION["ScoreFinalExt"] ?>">
			</div>
		</div>
		<div class="infosHaut">
			<!-- # -----------  Lieu  ------------->
			<div>	
				<label for="Lieu"><h3>Lieu</h3></label> 
				<!-- <select id="stade" name="stade" required>';
					<?php 
					foreach ($stades as $stade) {
		            	echo '<option value="'.$stade.'" id="sel'.$stade.'" name="'.$stade.'">'.$stade.'</option> <br/>';
	                 };
	                 ?>
				</select> -->
				<input style="width:180px;" type="text" id="Lieu" name="stade" size="15" placeholder="Ex. Stade Matmut Atlantique" required>
			</div>
			<!-- # -----------  Date | Horaire | Arbitre | Spectateurs  ------------->
			<div>
			    <label for="Date"><h3>Date</h3></label> 
			    <input type="date" id="Date" name="Date" size="15" placeholder="" required maxlength="15">
			</div>
			<div>
			    <label for="Horaire"><h3>Horaire</h3></label> 
			    <input type="time" id="Horaire" name="Horaire" required/>
			</div>
			<div>
			    <label for="Arbitre"><h3>Arbitre</h3></label> 
			    <input style="width:180px;" type="text" id="Arbitre" name="Arbitre" size="15" placeholder="Entrez le nom de l'arbitre" required maxlength="50">
			</div>
			<div>
			    <label for="Spectateurs"><h3>Spectateurs</h3></label> 
			    <input style="width:80px;" type="number" id="Spectateurs" name="Spectateurs" size="15" placeholder="Entrez le nombre de spectateurs" required maxlength="50">
			</div>
		</div>
		
		<!-- # -----------  Météo / Terrain  ------------->
		<div id="meteoTerrain" class="infosHaut">
			<div>
				<label for="Meteo"><h3>Météo</h3></label>
				<input class="Meteo" style="width:180px;" type="text" id="Meteo" name="Meteo" required value="<?php @$_SESSION["Meteo"] ?>">
			</div>
			<div>
				<label for="Terrain"><h3>Terrain</h3></label>
				<input class="Terrain" style="width:180px;" type="text" id="Terrain" name="Terrain" required value="<?php @$_SESSION["Terrain"] ?>">
			</div>
		</div>
		
		<!-- # -----------  Scrore mi-temps Foot | Rugby ------------->
		<div id="scoreMt" class="infosHaut">
			<div>
				<label for="ScoreMitpsDom"><h3>Score à la mi-temps</h3></label>
				<input class="score rf" style="width:50px;" type="number" min="0" id="ScoreMitpsDom" name="ScoreMitpsDom" required value="<?php @$_SESSION["ScoreMitpsDom"] ?>">
				<input class="score rf" style="width:50px;" type="number" min="0" id="ScoreMitpsExt" name="ScoreMitpsExt" required value="<?php @$_SESSION["ScoreMitpsExt"] ?>">
			</div>
		</div>
		<div id="scoreQt" class="infosHaut">
			<div>
				<label for="ScoreQt1"><h3>Score QT 1</h3></label>
				<input class="score b" style="width:50px;" type="number" min="0" id="ScoreQt1Dom" name="ScoreQt1Dom" required value="<?php @$_SESSION["ScoreQt1Dom"] ?>">
				<input class="score b" style="width:50px;" type="number" min="0" id="ScoreQt1Ext" name="ScoreQt1Ext" required value="<?php @$_SESSION["ScoreQt1Ext"] ?>">
			</div>
			<div>
				<label for="ScoreQt2"><h3>Score QT 2</h3></label>
				<input class="score b" style="width:50px;" type="number" min="0" id="ScoreQt2Dom" name="ScoreQt2Dom" required value="<?php @$_SESSION["ScoreQt2Dom"] ?>">
				<input class="score b" style="width:50px;" type="number" min="0" id="ScoreQt2Ext" name="ScoreQt2Ext" required value="<?php @$_SESSION["ScoreQt2Ext"] ?>">
			</div>
			<div>
				<label for="ScoreQt3"><h3>Score QT 3</h3></label>
				<input class="score b" style="width:50px;" type="number" min="0" id="ScoreQt3Dom" name="ScoreQt3Dom" required value="<?php @$_SESSION["ScoreQt3Dom"] ?>">
				<input class="score b" style="width:50px;" type="number" min="0" id="ScoreQt3Ext" name="ScoreQt3Ext" required value="<?php @$_SESSION["ScoreQt3Ext"] ?>">
			</div>
			<div>
				<label for="ScoreQt4"><h3>Score QT 4</h3></label>
				<input class="score b" style="width:50px;" type="number" min="0" id="ScoreQt4Dom" name="ScoreQt4Dom" required value="<?php @$_SESSION["ScoreQt4Dom"] ?>">
				<input class="score b" style="width:50px;" type="number" min="0" id="ScoreQt4Ext" name="ScoreQt4Ext" required value="<?php @$_SESSION["ScoreQt4Ext"] ?>">
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
			
				<div id="schemaTac1" style=""><h3>Schéma tactique</h3>				
					<select id="schemaTacSel1" name="schemaTactique1" class="largeurInput" onchange="affichageSchemaFoot();">
					<?php
						foreach ($schemaTactique as $schemaTactiq) {
		            	echo '<option value="'.$schemaTactiq.'" id="selDomSchemaA'.$schemaTactiq.'" name="nameDomSchema">'.$schemaTactiq.'</option>';
		            	};
		            ?>
					</select>
				</div>
				<img onselect="affichageSchemaFoot();" id="schemaTacSel1Visu" class="tactiqueGauche"  src=""/></td>
		
		<!-- # -----------  FIN OPTION FOOT SCHEMA  ------------->		
		
		<!-- # -----------  AFFICHAGE CHAMPS JOUEURS EQUIPE 1  ------------->		
				<?php
					for ($i=1; $i < $entrees; $i++) {
						echo'
						<div style="display:flex; justify-content: space-evenly; align-items: stretch;">
							<div class="spacearound" style="order: 1;">
								<label for="EquipeDom'.$i.'"><h4>Nom '.$i.'</h4></label>
								<input type="text" id="EquipeDom'.$i.'" name="EquipeDom'.$i.'" placeholder="Nom du joueur" required value="'.@$_SESSION["EquipeDom".$i.""].'">
							</div>
							<div class="spacearound champsNumeros" style="order: 2;">
								<label for="EquipeDom'.$i.'"><h4>N°</h4></label>
								<input class="champsNumerosInp" type="number" min="0" id="EquipeDomNum'.$i.'" name="EquipeDomNum'.$i.'" style="width:50px;" placeholder="Son n°" value="'.@$_SESSION["EquipeDom".$i.""].'">
							</div>
							<div class="spacearound" style="order: 3;">
								<label for="EquipeDomCap'.$i.'"><h4>Cap.</h4></label>
								<select id="EquipeDomCap'.$i.'" name="EquipeDomCap'.$i.'" style="width:50px; height: 34px;">';
					
						foreach ($capitaines as $capitaine) {
			            	echo '<option value="'.$capitaine.'" id="selDom'.$capitaine,$i.'" name="'.$capitaine.'">'.$capitaine.'</option>';
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
						<label for="SelectionneursD"><h3>Entraîneur(s)</h3></label> 
			       		<input type="text" id="SelectionneursD" name="SelectionneursD" placeholder="ex. Avants : M. x / Arrières : M. y" required maxlength="300"><br/>
						<label for="RemplacantsD"><h3>Remplacement(s)</h3></label> 
			       		<textarea maxlength="550" id="RemplacantsD" name="RemplacantsD" cols="20" rows="40" placeholder=""></textarea><br/>
	    			</div>
	    
	    <!-- # -----------  Champs buteurs équipe 1  ------------->
				
					<div id="buteursEquipe1">
						<label for="buteursD"><h3><?php echo disciplineButsPts($Championnat); ?></h3></label> 
			       		<textarea maxlength="550" id="buteursD" name="buteursD" cols="20" rows="40" placeholder=""></textarea><br/>
	    			</div>
	     <!-- # -----------  Champs jaunes équipe 1  ------------->

	    			<div id="jaunesDom">
						<label for="jaunesD"><h3>Avertissement(s)</h3></label> 
			       		<textarea maxlength="550" id="jaunesD" name="jaunesD" cols="20" rows="40" placeholder=""></textarea><br/>
	    			</div>
	    
	     <!-- # -----------  Champs rouges équipe 1  ------------->

	    			<div id="rougesDom">
						<label for="rougesD"><h3>Expulsions(s)</h3></label> 
			       		<textarea maxlength="550" id="rougesD" name="rougesD" cols="20" rows="40" placeholder=""></textarea><br/>
	    			</div>
				<!-- </div> -->
			</div>
			<hr id="filetMob">
		</div>

<!--====  End of PARTIE EQUIPE 1   ====-->

<!--=======================================
 =            PARTIE EQUIPE 2             =
 =======================================-->
		<div class="equipeDroite"><h2>Equipe extérieure</h2>

		<!-- # -----------  OPTION FOOT SCHEMA  ------------->
			
			<div id="schemaTac2" style=""><h3>Schéma tactique</h3>
				<select id="schemaTacSel2" name="schemaTactique2" class="largeurInput" onchange="affichageSchemaFoot();">';
				<?php
					foreach ($schemaTactique as $schemaTactiq) {
	            	echo '<option value="'.$schemaTactiq.'" id="selDom'.$schemaTactiq.'" name="'.$schemaTactiq.'">'.$schemaTactiq.'</option>';
	            	};
	            ?>
	            </select>
			</div>
			<img onselect="affichageSchemaFoot();" id="schemaTacSel2Visu"  class="tactiqueDroite"  src=""/></td>
		
		<!-- # -----------  FIN OPTION FOOT SCHEMA  ------------->	
		
		<!-- # -----------  AFFICHAGE CHAMPS JOUEURS EQUIPE 2  ------------->		
					<?php
					for ($i=1; $i < $entrees; $i++) {
						echo'
						<div class="colChamps">
							<div class="spacearound" style="order: 3;">
								<label for="EquipeExt'.$i.'"><h4>Nom '.$i.'</h4></label>
								<input type="text" id="EquipeExt'.$i.'" name="EquipeExt'.$i.'" placeholder="Nom du joueur" required value="'.@$_SESSION["EquipeExt".$i.""].'">
							</div>
							<div class="spacearound champsNumeros" style="order: 2;">
								<label for="EquipeExt'.$i.'"><h4>N°</h4></label>
								<input class="champsNumerosInp" type="number" min="0" id="EquipeExtNum'.$i.'" name="EquipeExtNum'.$i.'" style="width:50px;" placeholder="Son n°" value="'.@$_SESSION["EquipeExt".$i.""].'">
							</div>
							<div class="spacearound" style="order: 1;">
								<label for="EquipeExtCap'.$i.'"><h4>Cap.</h4></label>
								<select id="EquipeExtCap'.$i.'" name="EquipeExtCap'.$i.'" style="width:50px; height: 34px;">';
					
						foreach ($capitaines as $capitaine) {
			            	echo '<option value="'.$capitaine.'" id="selDom'.$capitaine,$i.'" name="'.$capitaine.'">'.$capitaine.'</option>';
			            	};
							echo '</select>
								</div>
						</div>';
					};
				?>
			<!-- </div> -->
		<!-- # -----------  FIN AFFICHAGE CHAMPS JOUEURS EQUIPE 2  ------------->
		
		<!-- # -----------  AFFICHAGE CHAMPS ENTRAINEURS || REMPLCANTS EQUIPE 2  ------------->
			<div class="colChampPlus ListeChampionnats">	
				<div id="ExtRempEquipe2">	
					<label for="equipeAS"><h3>Entraîneur(s)</h3></label> 
		       		<input type="text" class="champDroite" id="SelectionneursE" name="SelectionneursE" placeholder="ex. Avants : M. x / Arrières : M. y" required maxlength="300"><br/>
					<label for="RemplacantsE"><h3>Remplacements</h3></label> 
		       		<textarea maxlength="550" id="RemplacantsE" name="RemplacantsE" cols="20" rows="40" placeholder=""></textarea><br/>
	    		</div>

	     <!-- # -----------  Champs buteurs équipe 2  ------------->
				
				<div id="buteursEquipe2">
					<label for="buteursE"><h3><?php echo disciplineButsPts($Championnat); ?></h3></label> 
					<textarea maxlength="550" id="buteursE" name="buteursE" cols="20" rows="40" placeholder=""></textarea><br/>
				</div>
	     <!-- # -----------  Champs jaunes équipe 2  ------------->

				<div id="jaunesExt">
					<label for="jaunesE"><h3>Avertissement(s)</h3></label> 
					<textarea maxlength="550" id="jaunesE" name="jaunesE" cols="20" rows="40" placeholder=""></textarea><br/>
				</div>
	    
	     <!-- # -----------  Champs rouges équipe 2  ------------->

				<div id="rougesExt">
					<label for="rougesE"><h3>Expulsions(s)</h3></label> 
					<textarea maxlength="550" id="rougesE" name="rougesE" cols="20" rows="40" placeholder=""></textarea><br/>
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
							echo'<option value="'.$format.'" name="'.$format.'">'.$format.'</option>';
						};
						echo '</select>';
					?>
		    </div>
		    <br>
<!-- # -----------  FIN PAR DEFAUT SELECT  ------------->	

    	<input id="validezback" type="submit" value="VALIDEZ"/>
	</form>

<!--=====================================================
 =            		FIN FORMULAIRE      	       		=
 ======================================================-->
	
		<footer style="background-image:url(css/images/signature<?php echo $editeur;?>.png);"></footer>
	</body>
			

	<script type="text/javascript">	
  	
			$('.single-checkbox').on('change', function() {
			   if($('.single-checkbox:checked').length > 2) {
			       this.checked = false;
			   }
			});
  		</script>
		<script src="js/camelize.js" type="text/javascript"></script>
		<script src="js/affichageSchemaFoot.js" type="text/javascript"></script>
		<script src="js/menuDeroulant.js" type="text/javascript"></script>
		<script>menuDeroulantBis();</script>
		<script>menuDeroulant();</script>
		<script>menuDeroulant_M();</script>
		<script src="js/restrictionsFormulaire.js" type="text/javascript"></script>
		<script>displayChampNum();</script>
		<script>displayScoreBasket();</script>
		<script>
			const element_D = document.getElementById('choix_D');
			const element_M = document.getElementById('choix_M');
			if (screen.width < 580) {
				element_D.remove();
			}
			else{
				element_M.remove();
			}
			console.log(screen.width);
			// function screem(){
			// }
		</script>
		
</html>