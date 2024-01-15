<?php
	include (dirname(__FILE__).'/includes/ChoixChampionnats.php');
	include (dirname(__FILE__).'/includes/ddc.php');
	include (dirname(__FILE__).'/includes/accesserver.php');
	$typeFiche = $_GET['type'];
	$editeur = $_GET['editeur'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $typeFiche; ?> - Composition des équipes</title>
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
		<img class="logoCompetition" src="css/images/sports<?php echo $editeur; ?>.svg">
		<h1>Fiches sport</h1>
		<h2>Back-office</h2>
		<hr  class="separation">
	</header>
	<h2><?php echo $typeFiche; ?></h2>
	<div class="boiteHaut">
				<p id="AlertTv" class="">Sélectionner un championnat</p>
				<div class="ListeChampionnats">
				<?php 
					foreach ($ChoixChampionnats as $ChoixChampionnatss) {
		            	echo '<label class="containerIndex">
		            	<input onclick=window.open(href="'.$redirectionIndex.'index_.php?Type='.ddc($typeFiche).'&Championnat='.urlencode($ChoixChampionnatss).'&editeur='.$editeur.'") target="_blank" class="single-checkbox transparant" type="radio" id="sel'.$ChoixChampionnatss.'" name="Championnat" value="'.$ChoixChampionnatss.'">
		            	<img class="checkmarkIndex choix" src="css/images/'.ddc($ChoixChampionnatss).'.svg" alt="'.$ChoixChampionnatss.'">
		            	</label>';};
                 ?>
				</div>
		</div>

		<!-- <div class="boiteHaut">
				<p id="AlertTv" class="">Sélectionner un championnat</p>
				<div class="ListeChampionnats">
				<?php 
					foreach ($ChoixChampionnats as $ChoixChampionnatss) {
		            	echo '<label class="containerIndex">
		            	<input onclick=window.open(href="'.$redirectionIndex.'back'.ddc($typeFiche).'.php?Championnat='.urlencode($ChoixChampionnatss).'&editeur='.$editeur.'") target="_blank" class="single-checkbox transparant" type="radio" id="sel'.$ChoixChampionnatss.'" name="Championnat" value="'.$ChoixChampionnatss.'">
		            	<img class="checkmarkIndex choix" src="css/images/'.ddc($ChoixChampionnatss).'.svg" alt="'.$ChoixChampionnatss.'">
		            	</label>';};
                 ?>
				</div>
		</div> -->
	<footer style="background-image:url(css/images/signature<?php echo $editeur;?>.svg);"></footer>
	</body>
</html>