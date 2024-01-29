<?php


$tutu = 'kgkgk';
$Championnat = urldecode($_GET['Championnat']);
$editeur = $_GET['editeur'];
// $typeFiche = $_GET['Type'];
// echo $editeur;
include(dirname(__FILE__) . '/includes/ddc.php');
include(dirname(__FILE__) . '/includes/EquipesStades' . ddc($Championnat) . '.php');
include(dirname(__FILE__) . '/includes/accesserver.php');
include(dirname(__FILE__) . '/includes/texteCoupe.php');
include(dirname(__FILE__) . '/includes/Apostrophe.php');
include(dirname(__FILE__) . '/includes/choixCompetition.php');
include(dirname(__FILE__) . '/includes/Formts.php');
include(dirname(__FILE__) . '/includes/tvs.php');
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="js/1121_jquery-ui.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.9.1/d3.min.js"></script>
</head>

<body onload="javascript:menuDeroulant(); menuDeroulant_M(); masqueTactique(); ">
	<header>
		<img class="logoCompetition" src="css/images/<?php echo ddc($Championnat); ?>.png">
		<h1><?php echo $Championnat; ?><br>Présentation</h1>
		<!-- <h2>Back-office</h2> -->
		<hr class="separation">
	</header>
	<h2>Rencontre</h2>
	<p id="AlertSel" class="" style="display: block;">Sélectionner vos équipes</p>



	<input id="discipline" type="text" value="<?php echo $discipline; ?>" style="display:none;">
	<table id="choix_D">
		<tbody>
			<tr>
				<td class="EcussonClub" align="right">
					<img id="M1ResultatRussie" class="ImageEcussonClubGauche" style="display:none;" src="" />
				</td>
				<td><select class="SelEquipe" id="choix1" name="choix1" onchange="menuDeroulant(); menuDeroulant_M(); showCustomer(this.value);">
						<?php
						foreach ($grpa0 as $item) {
							echo '<option value="' . $item . '" id="MenuA">' . $item . '</option>';
						}
						echo '</select>';
						?> </td>
				<td><select class="SelEquipe" id="choix2" name="choix2" onchange="menuDeroulant(); menuDeroulant_M();showCustomer(this.value); ">
						<?php
						foreach ($grpa0 as $item) {
							echo '<option value="' . $item . '" id="MenuB" >' . $item . '</option>';
						}
						echo '</select>';
						?></td>
				<td class="EcussonClub" align="left">
					<img onselect="menuDeroulant_M();" id="M2ResultatRussie" class="ImageEcussonClubDroite" style="display:none;" src="" />
				</td>
			</tr>
		</tbody>
	</table>
	<div id="choix_M" class="choixEquipes">
		<img id="M1ResultatRussie" class="ImageEcussonClubGauche" style="display:none;" src="" /></td>
		<select class="SelEquipe" id="choix1" name="choix1" onchange="menuDeroulant(); menuDeroulant_M(); showCustomer(this.value);">
			<?php
			foreach ($grpa0 as $item) {
				echo '<option value="' . $item . '" id="MenuA">' . $item . '</option>';
			}
			echo '</select>';
			?>
			<select class="SelEquipe" id="choix2" name="choix2" onchange="menuDeroulant(); menuDeroulant_M(); showCustomer(this.value);">
				<?php
				foreach ($grpa0 as $item) {
					echo '<option value="' . $item . '" id="MenuB" >' . $item . '</option>';
				}
				echo '</select>';
				?>
				<img onselect="menuDeroulant_M();" id="M2ResultatRussie" class="ImageEcussonClubDroite" style="display:none;" src="" />
	</div>

	<!--=================================================
	=            		FORMULAIRE      	       		=
	=================================================-->

	<div id="Formulaire">
		<input id="equipeA" type="text" name="RencontreA" value="" style="display:none;">
		<input id="equipeB" type="text" name="RencontreB" value="" style="display:none;">
		<?php echo '<input id="Championnat" name="Championnat" value= "' . $Championnat . '" style="display:none;">' ?>
		<?php echo '<input id="Editeur" name="Editeur" value= "' . $editeur . '" style="display:none;">' ?>
	</div>


	<!--=====================================================
	=            		FIN FORMULAIRE      	       		=
	======================================================-->

	<div id="txtHint">
	</div>
	<footer style="background-image:url(css/images/signature<?php echo $editeur; ?>.png);"></footer>
</body>

<script type="text/javascript">
	function showCustomer(str) {
		var MenuA = document.getElementById('choix1').value;
		var MenuB = document.getElementById('choix2').value;
		var Championnat = document.getElementById('Championnat').value;
		var Editeur = document.getElementById('Editeur').value;
		var xhttp;
		if (str == "") {
			document.getElementById("txtHint").innerHTML = "";
			return;
		}
		if ((MenuA === 'Choix') || (MenuB === 'Choix')) {
			document.getElementById("txtHint").innerHTML = "";

			return;
		}
		if (MenuA === MenuB) {
			document.getElementById("txtHint").innerHTML = "";
			return;
		}

		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("txtHint").innerHTML = this.responseText;
				// var totalRencontre = document.getElementById('totalRencontre').innerHTML;
				// console.log(totalRencontre)
				masqueTactique();
				// changerActionSave();
			}
			switchFootRugbyOther();
			restricChoixCheckBox();
			affichageSchemaFoot(); 
		};

		/* Methode GET -> passe une seule variable */
		/* Methode POST -> passe plusieurs variables */
		// xhttp.open("GET", "getuser.php?choix1="+str,true);
		// xhttp.send();
		xhttp.open("POST", "backPresentation.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("Championnat=" + Championnat + "&editeur=" + Editeur + "&choix1=" + MenuA + "&choix2=" + MenuB);
	};

	/**
	 * Sert à effacer le champ N° quand le sport est "rugby"
	 */
	function switchFootRugbyOther() {
		var discipline = document.getElementById('discipline').value;
		var importants = document.querySelectorAll('.champsNumeros');
		var champsNumerosInp = document.querySelectorAll('.champsNumerosInp');

		if ((discipline === 'Foot') || (discipline === 'Basket')) {
			for (var i = 0; i < importants.length; i++) {
				importants[i].style.display = 'block';
				champsNumerosInp[i].setAttribute("required", "");

			}
		} else {
			for (var i = 0; i < importants.length; i++) {
				importants[i].style.display = 'none';
			}
		}
	};

	function masqueTactique() {
		var discipline = document.getElementById('discipline').value;
		var schemaTac1 = document.getElementById('schemaTac1');
		var schemaTac2 = document.getElementById('schemaTac2');
		if (discipline !== 'Foot') {
			schemaTac2.style.display = 'none';
			schemaTac1.style.display = 'none';
		} else {
			schemaTac2.style.display = 'block';
			schemaTac1.style.display = 'block';
		}
	};
</script>
<script type="text/javascript">
	/**
	 * Sert à restrindre le choix des télés à 2
	 */
	function restricChoixCheckBox() {
		$('.single-checkbox').on('change', function() {
			if ($('.single-checkbox:checked').length > 2) {
				this.checked = false;
			}
		});
	}
</script>

<script src="js/camelize.js" type="text/javascript"></script>
<script src="js/affichageSchemaFoot.js" type="text/javascript"></script>
<script src="js/menuDeroulant.js" type="text/javascript"></script>
<!-- <script>menuDeroulantBis();</script> -->
<!-- <script>menuDeroulant();</script> -->
<script>
	menuDeroulant_M();
</script>

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
<script>
	/**
	 * * Fonctions pour gérer la sauvegarde et la génération des datas
	 * via deux boutons 'Save' et 'Valider' selon l'état de remplissage
	 * du formlaire avec un renvoi sur une page distinct
	 * 'Save' -> 'creatDataSave.php'
	 * 'Valider' -> 'verifPresentation.php' 
	 */

	/**
	 * Fonction qui supprime l'attribut 'required'
	 * pour 'Save', tous les champs ne peuvent pas être remplis
	 */
	function supprimerTousRequired() {
		// Récupérer tous les champs de saisie requis dans le formulaire
		var inputs = document.querySelectorAll('#Formulaire input[required]');
		var textarea = document.querySelectorAll('#Formulaire textarea[required]');
		// Parcourir tous les champs de saisie et supprimer l'attribut required
		for (var i = 0; i < inputs.length; i++) {
			inputs[i].removeAttribute('required');
		}
		for (var i = 0; i < textarea.length; i++) {
			textarea[i].removeAttribute('required');
		}
	};

	/**
	 * Fonction qui renvoie sur la page 'creatDataSave.php'
	 * les datas sont générées en partie
	 * par défaut 'verifPresentation.php' renseigné dans l'attribut 'action'
	 * du tag 'form'
	 */
	function changerActionSave() {
		// Récupérer le formulaire par son ID
		var myFormc = document.querySelector("form");
		// Changer la valeur de l'attribut action
		myFormc.action = "creatDataSave.php";
	};

	/**
	 * Fonction qui affiche ou masque les boutons
	 * selon l'état de remplissage du formulaire
	 */
	function verifierChamps() {
		// Récupérer tous les champs de saisie requis dans le formulaire
		var inputs = document.querySelectorAll('#Formulaire input[required]');
		// Vérifier si tous les champs requis ont une valeur
		var tousNonVides = true;
		for (var i = 0; i < inputs.length; i++) {
			if (inputs[i].value === '') {
				tousNonVides = false;
				break; // S'il y en a au moins un vide, on peut arrêter la boucle
			}
		}
		// Afficher ou masquer le bouton en fonction du résultat
		var boutonContainer = document.getElementById('boutonContainer');
		if (tousNonVides) {
			// Tous les champs requis sont non vides, afficher le bouton
			boutonContainer.innerHTML = '<input id="save" name="SAVE" type="submit" onclick="supprimerTousRequired(); " value="SAVE"/>' +
				'<input id="validezback" type="submit" name="VALIDEZ" value="VALIDEZ"/>';
		} else {
			// Au moins un champ requis est vide, masquer le bouton
			boutonContainer.innerHTML = '<input id="save" name="SAVE" type="submit" onclick="supprimerTousRequired(); " value="SAVE"/>';
		}
	};
</script>

</html>