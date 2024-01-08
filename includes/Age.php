<?php
/*******************************************************************/
/*     Donne l'âge à partir d'une date de naissance jj/mm/aaaa      */
/*******************************************************************/

function Age($date_naissance)
{
    $arr1 = explode('-', $date_naissance);
    $arr2 = explode('-', date('Y-m-d'));
		
    if(($arr1[1] < $arr2[1]) || (($arr1[1] == $arr2[1]) && ($arr1[2] <= $arr2[2])))
   
    return $arr2[0] - $arr1[0];

    return $arr2[0] - $arr1[0] - 1;
}
?>
