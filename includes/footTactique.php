<?php
/*========================================
=            Construction CSV            =
========================================*/
$lignes[] = array('picto', 'xm', 'ym', 'xd', 'yd', 'Nom', 'Cap', 'Numero', 'Club');
/*----------  Equipe Dom  ----------*/

// if ($tac = "init") {
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom1, $EquipeDomCap1, $EquipeDomNum1, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom2, $EquipeDomCap2, $EquipeDomNum2, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom3, $EquipeDomCap3, $EquipeDomNum3, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom4, $EquipeDomCap4, $EquipeDomNum4, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom5, $EquipeDomCap5, $EquipeDomNum5, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom6, $EquipeDomCap6, $EquipeDomNum6, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom7, $EquipeDomCap7, $EquipeDomNum7, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom8, $EquipeDomCap8, $EquipeDomNum8, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom9, $EquipeDomCap9, $EquipeDomNum9, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom10, $EquipeDomCap10, $EquipeDomNum10, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom11, $EquipeDomCap11, $EquipeDomNum11, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt1, $EquipeExtCap1, $EquipeExtNum1, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt2, $EquipeExtCap2, $EquipeExtNum2, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt3, $EquipeExtCap3, $EquipeExtNum3, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt4, $EquipeExtCap4, $EquipeExtNum4, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt5, $EquipeExtCap5, $EquipeExtNum5, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt6, $EquipeExtCap6, $EquipeExtNum6, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt7, $EquipeExtCap7, $EquipeExtNum7, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt8, $EquipeExtCap8, $EquipeExtNum8, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt9, $EquipeExtCap9, $EquipeExtNum9, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt10, $EquipeExtCap10, $EquipeExtNum10, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt11, $EquipeExtCap11, $EquipeExtNum11, $ClubExt);
// }
// if ($tactiqueA == "A") {
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom1, $EquipeDomCap1, $EquipeDomNum1, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom2, $EquipeDomCap2, $EquipeDomNum2, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom3, $EquipeDomCap3, $EquipeDomNum3, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom4, $EquipeDomCap4, $EquipeDomNum4, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom5, $EquipeDomCap5, $EquipeDomNum5, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom6, $EquipeDomCap6, $EquipeDomNum6, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom7, $EquipeDomCap7, $EquipeDomNum7, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom8, $EquipeDomCap8, $EquipeDomNum8, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom9, $EquipeDomCap9, $EquipeDomNum9, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom10, $EquipeDomCap10, $EquipeDomNum10, $ClubDom);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeDom11, $EquipeDomCap11, $EquipeDomNum11, $ClubDom);
// }
if ($tactiqueA == "3-4-2-1") {
	$lignes[] = array('1.5', '149', '30', '34', '159', $EquipeDom1, $EquipeDomCap1, $EquipeDomNum1, $ClubDom);
	$lignes[] = array('1.5', '65', '112', '116', '250', $EquipeDom2, $EquipeDomCap2, $EquipeDomNum2, $ClubDom);
	$lignes[] = array('1.5', '149', '112', '116', '159', $EquipeDom3, $EquipeDomCap3, $EquipeDomNum3, $ClubDom);
	$lignes[] = array('1.5', '235', '112', '116', '73', $EquipeDom4, $EquipeDomCap4, $EquipeDomNum4, $ClubDom);
	$lignes[] = array('1.5', '31', '165', '170', '282', $EquipeDom5, $EquipeDomCap5, $EquipeDomNum5, $ClubDom);
	$lignes[] = array('1.5', '105', '165', '170', '204', $EquipeDom6, $EquipeDomCap6, $EquipeDomNum6, $ClubDom);
	$lignes[] = array('1.5', '191', '165', '170', '112', $EquipeDom7, $EquipeDomCap7, $EquipeDomNum7, $ClubDom);
	$lignes[] = array('1.5', '265', '165', '170', '28', $EquipeDom8, $EquipeDomCap8, $EquipeDomNum8, $ClubDom);
	$lignes[] = array('1.5', '119', '217', '220', '129', $EquipeDom9, $EquipeDomCap9, $EquipeDomNum9, $ClubDom);
	$lignes[] = array('1.5', '179', '217', '220', '189', $EquipeDom10, $EquipeDomCap10, $EquipeDomNum10, $ClubDom);
	$lignes[] = array('1.5', '149', '269', '273', '159', $EquipeDom11, $EquipeDomCap11, $EquipeDomNum11, $ClubDom);
}
if ($tactiqueA == "3-4-1-2") {
	$lignes[] = array('1.5', '149', '30', '34', '159', $EquipeDom1, $EquipeDomCap1, $EquipeDomNum1, $ClubDom);
	$lignes[] = array('1.5', '65', '112', '116', '250', $EquipeDom2, $EquipeDomCap2, $EquipeDomNum2, $ClubDom);
	$lignes[] = array('1.5', '149', '112', '116', '159', $EquipeDom3, $EquipeDomCap3, $EquipeDomNum3, $ClubDom);
	$lignes[] = array('1.5', '235', '112', '116', '73', $EquipeDom4, $EquipeDomCap4, $EquipeDomNum4, $ClubDom);
	$lignes[] = array('1.5', '31', '165', '170', '282', $EquipeDom5, $EquipeDomCap5, $EquipeDomNum5, $ClubDom);
	$lignes[] = array('1.5', '105', '165', '170', '197', $EquipeDom6, $EquipeDomCap6, $EquipeDomNum6, $ClubDom);
	$lignes[] = array('1.5', '191', '165', '170', '112', $EquipeDom7, $EquipeDomCap7, $EquipeDomNum7, $ClubDom);
	$lignes[] = array('1.5', '265', '165', '170', '28', $EquipeDom8, $EquipeDomCap8, $EquipeDomNum8, $ClubDom);
	$lignes[] = array('1.5', '149', '217', '233', '159', $EquipeDom9, $EquipeDomCap9, $EquipeDomNum9, $ClubDom);
	$lignes[] = array('1.5', '119', '269', '272', '205', $EquipeDom10, $EquipeDomCap10, $EquipeDomNum10, $ClubDom);
	$lignes[] = array('1.5', '179', '269', '272', '115', $EquipeDom11, $EquipeDomCap11, $EquipeDomNum11, $ClubDom);
}
if ($tactiqueA == "3-4-3") {
	$lignes[] = array('1.5', '149', '30', '34', '159', $EquipeDom1, $EquipeDomCap1, $EquipeDomNum1, $ClubDom);
	$lignes[] = array('1.5', '75', '110', '114', '244', $EquipeDom2, $EquipeDomCap2, $EquipeDomNum2, $ClubDom);
	$lignes[] = array('1.5', '149', '90', '104', '159', $EquipeDom3, $EquipeDomCap3, $EquipeDomNum3, $ClubDom);
	$lignes[] = array('1.5', '223', '110', '114', '74', $EquipeDom4, $EquipeDomCap4, $EquipeDomNum4, $ClubDom);
	$lignes[] = array('1.5', '42', '190', '193', '269', $EquipeDom5, $EquipeDomCap5, $EquipeDomNum5, $ClubDom);
	$lignes[] = array('1.5', '108', '160', '168', '199', $EquipeDom6, $EquipeDomCap6, $EquipeDomNum6, $ClubDom);
	$lignes[] = array('1.5', '189', '160', '168', '119', $EquipeDom7, $EquipeDomCap7, $EquipeDomNum7, $ClubDom);
	$lignes[] = array('1.5', '255', '190', '193', '49', $EquipeDom8, $EquipeDomCap8, $EquipeDomNum8, $ClubDom);
	$lignes[] = array('1.5', '67', '244', '259', '239', $EquipeDom9, $EquipeDomCap9, $EquipeDomNum9, $ClubDom);
	$lignes[] = array('1.5', '149', '265', '277', '159', $EquipeDom10, $EquipeDomCap10, $EquipeDomNum10, $ClubDom);
	$lignes[] = array('1.5', '230', '244', '259', '79', $EquipeDom11, $EquipeDomCap11, $EquipeDomNum11, $ClubDom);
}
if ($tactiqueA == "4-3-3") {
	$lignes[] = array('1.5', '149', '30', '34', '159', $EquipeDom1, $EquipeDomCap1, $EquipeDomNum1, $ClubDom);
	$lignes[] = array('1.5', '45', '120', '129', '269', $EquipeDom2, $EquipeDomCap2, $EquipeDomNum2, $ClubDom);
	$lignes[] = array('1.5', '105', '90', '99', '204', $EquipeDom3, $EquipeDomCap3, $EquipeDomNum3, $ClubDom);
	$lignes[] = array('1.5', '192', '90', '99', '114', $EquipeDom4, $EquipeDomCap4, $EquipeDomNum4, $ClubDom);
	$lignes[] = array('1.5', '252', '120', '129', '49', $EquipeDom5, $EquipeDomCap5, $EquipeDomNum5, $ClubDom);
	$lignes[] = array('1.5', '75', '185', '193', '229', $EquipeDom6, $EquipeDomCap6, $EquipeDomNum6, $ClubDom);
	$lignes[] = array('1.5', '149', '165', '178', '159', $EquipeDom7, $EquipeDomCap7, $EquipeDomNum7, $ClubDom);
	$lignes[] = array('1.5', '223', '185', '193', '89', $EquipeDom8, $EquipeDomCap8, $EquipeDomNum8, $ClubDom);
	$lignes[] = array('1.5', '55', '244', '264', '259', $EquipeDom9, $EquipeDomCap9, $EquipeDomNum9, $ClubDom);
	$lignes[] = array('1.5', '149', '265', '272', '159', $EquipeDom10, $EquipeDomCap10, $EquipeDomNum10, $ClubDom);
	$lignes[] = array('1.5', '242', '244', '264', '59', $EquipeDom11, $EquipeDomCap11, $EquipeDomNum11, $ClubDom);
}
if ($tactiqueA == "4-4-2") {
	$lignes[] = array('1.5', '149', '30', '34', '159', $EquipeDom1, $EquipeDomCap1, $EquipeDomNum1, $ClubDom);
	$lignes[] = array('1.5', '45', '120', '129', '269', $EquipeDom2, $EquipeDomCap2, $EquipeDomNum2, $ClubDom);
	$lignes[] = array('1.5', '110', '100', '109', '199', $EquipeDom3, $EquipeDomCap3, $EquipeDomNum3, $ClubDom);
	$lignes[] = array('1.5', '187', '100', '109', '119', $EquipeDom4, $EquipeDomCap4, $EquipeDomNum4, $ClubDom);
	$lignes[] = array('1.5', '252', '120', '129', '49', $EquipeDom5, $EquipeDomCap5, $EquipeDomNum5, $ClubDom);
	$lignes[] = array('1.5', '45', '215', '216', '269', $EquipeDom6, $EquipeDomCap6, $EquipeDomNum6, $ClubDom);
	$lignes[] = array('1.5', '110', '180', '191', '199', $EquipeDom7, $EquipeDomCap7, $EquipeDomNum7, $ClubDom);
	$lignes[] = array('1.5', '187', '180', '191', '119', $EquipeDom8, $EquipeDomCap8, $EquipeDomNum8, $ClubDom);
	$lignes[] = array('1.5', '252', '215', '216', '49', $EquipeDom9, $EquipeDomCap9, $EquipeDomNum9, $ClubDom);
	$lignes[] = array('1.5', '100', '265', '272', '199', $EquipeDom10, $EquipeDomCap10, $EquipeDomNum10, $ClubDom);
	$lignes[] = array('1.5', '197', '265', '272', '119', $EquipeDom11, $EquipeDomCap11, $EquipeDomNum11, $ClubDom);
}
if ($tactiqueA == "4-4-2-(2)") {
	$lignes[] = array('1.5', '149', '30', '34', '159', $EquipeDom1, $EquipeDomCap1, $EquipeDomNum1, $ClubDom);
	$lignes[] = array('1.5', '35', '106', '125', '280', $EquipeDom2, $EquipeDomCap2, $EquipeDomNum2, $ClubDom);
	$lignes[] = array('1.5', '109', '95', '115', '200', $EquipeDom3, $EquipeDomCap3, $EquipeDomNum3, $ClubDom);
	$lignes[] = array('1.5', '183', '95', '115', '118', $EquipeDom4, $EquipeDomCap4, $EquipeDomNum4, $ClubDom);
	$lignes[] = array('1.5', '261', '106', '125', '37', $EquipeDom5, $EquipeDomCap5, $EquipeDomNum5, $ClubDom);
	$lignes[] = array('1.5', '149', '148', '160', '159', $EquipeDom6, $EquipeDomCap6, $EquipeDomNum6, $ClubDom);
	$lignes[] = array('1.5', '93', '182', '200', '218', $EquipeDom7, $EquipeDomCap7, $EquipeDomNum7, $ClubDom);
	$lignes[] = array('1.5', '205', '182', '200', '98', $EquipeDom8, $EquipeDomCap8, $EquipeDomNum8, $ClubDom);
	$lignes[] = array('1.5', '149', '217', '235', '159', $EquipeDom9, $EquipeDomCap9, $EquipeDomNum9, $ClubDom);
	$lignes[] = array('1.5', '102', '256', '277', '209', $EquipeDom10, $EquipeDomCap10, $EquipeDomNum10, $ClubDom);
	$lignes[] = array('1.5', '196', '256', '277', '109', $EquipeDom11, $EquipeDomCap11, $EquipeDomNum11, $ClubDom);
}
if ($tactiqueA == "3-5-2") {
	$lignes[] = array('1.5', '149', '30', '34', '159', $EquipeDom1, $EquipeDomCap1, $EquipeDomNum1, $ClubDom);
	$lignes[] = array('1.5', '66', '105', '117', '249', $EquipeDom2, $EquipeDomCap2, $EquipeDomNum2, $ClubDom);
	$lignes[] = array('1.5', '149', '90', '108', '159', $EquipeDom3, $EquipeDomCap3, $EquipeDomNum3, $ClubDom);
	$lignes[] = array('1.5', '232', '105', '117', '69', $EquipeDom4, $EquipeDomCap4, $EquipeDomNum4, $ClubDom);
	$lignes[] = array('1.5', '37', '215', '220', '279', $EquipeDom5, $EquipeDomCap5, $EquipeDomNum5, $ClubDom);
	$lignes[] = array('1.5', '105', '191', '195', '219', $EquipeDom6, $EquipeDomCap6, $EquipeDomNum6, $ClubDom);
	$lignes[] = array('1.5', '149', '143', '183', '159', $EquipeDom7, $EquipeDomCap7, $EquipeDomNum7, $ClubDom);
	$lignes[] = array('1.5', '192', '191', '195', '99', $EquipeDom8, $EquipeDomCap8, $EquipeDomNum8, $ClubDom);
	$lignes[] = array('1.5', '260', '215', '217', '40', $EquipeDom9, $EquipeDomCap9, $EquipeDomNum9, $ClubDom);
	$lignes[] = array('1.5', '100', '265', '272', '199', $EquipeDom10, $EquipeDomCap10, $EquipeDomNum10, $ClubDom);
	$lignes[] = array('1.5', '197', '265', '272', '119', $EquipeDom11, $EquipeDomCap11, $EquipeDomNum11, $ClubDom);
}
if ($tactiqueA == "4-2-3-1") {
	$lignes[] = array('1.5', '149', '30', '34', '159', $EquipeDom1, $EquipeDomCap1, $EquipeDomNum1, $ClubDom);
	$lignes[] = array('1.5', '47', '120', '139', '269', $EquipeDom2, $EquipeDomCap2, $EquipeDomNum2, $ClubDom);
	$lignes[] = array('1.5', '105', '90', '109', '199', $EquipeDom3, $EquipeDomCap3, $EquipeDomNum3, $ClubDom);
	$lignes[] = array('1.5', '192', '90', '109', '119', $EquipeDom4, $EquipeDomCap4, $EquipeDomNum4, $ClubDom);
	$lignes[] = array('1.5', '250', '120', '139', '49', $EquipeDom5, $EquipeDomCap5, $EquipeDomNum5, $ClubDom);
	$lignes[] = array('1.5', '105', '165', '179', '219', $EquipeDom6, $EquipeDomCap6, $EquipeDomNum6, $ClubDom);
	$lignes[] = array('1.5', '192', '165', '179', '99', $EquipeDom7, $EquipeDomCap7, $EquipeDomNum7, $ClubDom);
	$lignes[] = array('1.5', '47', '225', '238', '269', $EquipeDom8, $EquipeDomCap8, $EquipeDomNum8, $ClubDom);
	$lignes[] = array('1.5', '149', '215', '198', '159', $EquipeDom9, $EquipeDomCap9, $EquipeDomNum9, $ClubDom);
	$lignes[] = array('1.5', '250', '225', '238', '49', $EquipeDom10, $EquipeDomCap10, $EquipeDomNum10, $ClubDom);
	$lignes[] = array('1.5', '149', '265', '272', '159', $EquipeDom11, $EquipeDomCap11, $EquipeDomNum11, $ClubDom);
}
if ($tactiqueA == "5-4-1") {
	$lignes[] = array('1.5', '149', '40', '34', '159', $EquipeDom1, $EquipeDomCap1, $EquipeDomNum1, $ClubDom);
	$lignes[] = array('1.5', '37', '160', '169', '289', $EquipeDom2, $EquipeDomCap2, $EquipeDomNum2, $ClubDom);
	$lignes[] = array('1.5', '95', '130', '139', '224', $EquipeDom3, $EquipeDomCap3, $EquipeDomNum3, $ClubDom);
	$lignes[] = array('1.5', '149', '90', '119', '159', $EquipeDom4, $EquipeDomCap4, $EquipeDomNum4, $ClubDom);
	$lignes[] = array('1.5', '202', '130', '139', '94', $EquipeDom5, $EquipeDomCap5, $EquipeDomNum5, $ClubDom);
	$lignes[] = array('1.5', '260', '160', '169', '29', $EquipeDom6, $EquipeDomCap6, $EquipeDomNum6, $ClubDom);
	$lignes[] = array('1.5', '45', '245', '256', '269', $EquipeDom7, $EquipeDomCap7, $EquipeDomNum7, $ClubDom);
	$lignes[] = array('1.5', '100', '200', '211', '199', $EquipeDom8, $EquipeDomCap8, $EquipeDomNum8, $ClubDom);
	$lignes[] = array('1.5', '197', '200', '211', '119', $EquipeDom9, $EquipeDomCap9, $EquipeDomNum9, $ClubDom);
	$lignes[] = array('1.5', '252', '245', '256', '49', $EquipeDom10, $EquipeDomCap10, $EquipeDomNum10, $ClubDom);
	$lignes[] = array('1.5', '149', '275', '272', '159', $EquipeDom11, $EquipeDomCap11, $EquipeDomNum11, $ClubDom);
}

/*----------  Equipe Ext  ----------*/
// if ($tactiqueA = "B") {
// 	$lignes[] = array('', '', '', '', '', '', '', '', '');
// 	$lignes[] = array('', '', '', '', '', '', '', '', '');
// 	$lignes[] = array('', '', '', '', '', '', '', '', '');
// 	$lignes[] = array('', '', '', '', '', '', '', '', '');
// 	$lignes[] = array('', '', '', '', '', '', '', '', '');
// 	$lignes[] = array('', '', '', '', '', '', '', '', '');
// 	$lignes[] = array('', '', '', '', '', '', '', '', '');
// 	$lignes[] = array('', '', '', '', '', '', '', '', '');
// 	$lignes[] = array('', '', '', '', '', '', '', '', '');
// 	$lignes[] = array('', '', '', '', '', '', '', '', '');
// 	$lignes[] = array('', '', '', '', '', '', '', '', '');
// }
// if ($tactiqueB = "B") {
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt1, $EquipeExtCap1, $EquipeExtNum1, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt2, $EquipeExtCap2, $EquipeExtNum2, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt3, $EquipeExtCap3, $EquipeExtNum3, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt4, $EquipeExtCap4, $EquipeExtNum4, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt5, $EquipeExtCap5, $EquipeExtNum5, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt6, $EquipeExtCap6, $EquipeExtNum6, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt7, $EquipeExtCap7, $EquipeExtNum7, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt8, $EquipeExtCap8, $EquipeExtNum8, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt9, $EquipeExtCap9, $EquipeExtNum9, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt10, $EquipeExtCap10, $EquipeExtNum10, $ClubExt);
// 	$lignes[] = array('0', '0', '0', '0', $EquipeExt11, $EquipeExtCap11, $EquipeExtNum11, $ClubExt);
// }
if ($tactiqueB == "3-4-2-1") {
	$lignes[] = array('1.5', '149', '557', '593', '159', $EquipeExt1, $EquipeExtCap1, $EquipeExtNum1, $ClubExt);
	$lignes[] = array('1.5', '235', '475', '510', '73', $EquipeExt2, $EquipeExtCap2, $EquipeExtNum2, $ClubExt);
	$lignes[] = array('1.5', '149', '475', '510', '159', $EquipeExt3, $EquipeExtCap3, $EquipeExtNum3, $ClubExt);
	$lignes[] = array('1.5', '65', '475', '510', '250', $EquipeExt4, $EquipeExtCap4, $EquipeExtNum4, $ClubExt);
	$lignes[] = array('1.5', '265', '420', '455', '28', $EquipeExt5, $EquipeExtCap5, $EquipeExtNum5, $ClubExt);
	$lignes[] = array('1.5', '191', '420', '455', '112', $EquipeExt6, $EquipeExtCap6, $EquipeExtNum6, $ClubExt);
	$lignes[] = array('1.5', '105', '420', '455', '204', $EquipeExt7, $EquipeExtCap7, $EquipeExtNum7, $ClubExt);
	$lignes[] = array('1.5', '31', '420', '455', '282', $EquipeExt8, $EquipeExtCap8, $EquipeExtNum8, $ClubExt);
	$lignes[] = array('1.5', '179', '370', '403', '129', $EquipeExt9, $EquipeExtCap9, $EquipeExtNum9, $ClubExt);
	$lignes[] = array('1.5', '119', '370', '403', '189', $EquipeExt10, $EquipeExtCap10, $EquipeExtNum10, $ClubExt);
	$lignes[] = array('1.5', '149', '318', '353', '159', $EquipeExt11, $EquipeExtCap11, $EquipeExtNum11, $ClubExt);
}
if ($tactiqueB == "3-4-1-2") {
	$lignes[] = array('1.5', '149', '557', '593', '159', $EquipeExt1, $EquipeExtCap1, $EquipeExtNum1, $ClubExt);
	$lignes[] = array('1.5', '235', '475', '510', '73', $EquipeExt2, $EquipeExtCap2, $EquipeExtNum2, $ClubExt);
	$lignes[] = array('1.5', '149', '475', '510', '159', $EquipeExt3, $EquipeExtCap3, $EquipeExtNum3, $ClubExt);
	$lignes[] = array('1.5', '65', '475', '510', '250', $EquipeExt4, $EquipeExtCap4, $EquipeExtNum4, $ClubExt);
	$lignes[] = array('1.5', '265', '420', '455', '28', $EquipeExt5, $EquipeExtCap5, $EquipeExtNum5, $ClubExt);
	$lignes[] = array('1.5', '191', '420', '455', '112', $EquipeExt6, $EquipeExtCap6, $EquipeExtNum6, $ClubExt);
	$lignes[] = array('1.5', '105', '420', '455', '197', $EquipeExt7, $EquipeExtCap7, $EquipeExtNum7, $ClubExt);
	$lignes[] = array('1.5', '31', '420', '455', '282', $EquipeExt8, $EquipeExtCap8, $EquipeExtNum8, $ClubExt);
	$lignes[] = array('1.5', '149', '370', '403', '159', $EquipeExt9, $EquipeExtCap9, $EquipeExtNum9, $ClubExt);
	$lignes[] = array('1.5', '179', '318', '355', '115', $EquipeExt10, $EquipeExtCap10, $EquipeExtNum10, $ClubExt);
	$lignes[] = array('1.5', '119', '318', '355', '205', $EquipeExt11, $EquipeExtCap11, $EquipeExtNum11, $ClubExt);
}
if ($tactiqueB == "3-4-3") {
	$lignes[] = array('1.5', '149', '557', '593', '159', $EquipeExt1, $EquipeExtCap1, $EquipeExtNum1, $ClubExt);
	$lignes[] = array('1.5', '223', '477', '513', '74', $EquipeExt2, $EquipeExtCap2, $EquipeExtNum2, $ClubExt);
	$lignes[] = array('1.5', '149', '497', '523', '159', $EquipeExt3, $EquipeExtCap3, $EquipeExtNum3, $ClubExt);
	$lignes[] = array('1.5', '75', '477', '513', '244', $EquipeExt4, $EquipeExtCap4, $EquipeExtNum4, $ClubExt);
	$lignes[] = array('1.5', '255', '397', '434', '49', $EquipeExt5, $EquipeExtCap5, $EquipeExtNum5, $ClubExt);
	$lignes[] = array('1.5', '190', '427', '459', '119', $EquipeExt6, $EquipeExtCap6, $EquipeExtNum6, $ClubExt);
	$lignes[] = array('1.5', '108', '427', '459', '199', $EquipeExt7, $EquipeExtCap7, $EquipeExtNum7, $ClubExt);
	$lignes[] = array('1.5', '42', '397', '434', '269', $EquipeExt8, $EquipeExtCap8, $EquipeExtNum8, $ClubExt);
	$lignes[] = array('1.5', '230', '343', '368', '79', $EquipeExt9, $EquipeExtCap9, $EquipeExtNum9, $ClubExt);
	$lignes[] = array('1.5', '149', '322', '350', '159', $EquipeExt10, $EquipeExtCap10, $EquipeExtNum10, $ClubExt);
	$lignes[] = array('1.5', '67', '343', '368', '239', $EquipeExt11, $EquipeExtCap11, $EquipeExtNum11, $ClubExt);
}
if ($tactiqueB == "4-3-3") {
	$lignes[] = array('1.5', '149', '557', '593', '159', $EquipeExt1, $EquipeExtCap1, $EquipeExtNum1, $ClubExt);
	$lignes[] = array('1.5', '252', '467', '498', '49', $EquipeExt2, $EquipeExtCap2, $EquipeExtNum2, $ClubExt);
	$lignes[] = array('1.5', '193', '497', '528', '114', $EquipeExt3, $EquipeExtCap3, $EquipeExtNum3, $ClubExt);
	$lignes[] = array('1.5', '106', '497', '528', '204', $EquipeExt4, $EquipeExtCap4, $EquipeExtNum4, $ClubExt);
	$lignes[] = array('1.5', '45', '467', '498', '269', $EquipeExt5, $EquipeExtCap5, $EquipeExtNum5, $ClubExt);
	$lignes[] = array('1.5', '223', '402', '434', '89', $EquipeExt6, $EquipeExtCap6, $EquipeExtNum6, $ClubExt);
	$lignes[] = array('1.5', '149', '422', '449', '159', $EquipeExt7, $EquipeExtCap7, $EquipeExtNum7, $ClubExt);
	$lignes[] = array('1.5', '75', '402', '434', '229', $EquipeExt8, $EquipeExtCap8, $EquipeExtNum8, $ClubExt);
	$lignes[] = array('1.5', '242', '343', '363', '59', $EquipeExt9, $EquipeExtCap9, $EquipeExtNum9, $ClubExt);
	$lignes[] = array('1.5', '149', '322', '355', '159', $EquipeExt10, $EquipeExtCap10, $EquipeExtNum10, $ClubExt);
	$lignes[] = array('1.5', '55', '343', '363', '259', $EquipeExt11, $EquipeExtCap11, $EquipeExtNum11, $ClubExt);
}
if ($tactiqueB == "4-4-2") {
	$lignes[] = array('1.5', '149', '557', '593', '159', $EquipeExt1, $EquipeExtCap1, $EquipeExtNum1, $ClubExt);
	$lignes[] = array('1.5', '252', '467', '498', '49', $EquipeExt2, $EquipeExtCap2, $EquipeExtNum2, $ClubExt);
	$lignes[] = array('1.5', '187', '487', '518', '119', $EquipeExt3, $EquipeExtCap3, $EquipeExtNum3, $ClubExt);
	$lignes[] = array('1.5', '110', '487', '518', '199', $EquipeExt4, $EquipeExtCap4, $EquipeExtNum4, $ClubExt);
	$lignes[] = array('1.5', '45', '467', '498', '269', $EquipeExt5, $EquipeExtCap5, $EquipeExtNum5, $ClubExt);
	$lignes[] = array('1.5', '252', '372', '411', '49', $EquipeExt6, $EquipeExtCap6, $EquipeExtNum6, $ClubExt);
	$lignes[] = array('1.5', '187', '407', '436', '119', $EquipeExt7, $EquipeExtCap7, $EquipeExtNum7, $ClubExt);
	$lignes[] = array('1.5', '110', '407', '436', '199', $EquipeExt8, $EquipeExtCap8, $EquipeExtNum8, $ClubExt);
	$lignes[] = array('1.5', '45', '372', '411', '269', $EquipeExt9, $EquipeExtCap9, $EquipeExtNum9, $ClubExt);
	$lignes[] = array('1.5', '197', '322', '355', '119', $EquipeExt10, $EquipeExtCap10, $EquipeExtNum10, $ClubExt);
	$lignes[] = array('1.5', '100', '322', '355', '199', $EquipeExt11, $EquipeExtCap11, $EquipeExtNum11, $ClubExt);
}
if ($tactiqueB == "4-4-2-(2)") {
	$lignes[] = array('1.5', '149', '557', '593', '159', $EquipeExt1, $EquipeExtCap1, $EquipeExtNum1, $ClubExt);
	$lignes[] = array('1.5', '261', '480', '500', '37', $EquipeExt2, $EquipeExtCap2, $EquipeExtNum2, $ClubExt);
	$lignes[] = array('1.5', '183', '490', '510', '118', $EquipeExt3, $EquipeExtCap3, $EquipeExtNum3, $ClubExt);
	$lignes[] = array('1.5', '109', '490', '510', '200', $EquipeExt4, $EquipeExtCap4, $EquipeExtNum4, $ClubExt);
	$lignes[] = array('1.5', '35', '480', '500', '280', $EquipeExt5, $EquipeExtCap5, $EquipeExtNum5, $ClubExt);
	$lignes[] = array('1.5', '149', '440', '465', '159', $EquipeExt6, $EquipeExtCap6, $EquipeExtNum6, $ClubExt);
	$lignes[] = array('1.5', '205', '405', '428', '98', $EquipeExt7, $EquipeExtCap7, $EquipeExtNum7, $ClubExt);
	$lignes[] = array('1.5', '93', '405', '428', '218', $EquipeExt8, $EquipeExtCap8, $EquipeExtNum8, $ClubExt);
	$lignes[] = array('1.5', '149', '370', '390', '159', $EquipeExt9, $EquipeExtCap9, $EquipeExtNum9, $ClubExt);
	$lignes[] = array('1.5', '102', '330', '349', '109', $EquipeExt10, $EquipeExtCap10, $EquipeExtNum10, $ClubExt);
	$lignes[] = array('1.5', '196', '330', '349', '209', $EquipeExt11, $EquipeExtCap11, $EquipeExtNum11, $ClubExt);
}
if ($tactiqueB == "3-5-2") {
	$lignes[] = array('1.5', '149', '557', '593', '159', $EquipeExt1, $EquipeExtCap1, $EquipeExtNum1, $ClubExt);
	$lignes[] = array('1.5', '233', '482', '507', '69', $EquipeExt2, $EquipeExtCap2, $EquipeExtNum2, $ClubExt);
	$lignes[] = array('1.5', '149', '497', '520', '159', $EquipeExt3, $EquipeExtCap3, $EquipeExtNum3, $ClubExt);
	$lignes[] = array('1.5', '66', '482', '507', '249', $EquipeExt4, $EquipeExtCap4, $EquipeExtNum4, $ClubExt);
	$lignes[] = array('1.5', '260', '372', '410', '40', $EquipeExt5, $EquipeExtCap5, $EquipeExtNum5, $ClubExt);
	$lignes[] = array('1.5', '192', '396', '432', '99', $EquipeExt6, $EquipeExtCap6, $EquipeExtNum6, $ClubExt);
	$lignes[] = array('1.5', '149', '444', '444', '159', $EquipeExt7, $EquipeExtCap7, $EquipeExtNum7, $ClubExt);
	$lignes[] = array('1.5', '105', '396', '432', '219', $EquipeExt8, $EquipeExtCap8, $EquipeExtNum8, $ClubExt);
	$lignes[] = array('1.5', '37', '372', '410', '279', $EquipeExt9, $EquipeExtCap9, $EquipeExtNum9, $ClubExt);
	$lignes[] = array('1.5', '197', '322', '355', '119', $EquipeExt10, $EquipeExtCap10, $EquipeExtNum10, $ClubExt);
	$lignes[] = array('1.5', '100', '322', '355', '199', $EquipeExt11, $EquipeExtCap11, $EquipeExtNum11, $ClubExt);
}
if ($tactiqueB == "4-2-3-1") {
	$lignes[] = array('1.5', '149', '557', '593', '159', $EquipeExt1, $EquipeExtCap1, $EquipeExtNum1, $ClubExt);
	$lignes[] = array('1.5', '250', '467', '488', '49', $EquipeExt2, $EquipeExtCap2, $EquipeExtNum2, $ClubExt);
	$lignes[] = array('1.5', '193', '497', '518', '119', $EquipeExt3, $EquipeExtCap3, $EquipeExtNum3, $ClubExt);
	$lignes[] = array('1.5', '106', '497', '518', '199', $EquipeExt4, $EquipeExtCap4, $EquipeExtNum4, $ClubExt);
	$lignes[] = array('1.5', '47', '467', '488', '269', $EquipeExt5, $EquipeExtCap5, $EquipeExtNum5, $ClubExt);
	$lignes[] = array('1.5', '193', '422', '446', '99', $EquipeExt6, $EquipeExtCap6, $EquipeExtNum6, $ClubExt);
	$lignes[] = array('1.5', '106', '422', '446', '219', $EquipeExt7, $EquipeExtCap7, $EquipeExtNum7, $ClubExt);
	$lignes[] = array('1.5', '250', '362', '389', '49', $EquipeExt8, $EquipeExtCap8, $EquipeExtNum8, $ClubExt);
	$lignes[] = array('1.5', '149', '372', '429', '159', $EquipeExt9, $EquipeExtCap9, $EquipeExtNum9, $ClubExt);
	$lignes[] = array('1.5', '47', '362', '389', '269', $EquipeExt10, $EquipeExtCap10, $EquipeExtNum10, $ClubExt);
	$lignes[] = array('1.5', '149', '322', '355', '159', $EquipeExt11, $EquipeExtCap11, $EquipeExtNum11, $ClubExt);
}
if ($tactiqueB == "5-4-1") {
	$lignes[] = array('1.5', '149', '557', '593', '159', $EquipeExt1, $EquipeExtCap1, $EquipeExtNum1, $ClubExt);
	$lignes[] = array('1.5', '260', '427', '458', '29', $EquipeExt2, $EquipeExtCap2, $EquipeExtNum2, $ClubExt);
	$lignes[] = array('1.5', '202', '457', '488', '94', $EquipeExt3, $EquipeExtCap3, $EquipeExtNum3, $ClubExt);
	$lignes[] = array('1.5', '149', '497', '513', '159', $EquipeExt4, $EquipeExtCap4, $EquipeExtNum4, $ClubExt);
	$lignes[] = array('1.5', '95', '457', '488', '224', $EquipeExt5, $EquipeExtCap5, $EquipeExtNum5, $ClubExt);
	$lignes[] = array('1.5', '37', '427', '458', '289', $EquipeExt6, $EquipeExtCap6, $EquipeExtNum6, $ClubExt);
	$lignes[] = array('1.5', '252', '342', '371', '49', $EquipeExt7, $EquipeExtCap7, $EquipeExtNum7, $ClubExt);
	$lignes[] = array('1.5', '197', '387', '416', '119', $EquipeExt8, $EquipeExtCap8, $EquipeExtNum8, $ClubExt);
	$lignes[] = array('1.5', '100', '387', '416', '199', $EquipeExt9, $EquipeExtCap9, $EquipeExtNum9, $ClubExt);
	$lignes[] = array('1.5', '45', '342', '371', '269', $EquipeExt10, $EquipeExtCap10, $EquipeExtNum10, $ClubExt);
	$lignes[] = array('1.5', '149', '327', '355', '159', $EquipeExt11, $EquipeExtCap11, $EquipeExtNum11, $ClubExt);
}
/*=====  End of Construction CSV  ======*/
