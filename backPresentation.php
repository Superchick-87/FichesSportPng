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
	include (dirname(__FILE__).'/includes/tvs.php');
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
	<!-- /**
     * Ligne à garder pour V2 - voir bas pour l'autoplementation
     * <body onload="javascript:affichageSchemaFoot(); menuDeroulant();autocompletion();">
     */ -->
	<body onload="javascript:affichageSchemaFoot(); menuDeroulant(); menuDeroulant_M();">
	<header>
		<img class="logoCompetition" src="css/images/<?php echo ddc($Championnat); ?>.png">
		<h1><?php echo $Championnat; ?><br>Présentation</h1>
		<!-- <h2>Back-office</h2> -->
		<hr  class="separation">
	</header>
	<h2>Rencontre</h2>
	<p id="AlertSel" class="" style="display: block;">Sélectionner vos équipes</p>

	
	<!-- // //////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////        CHOIX DES EQUIPES        ///////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////// // -->
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

	<form  id="Formulaire" method="get" action="verifPresentation.php" style="display:block;">
		<input id="equipeA" type="text" name="RencontreA" value="" style="display:none;">
		<input id="equipeB" type="text" name="RencontreB" value="" style="display:none;">
		<input id="schemaTactiqueA" type="text" name="schemaTactiqueA" value="" style="display:none;">
		<input id="schemaTactiqueB" type="text" name="schemaTactiqueB" value="" style="display:none;">
		<?php echo'<input id="Championnat" name="Championnat" value= "'.$Championnat.'" style="display:none;">' ?>
		<?php echo'<input id="Editeur" name="Editeur" value= "'.$editeur.'" style="display:none;">' ?>
		
<!--=======================================
 =            PARTIE GENERIQUE             =
 ========================================-->

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
			<div class="boiteHaut">
			    <label for="Date"><h3>Date</h3></label> 
			    <input type="date" id="Date" name="Date" size="15" placeholder="" required maxlength="15">
			</div>
			<div class="boiteHaut">
			    <label for="Horaire"><h3>Horaire</h3></label> 
			    <input type="time" id="Horaire" name="Horaire" required/>
			</div>
			<div class="boiteHaut">
			    <label for="Arbitre"><h3>Arbitre</h3></label> 
			    <input type="text" id="Arbitre" name="Arbitre" size="15" placeholder="Entrez le nom de l'arbitre" required maxlength="50">
			</div>
		</div>
		<div class="boiteHaut">	
				<h2>Chaînes télé</h2>
				<p id="AlertTv" class="">Choix télés : 2 chaînes max.<br/>(Facultatif)</p>
				<div class="ListeTeles">
			<?php 
				foreach ($tvs as $tv) {
	            	echo '<label class="container">
	            	<input class="single-checkbox" type="checkbox" id="sel'.$tv.'" name="tv[]" value="'.$tv.'">
	            	<img class="checkmark choix" src="css/images/tv/'.$tv.'.png" alt="'.$tv.'">
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
		<div class="equipeGauche"><h2>Equipe domicile</h2>

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
						<label for="equipeAS"><h3>Entraîneur(s)</h3></label> 
			       		<input type="text" id="SelectionneursD" name="SelectionneursD" placeholder="ex. Avants : M. x / Arrières : M. y" required maxlength="300"><br/>
						<label for="RemplacantsD"><h3>Remplaçants</h3></label> 
			       		<textarea required maxlength="200" id="RemplacantsD" name="RemplacantsD" cols="20" rows="40" placeholder="200 signes max."></textarea>
	    			</div>
					
					<!-- # -----------  FIN AFFICHAGE CHAMPS ENTRAINEURS || REMPLCANTS EQUIPE 1  ------------->
					
					<!-- # -----------  AFFICHAGE CHAMPS CLASSEMENT || POINTS EQUIPE 1  ------------->
	    			
	    			<div class="colChampPlus ListeChampionnats">
						<label for="ClassPtsDom"><h3>Classement / pts</h3><p class="ssmarge">(Facultatif)</p></label>
	    				<input id="ClassPtsDom" type="text" name="ClassPtsScoreDom">
	    			</div>
					<hr id="filetMob">

		<!-- # -----------  FIN AFFICHAGE CHAMPS CLASSEMENT || POINTS EQUIPE 1  ------------->
		
		<!-- # -----------  AFFICHAGE SELECT SERIE EN COURS EQUIPE 1  ------------->

				<!-- 	<label for="SerieDom"><h3>Série en cours équipe 1</h3></label>
					<div id="SerieDom" class="flex"> 
    			<?php
    			for ($i=1; $i < 6; $i++) { 
					echo '<div>
					<h4 class="match"> Match '.$i.'</h4>
					<select class="SerieDom" name="SerieDom'.$i.'" onchange="Function(this.value);" required>';
    			foreach ($series as $serie) {
    				echo'<option value="'.$serie.'" name="'.$serie.'">'.$serie.'</option>';
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

		<!-- # -----------  FIN AFFICHAGE CHAMPS JOUEURS EQUIPE 2  ------------->

		<!-- # -----------  AFFICHAGE CHAMPS ENTRAINEURS || REMPLCANTS EQUIPE 2  ------------->

				<div id="ExtRempEquipe2" class="colChampPlus ListeChampionnats">	
					<label for="equipeAS"><h3>Entraîneur(s)</h3></label> 
		       		<input type="text" class="champDroite" id="SelectionneursE" name="SelectionneursE" placeholder="ex. Avants : M. x / Arrières : M. y" required maxlength="300">
					<label for="RemplacantsE"><h3>Remplaçants</h3></label> 
		       		<textarea required maxlength="200" id="RemplacantsE" name="RemplacantsE" cols="20" rows="40" placeholder="200 signes max."></textarea>
	    		</div>
				<!-- # -----------  FIN AFFICHAGE CHAMPS ENTRAINEURS || REMPLCANTS EQUIPE 2  ------------->
				
				<!-- # -----------  AFFICHAGE CHAMPS CLASSEMENT || POINTS EQUIPE 2  ------------->
	    		<div class="colChampPlus ListeChampionnats">
					<label for="ClassPtsExt"><h3>Classement / pts</h3><p class="ssmarge">(Facultatif)</p></label>
	    			<input id="ClassPtsExt" type="text" name="ClassPtsScoreExt">
	    		</div>
				<hr id="filetMob">
	    <!-- # -----------  FIN AFFICHAGE CHAMPS CLASSEMENT || POINTS EQUIPE 2  ------------->
		
		<!-- # -----------  AFFICHAGE SELECT SERIE EN COURS EQUIPE 2  ------------->

	    		<!-- <label for="SerieExt"><h3>Série en cours équipe 2</h3></label>
				<div id="SerieExt" class="flex"> 
					<?php
					for ($i=1; $i < 6; $i++) { 
						echo '<div><h4 class="match"> Match '.$i.'</h4>
							<select class="SerieExt" name="SerieExt'.$i.'" onchange="Function(this.value);" required>';
						foreach ($series as $serie) {
							echo'<option value="'.$serie.'" name="'.$serie.'">'.$serie.'</option>';
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
		 	<input type="number" min="0" name="VictoiresDom" class="SerieExt" placeholder="ex.3" required maxlength="2">
		 	<h4 class="label"> Nul(s)</h4>
		 	<input type="number" min="0" name="Nuls" class="SerieExt" placeholder="ex.3" required maxlength="2">
		 	<h4 class="label"> Victoire(s) équipe 2</h4>
		 	<input type="number" min="0" name="VictoiresExt" class="SerieExt" placeholder="ex.3" required maxlength="2">
		</div>
	</div>
	<hr class="separation">

<!--====  End of CONFRONTATIONS    ====-->

<!-- # -----------  FORMAT PAR DEFAUT SELECT (à garder) ------------->
		<!-- <hr> -->
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
		<!-- <input type="text" name="when" value="Presentation" style="display: none;"> -->
    	<input id="validezback" type="submit" value="VALIDEZ"/>
	</form>

<!--=====================================================
 =            		FIN FORMULAIRE      	       		=
 ======================================================-->
	
	<footer style="background-image:url(css/images/signature<?php echo $editeur;?>.png);"></footer>
	</body>
	<script type="text/javascript">
			
			// function autocompletion() {
			// 	var gpA10 = [<?php echo"'",include (dirname(__FILE__).'/includes/menu.php'),"'"; ?> ];
			// 	$("#EquipeDom1,#EquipeDom2,#EquipeDom3,#EquipeDom4,#EquipeDom5,#EquipeDom6,#EquipeDom7,#EquipeDom8,#EquipeDom9,#EquipeDom10,#EquipeDom11,#EquipeDom12,#EquipeDom13,#EquipeDom14,#EquipeDom15,#EquipeExt1,#EquipeExt2,#EquipeExt3,#EquipeExt4,#EquipeExt5,#EquipeExt6,#EquipeExt7,#EquipeExt8,#EquipeExt9,#EquipeExt10,#EquipeExt11,#EquipeExt12,#EquipeExt13,#EquipeExt14,#EquipeExt15").autocomplete
			// 	({
			// 		source: gpA10
			// 	});
			// }
	/**
    * Sert à effacer le champ N° quand le sport est "rugby"
    */	
        var discipline = document.getElementById('discipline').value;
		var importants = document.querySelectorAll('.champsNumeros');
		var champsNumerosInp = document.querySelectorAll('.champsNumerosInp');
		if ((discipline === 'Foot')|| (discipline === 'Basket')){
			for (var i = 0; i < importants.length; i++) {
	  			importants[i].style.display = 'block';
	  			champsNumerosInp[i].setAttribute("required", "");

			}
		}
		else{
                for (var i = 0; i < importants.length; i++) {
	  			importants[i].style.display = 'none';
				}
		}
		</script> 
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