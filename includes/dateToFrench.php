<?php
	// Convertit une date ou un timestamp en français
	function dateToFrench($date, $format) 
	{
	    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
	    $french_days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
	    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
	    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
	    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date))));
	}

	// // Affiche : mardi 11 septembre 2001.
	// echo dateToFrench($Date,'l j F Y').'</br>';
?>