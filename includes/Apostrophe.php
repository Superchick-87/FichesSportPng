<?php
	function apostropheencode($tring){
		$tring = str_replace("'","\'",$tring);
		return $tring;
	}
?>