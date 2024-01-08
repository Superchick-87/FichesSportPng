<?php
	function ajoutEspace($variable){
		if (isset($variable)) {
			echo "";
		}
		else{
			echo " (c)";	
		}
		return $variable;
	}
?>