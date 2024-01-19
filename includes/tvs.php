<?php
$tvs = array('AmazonPrime', 'BeinSport', 'BeinSport1', 'BeinSport2', 'BeinSport3', 'C8', 'CanalPlus', 'CanalPlusSport', 'CanalDecale', 'RugbyPlus', 'Equipe', 'Eurosport', 'FranceTv', 'France2', 'France3', 'M6', 'RmcSport', 'Tf1', 'W9');

/**
 * Sert à checked tv sélectionnée(s)
 * Comparaison si exist return checked
 *
 * @param [string] $w -> $DatasFront[24] -> télé 1
 * @param [type] $x -> $DatasFront[25] -> télé 2
 * @param [type] $z  -> $tv -> télé à comparer
 * @return void
 */
function chekecTV($w, $x, $z)
{
	if ($w == $z) {
		return 'checked';
	};
	if ($x == $z) {
		return 'checked';
	};
};
