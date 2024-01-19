<?php
function HdeHeure($tring)
{
	$tring = str_replace(":", "h", $tring);
	return $tring;
};
function HdeHeureRevers($tring)
{
	$tring = str_replace("h", ":", $tring);
	return $tring;
};
