<?php
	function validationEffectif($joueur,$requete,$equipe){
		if ($joueur != $requete->fetchall()){
				echo '';
			}
			else {
				echo '<div class="alert" >Erreur de saisie<br/><i> '.$equipe.'</i> n\'existe pas !</div>';
				echo "<input id='visualiser' type=button value='RETOUR' onclick='history.go(-1)'/>
				<footer></footer>";
				exit();
			}
			// return $joueur;
		
	}

?>