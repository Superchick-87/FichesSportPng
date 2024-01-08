<?php
include (dirname(__FILE__).'/accesserver.php');

try{
		$connexion = new PDO("mysql:host=$serveur;dbname=$database;charset=utf8", $login, $pass);
		$connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		$foncsqlMenu = 'SELECT Choix FROM '.$table.' WHERE Championnat IN ("'.ddc($Championnat).'")';
		// $foncsqlMenu = "SELECT Choix FROM CompositionRugbyEquipesCM WHERE Nation IN ('FR','AN')";
				
		$requeteidMenu = $connexion->prepare($foncsqlMenu);
		$requeteidMenu->execute();
		$Menu = $requeteidMenu->fetchall();


		$a=0;
		while ($a < count($Menu)) {
			// echo apostropheencode($Menu[$a++]['Choix'])."','";
			echo apostropheencode($Menu[$a++]['Choix'])."','";
		}
}
catch(PDOException $e){
	echo 'Echec de la connexion : ' .$e->getmessage();
}
?>
