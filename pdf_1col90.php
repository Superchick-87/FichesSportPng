<?php
//=================== POUR BOSSER EN LOCAL ==========================

$RencontreF=$_GET['front'];
$Part=$_GET['Part'];
$discipline=$_GET['Discipline'];

include (dirname(__FILE__).'/includes/ddc.php');
function nomFormat($a){
			$a = str_replace(' ','', $a);
			$a = str_replace('x','', $a);
			return $a;	
		}

//===================================================================


include (dirname(__FILE__).'/datas/'.$discipline.'/Datas_'.$RencontreF.'.php');
include (dirname(__FILE__).'/includes/SinguPluriel_pdf.php');
include (dirname(__FILE__).'/includes/colorSet'.$discipline.'_pdf.php');
include (dirname(__FILE__).'/includes/colorVictoireDefaite.php');
include (dirname(__FILE__).'/includes/Pourcentage.php');



// Fonction pour lire un fichier csv
function read($csv){
    $file = fopen($csv, 'r');
    while (!feof($file) ) {
        $line[] = fgetcsv($file, 1024);
    }
    fclose($file);
    return $line;
}
$csv = dirname(__FILE__).'/datas/'.$discipline.'/Rencontre_'.$RencontreF.'.csv';
$csv = read($csv);

// echo $csv[2][1];
// echo '<pre>';
// print_r($csv);
// echo '</pre>';

//============================================================+
// File name   : example_002.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 002 for TCPDF class
//               Removing Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('TCPDF-master/tcpdf.php');
// header('Content-Type: text/html; charset=utf-8');
// create new PDF document
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pageLayout = array(97,125); //  or array($height, $width) 
$pdf = new TCPDF('P', 'mm', $pageLayout, true, 'UTF-8', false);


// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicolas Peyrebrune');
$pdf->SetTitle('Infographie Composition '.$discipline.''.$RencontreF.''.$Part.'_190');
$pdf->SetSubject('Infographie');
$pdf->SetKeywords('Infographie, SUDOUEST, sport, composition, match');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(0,0,0,0);
// set auto page breaks
// $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetAutoPageBreak(FALSE,0);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/fra.php')) {
	require_once(dirname(__FILE__).'/lang/fra.php');
	$pdf->setLanguageArray($l);
}
// set default font subsetting mode
// $pdf->setFontSubsetting(true);

// ---------------------------------------------------------

// add a page
$pdf->AddPage();

$EquipeD = ddc($DatasFront[2]);
$EquipeE = ddc($DatasFront[3]);

$colorFill ='';
// echo $DatasFront[2];
// echo $EquipeD;


$border=1;

$colorNum ="";
$colorNumD = CouleurNum($EquipeD,$colorNum);
$colorNumE = CouleurNum($EquipeE,$colorNum);

$colorFondD = CouleurFond($EquipeD,$colorFill);
$colorFondE = CouleurFond($EquipeE,$colorFill);
/////////////////////////
//////// TERRAIN ////////
/////////////////////////

	//////// Paramètres terrain ////////
	$tailleRond=1.8;
	// setlocale(LC_CTYPE, 'de_DE.UTF8');

	//////// Fond ////////
	// // $pdf->ImageSVG($file, $x=30, $y=100, $w='', $h=100, $link='', $align='', $palign='', $border=0, $fitonpage=false);
	// $pdf->ImageSVG('css/images/FondTerrainDesktop'.$discipline.'.svg',-4.3,16.5,105,54,'','','', $border,false);
	// $pdf->ImageSVG('css/images/FondTerrainDesktop'.$discipline.'.svg',0,17,97,50,'','','', $border,true);

/////////////////////////
//////// RENCONTRE //////
/////////////////////////

	//////// Paramètres terrain ////////
	$decalY = 5;
	
	//////// LIEU ////////
	// $pdf->SetFont('oswaldmedium','', 7.5);
	// $pdf->SetXY(0, 0);
	// $pdf->Cell(97,3,$DatasFront[4], $border, 0, 'C', 0, '', 1, false, '', 'M');	

	//////// AFFICHE PARTIE GAUCHE ////////
	
	//////// Nom Equipe gauche ////////
	$pdf->SetFont('oswaldmedium', '', 13.5);
	$pdf->SetXY(12, $decalY);
	$pdf->Cell(36.5,12,$DatasFront[2], $border, 0, 'L', 0, '', 1, false, '', 'M');
	
	//////// AFFICHE PARTIE DROITE ////////
	//////// Nom Equipe droite ////////
	// $pdf->SetXY(48.5, $decalY);
	// $pdf->Cell(36.5,12,$DatasFront[3], $border, 0, 'R', 0, '', 1, false, '', 'M');

// if ($discipline=='Rugby'){
// 	//////// ARBITRE ////////
// 	$pdf->SetFont('oswaldmedium','', 7.5);
// 	$pdf->SetXY(0, 13.5);
// 	$pdf->Cell(97,'','- Arbitre : '.$DatasFront[5].' -', $border, 0, 'C', 0, '', 1, false, '', 'M');

// 	// // $pdf->ImageSVG($file, $x=30, $y=100, $w='', $h=100, $link='', $align='', $palign='', $border=0, $fitonpage=false);
// 	$pdf->ImageSVG('css/images/FondTerrainDesktopRugby.svg',-4.3,16.5,105,54,'','','', $border,false);
	
// 	// ---------- Parametres callage ---------
// 		$echelle=0.16;	
// 		$decalGX = 6.3;
// 		$decalDX = 8.2;
// 		$largeurCell = 10.6;
// 	// ---------------------------------------

// 	//////// PARTIE GAUCHE ////////
// 	for ($i=1; $i<16; $i++) { 
// 	//////// cercles ////////	
// 		$pdf->Circle((($csv[$i][4]*$echelle)-1),(($csv[$i][5]*$echelle)+17),$tailleRond,0,360, 'F', '',$colorFondD);
		
// 		//////// Noms ////////	
// 		$pdf->SetFont('oswaldmedium','', 7);
// 		$pdf->SetTextColor(0,0,0,100);
// 		$pdf->SetXY((($csv[$i][4]*$echelle)-$decalGX),(($csv[$i][5]*$echelle)+18.8));
// 		// $pdf->setCellPaddings( $left = '', $top = '', $right = '', $bottom = '');
// 		$pdf->setCellPaddings(0,0,0,0);
// 		$pdf->Cell($largeurCell,'',$csv[$i][7], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
// 		//////// Capitaine ////////
// 		$pdf->SetXY((($csv[$i][4]*$echelle)-$decalGX),(($csv[$i][5]*$echelle)+21.5));
// 		$pdf->Cell($largeurCell,'',$csv[$i][8], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
// 		//////// Numéros ////////	
// 		$pdf->SetFont('oswaldbold','', 7);
// 		$pdf->SetTextColor($colorNumD[0],$colorNumD[1],$colorNumD[2],$colorNumD[3]);
// 		$pdf->SetXY((($csv[$i][4]*$echelle)-$decalGX),(($csv[$i][5]*$echelle)+15.4));
// 		$pdf->Cell($largeurCell,'',$csv[$i][15], $border, 0, 'C', 0, '', 1, false, '', 'M');
// 	}
// 	//////// PARTIE DROITE ////////
// 	for ($i=16; $i<31; $i++) { 
// 		//////// cercles ////////	
// 		$pdf->Circle((($csv[$i][4]*$echelle)-2.8),(($csv[$i][5]*$echelle)+17),$tailleRond,0,360, 'F', '',$colorFondE);
		
// 		////// Noms ////////	
// 		$pdf->SetFont('oswaldmedium','', 7);
// 		$pdf->SetTextColor(0,0,0,100);
// 		$pdf->setCellPaddings(0,0,0,0);
// 		$pdf->SetXY((($csv[$i][4]*$echelle)-$decalDX),(($csv[$i][5]*$echelle)+18.8));
// 		$pdf->Cell($largeurCell,'',$csv[$i][7], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
// 		//////// Capitaine ////////
// 		$pdf->SetXY((($csv[$i][4]*$echelle)-$decalDX),(($csv[$i][5]*$echelle)+21.5));
// 		$pdf->Cell($largeurCell,'',$csv[$i][8], $border, 0, 'C', 0, '', 1, false, '', 'M');

// 		//////// Numéros ////////	
// 		$pdf->SetFont('oswaldbold','', 7);
// 		$pdf->SetTextColor($colorNumE[0],$colorNumE[1],$colorNumE[2],$colorNumE[3]);
// 		$pdf->SetXY((($csv[$i][4]*$echelle)-$decalDX),(($csv[$i][5]*$echelle)+15.4));
// 		$pdf->Cell($largeurCell,'',$csv[$i][15], $border, 0, 'C', 0, '', 1, false, '', 'M');
// 	}
// }
if ($discipline=='Foot' & $Part=='Dom'){

	// ---------- Fond de terrain ---------
		// $pdf->ImageSVG($file, $x=30, $y=100, $w='', $h=100, $link='', $align='', $palign='', $border=0, $fitonpage=false);
		$pdf->ImageSVG('css/images/FondTerrainMobileFoot.svg',0,20,46,90,'','','', $border,false);
	
		//////// ARBITRE ////////
		$pdf->SetFont('oswaldmedium','', 7.5);
		$pdf->SetXY(0, 15);
		$pdf->Cell(46,'','- Arbitre : '.$DatasFront[5].' -', $border, 0, 'C', 0, '', 1, false, '', 'M');
		
	// ---------- Logo Dom haut ---------
		$pdf->ImageSVG('css/images/clubs/'.$discipline.'/'.$EquipeD.'.svg',0,$decalY,12,12,'','','', $border,true);

	// ---------- Parametres callage ---------
		$echelle=0.18;
		$largeurCell = 12;
		$decalGX = 6.5;
		$decalDX = 4.5;
		$decalYnoms = 20;
		// ---------------------------
		$decalYnumb = $decalYnoms-3.3;
		$decalYrond = $decalYnoms-1.8;
		
	// ---------------------------------------

	for ($i=1; $i<12; $i++) { 
		//////// cercles ////////	
		$pdf->Circle((($csv[$i][2]*$echelle)+1.5),(($csv[$i][3]*$echelle)+$decalYrond),$tailleRond,0,360, 'F', '',$colorFondD);
		
		//////// Noms ////////	
		$pdf->SetFont('oswaldbold','', 7);
		$pdf->SetTextColor(0,0,0,100);
		$pdf->setCellPaddings(0,0,0,0);
		$pdf->SetXY((($csv[$i][2]*$echelle)-$decalGX),(($csv[$i][3]*$echelle)+$decalYnoms));
		$pdf->Cell($largeurCell,'',$csv[$i][7], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
		//////// Capitaine ////////
		$pdf->SetXY((($csv[$i][2]*$echelle)-$decalGX),(($csv[$i][3]*$echelle)+22.5));
		$pdf->Cell($largeurCell,'',$csv[$i][8], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
		//////// Numéros ////////	
		$pdf->SetFont('oswaldbold','', 7);
		$pdf->SetTextColor($colorNumD[0],$colorNumD[1],$colorNumD[2],$colorNumD[3]);
		$pdf->SetXY((($csv[$i][2]*$echelle)-$decalGX),(($csv[$i][3]*$echelle)+$decalYnumb));
		$pdf->Cell($largeurCell,'',$csv[$i][25], $border, 0, 'C', 0, '', 1, false, '', 'M');
	}
}

	//////// PARTIE DROITE ////////
	// else if ($discipline=='Foot'& $part=='Ext'){
	// 	for ($i=12; $i<23; $i++) { 
	// 		//////// cercles ////////	
	// 		$pdf->Circle((($csv[$i][4]*$echelle)+1.5),(($csv[$i][5]*$echelle)+$decalYrond),$tailleRond,0,360, 'F', '',$colorFondE);
			
	// 		//////// Noms ////////	
	// 		$pdf->SetFont('oswaldbold','', 7);
	// 		$pdf->SetTextColor(0,0,0,100);
	// 		$pdf->setCellPaddings(0,0,0,0);
	// 		$pdf->SetXY((($csv[$i][4]*$echelle)-$decalDX),(($csv[$i][5]*$echelle)+$decalYnoms));
	// 		$pdf->Cell($largeurCell,'',$csv[$i][7], $border, 0, 'C', 0, '', 1, false, '', 'M');
			
	// 		//////// Capitaine ////////
	// 		$pdf->SetXY((($csv[$i][4]*$echelle)-$decalDX),(($csv[$i][5]*$echelle)+22.5));
	// 		$pdf->Cell($largeurCell,'',$csv[$i][8], $border, 0, 'C', 0, '', 1, false, '', 'M');
			
	// 		//////// Numéros ////////	
	// 		$pdf->SetFont('oswaldbold','', 7);
	// 		$pdf->SetTextColor($colorNumE[0],$colorNumE[1],$colorNumE[2],$colorNumE[3]);
	// 		$pdf->SetXY((($csv[$i][4]*$echelle)-$decalDX),(($csv[$i][5]*$echelle)+$decalYnumb));
	// 		$pdf->Cell($largeurCell,'',$csv[$i][25], $border, 0, 'C', 0, '', 1, false, '', 'M');
	// 	}
	// }


	//////// Logo droite ////////
// 	$pdf->ImageSVG('css/images/clubs/'.$discipline.'/'.$EquipeE.'.svg',85,$decalY,12,12,'','','', $border,true);
	



// //////// PARTIE DROITE ////////
// $coach = SinguPluriel($discipline);
// $pdf->SetFont('oswaldlight','', 7);
// $BlocBasExt = <<<EOF
// 	<table>
// 		<tr style="background-color:cmyk(0%, 0%, 0%, 100%;)">
// 			<td style="text-align:right; height:10px; color:white;">$coach &nbsp;</td>
// 		</tr>
// 		<tr>
// 			<td style="line-height: 0.15;"></td>
// 		</tr>
// 		<tr>
// 			<td style="text-align:right; line-height: 1.1;">$DatasFront[8]</td>
// 		</tr>
// 		<tr>
// 			<td style="line-height: 0.35;"></td>
// 		</tr>
// 		<tr style="background-color:cmyk(0%, 0%, 0%, 100%);">
// 			<td style="text-align:right; height:10px; color:white;">Remplaçants &nbsp;</td>
// 		</tr>
// 		<tr>
// 			<td style="line-height: 0.15;"></td>
// 		</tr>
// 		<tr>
// 			<td style="text-align:right;line-height: 1.1;">$DatasFront[9]</td>
// 		</tr>
// 	</table>
// EOF;
// $pdf->setCellPaddings(0,0,0.5,0);
// $pdf->SetTextColor(0,0,0,100);
// $pdf->writeHTMLCell(48, '', 49, 71.3, $BlocBasExt, $border, 0, 0, false, 'R',false);



/////////////////////////
//////// SERIE EN COURS ////////
/////////////////////////

	//////// TITRE ////////
	// Line
	$styleLine = array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => '1,1,1,1', 'phase' => 10, 'color' => array(0, 0, 0, 100));


//////////////////////////////
//////// CONFRONTATIONS //////
//////////////////////////////

//////// TITRE ////////
	// Line
	// $styleT = array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => '1,1,1,1', 'phase' => 10, 'color' => array(0, 0, 0, 100));
	// $pdf->Line(0, 111, 97, 111, $styleLine);
	// Texte
	$pdf->SetFont('oswaldmedium','', 12);
	$pdf->SetTextColor(0,0,0,100);
	// Bloc
	$pdf->SetFillColor(0,0,0,0);
	$pdf->SetXY(0, 108);
	$pdf->setCellPaddings(1,0,1,0);
	//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
	$pdf->Cell('46','','Les '.$DatasFront[23].' dernières confrontations', $border, 0, 'C', 1, '', 1, false, '', 'M');


////////// Graphe ////////
	
	// ----- Donne la longueur en pourcentage ---------
		$pourcentageGraph=pourcentagePdf($DatasFront[20],$DatasFront[23]);
		$pourcentageGraph2=pourcentagePdf($DatasFront[21],$DatasFront[23]);
		$pourcentageGraph3=pourcentagePdf($DatasFront[22],$DatasFront[23]);
	// -------------------------------------------------	
	
	// ----- Etabli une règle aux sections -------------
		function widht($x,$y){
			if ($x == 0) {
				$y = 0.01;
				return $y;
			}
			else{
				$y = $x;
				return $y;
			}
		}
		$y='';
		$widht = widht($pourcentageGraph,$y);
		$widht2 = widht($pourcentageGraph2,$y);
		$widht3 = widht($pourcentageGraph3,$y);

		// echo $widht.'<br>';
		// echo $widht2.'<br>';
		// echo $widht3.'<br>';

	// -------------------------------------------------
		function afficheMasque($v,$w,$d){
			if ($v != 0) {
				$w = $v.''.$d;
				return $w;
			}
			else{
				$w = '';
				return $w;
			}
		}
$w='';
$d='V';
$e='N';
$score = afficheMasque($DatasFront[20],$w,$d);
$score2 = afficheMasque($DatasFront[21],$w,$e);
$score3 = afficheMasque($DatasFront[22],$w,$d);

	$pdf->SetFont('oswaldregular','', 9);
	//--------- Param graph --------------
	$ratio = 2.8;
	$coorX = 8;
	$coorY = 115.5;
	//--------- Section 1 ----------------
	$pdf->SetXY($coorX, $coorY);
	$pdf->SetFillColor($colorFondD[0],$colorFondD[1],$colorFondD[2],$colorFondD[3]);
	$pdf->SetTextColor($colorNumD[0],$colorNumD[1],$colorNumD[2],$colorNumD[3]);
	//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
	$pdf->Cell(($widht/$ratio),'',$score, $border, 0, 'C', 1, '', 1, false, '', 'M');

	///--------- Section 2 ----------------
	$pdf->SetXY($coorX+($widht/$ratio), $coorY);
	$pdf->SetFillColor(0,0,0,50);
	$pdf->SetTextColor(0,0,0,0);
	$pdf->Cell(($widht2/$ratio),'',$score2, $border, 0, 'C', 1, '', 1, false, '', 'M');

	//--------- Section 3 ----------------
	$pdf->SetXY($coorX+($widht/$ratio)+($widht2/$ratio), $coorY);
	$pdf->SetFillColor($colorFondE[0],$colorFondE[1],$colorFondE[2],$colorFondE[3]);
	$pdf->SetTextColor($colorNumE[0],$colorNumE[1],$colorNumE[2],$colorNumE[3]);
	$pdf->Cell(($widht3/$ratio),'',$score3, $border, 0, 'C', 1, '', 1, false, '', 'M');
	
	//--------- Logo gauche ----------------
	$pdf->ImageSVG('css/images/clubs/'.$discipline.'/'.$EquipeD.'.svg',0,113,8.5,8.5,'','','', $border,true);
	
	//--------- Logo droit ----------------
	$pdf->ImageSVG('css/images/clubs/'.$discipline.'/'.$EquipeE.'.svg',37.75,113,8.5,8.5,'','','', $border,true);
	

/////////////////////////
//////// SIGNATURE ////////
/////////////////////////
	$pdf->ImageSVG('css/images/signature.svg',0,121.5,46,3,'','','', $border,true);


// ---------------------------------------------------------


//Close and output PDF document
$pdf->Output();
// $pdf->Output('ProductionPdf/'.$discipline.'/Compo'.$RencontreF.'_3120.pdf','I');
// $pdf->Output('ProductionPdf/'.$discipline.'/Compo'.$RencontreF.'_'.nomFormat($format).'.pdf','F');
// write some JavaScript code




//============================================================+
// END OF FILE
//============================================================+