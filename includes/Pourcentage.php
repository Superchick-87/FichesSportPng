<?php
	function pourcentage($choix, $total){
		 if ($choix>0) {
		 	$toto=number_format(($choix/($total)*100), 1, '.', '');
		 return $toto;
		 }
		 else{
		 $toto='0';
		 return $toto;	
		 }
		 
	}

	function pourcentagePdf($choix, $total){
		 if ($choix>0) {
		 	$toto=number_format(($choix/($total)*85), 1, '.', '');
		 return $toto;
		 }
		 else{
		 $toto='0';
		 return $toto;	
		 }
		 
	}
?>