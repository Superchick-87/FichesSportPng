<?php
function colorVictoireDefaite($a,$colorFill){
	if ($a == 'Victoire'){
		$colorFill = array(90,10,65,15);
		return $colorFill;
	}
	elseif ($a == 'Défaite'){
		$colorFill = array(0,100,100,0);
		return $colorFill;
	}
	elseif ($a == 'Nul'){
		$colorFill = array(0,0,0,50);
		return $colorFill;
	}
}
?>