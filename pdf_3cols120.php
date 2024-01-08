<?php
// $RencontreF=$_GET['front'];
// $RencontreF=ddc($_GET['RencontreA'].$_GET['RencontreB']);
// $discipline=$_GET['Discipline'];

// include (dirname(__FILE__).'/includes/ddc.php');

include (dirname(__FILE__).'/datas/'.$discipline.'/Datas_'.$RencontreF.'.php');
include (dirname(__FILE__).'/includes/SinguPluriel_pdf.php');
include (dirname(__FILE__).'/includes/colorSet'.$discipline.'_pdf.php');



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
$pageLayout = array(147.5,120); //  or array($height, $width) 
$pdf = new TCPDF('L', 'mm', $pageLayout, true, 'UTF-8', false);


// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicolas Peyrebrune');
$pdf->SetTitle('Infographie Composition '.$discipline.''.$RencontreF.'_3320');
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

//////////////////////////////
//////// RETRANSMISSION //////
//////////////////////////////
$border=0;

if ((!empty($DatasFront[24])) AND (empty($DatasFront[25]))) {
$Tv = <<<EOF
	<div>
		<img style="height:12px; src="css/images/tv/$DatasFront[24].svg"/>
		<span>&nbsp;</span>
		<img style="height:12px;" src="css/images/tv/sudouest.svg"/>
	</div>
EOF;
}
elseif ((!empty($DatasFront[24])) AND (!empty($DatasFront[25]))){
$Tv = <<<EOF
	<div>
		<img style="height:12px;" src="css/images/tv/$DatasFront[24].svg"/>
		<span>&nbsp;</span>
		<img style="height:12px;" src="css/images/tv/$DatasFront[25].svg"/>
		<span>&nbsp;</span>
		<img style="height:12px;" src="css/images/tv/sudouest.svg"/>
	</div>
EOF;
}
elseif ((empty($DatasFront[24])) AND (empty($DatasFront[25]))){
$Tv = <<<EOF
	<div>
		<img style="height:12px;" src="css/images/tv/sudouest.svg"/>
		
	</div>
EOF;
}

$pdf->SetFont('oswaldlight','', 9);
$pdf->SetTextColor(0,0,0,100);
// $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
$pdf->writeHTMLCell(115.5,'', 16, 5, $Tv, $border, 0,0,true, 'C',true);

$colorNum ="";
$colorNumD = CouleurNum($EquipeD,$colorNum);
$colorNumE = CouleurNum($EquipeE,$colorNum);

/////////////////////////
//////// RENCONTRE //////
/////////////////////////

	//////// Paramètres terrain ////////
	$decalY = 4.5;
	
	//////// LIEU ////////
	$pdf->SetFont('oswaldmedium','', 9);
	$pdf->SetXY(0, 0);
	$pdf->Cell(147.5,'',$DatasFront[0].' à '.$DatasFront[1].' - '.$DatasFront[4], $border, 0, 'C', 0, '', 1, false, '', 'M');	

	
/////////////////////////
//////// TERRAIN ////////
/////////////////////////

	//////// Paramètres terrain ////////

	
	$tailleRond=2.75;
	// setlocale(LC_CTYPE, 'de_DE.UTF8');

	//////// Fond ////////
	$pdf->ImageSVG('css/images/FondTerrainDesktop'.$discipline.'.svg',0,17.5,148,77,'','','', $border,true);

	//////// AFFICHE PARTIE GAUCHE ////////
	//////// Logo gauche ////////
	$pdf->ImageSVG('css/images/clubs/'.$discipline.'/'.$EquipeD.'.svg',0,$decalY,16,16,'','','', $border,true);
	//////// Nom Equipe gauche ////////
	$pdf->SetFont('oswaldmedium', '', 18);
	$pdf->SetXY(16, $decalY);
	$pdf->Cell(57.75,16,$DatasFront[2].' - '.$DatasFront[26], $border, 0, 'L', 0, '', 1, false, '', 'M');
	
	//////// AFFICHE PARTIE DROITE ////////
	//////// Nom Equipe droite ////////
	$pdf->SetXY(73.75, $decalY);
	$pdf->Cell(57.75,16,$DatasFront[27].' - '.$DatasFront[3], $border, 0, 'R', 0, '', 1, false, '', 'M');
	//////// Logo droite ////////
	$pdf->ImageSVG('css/images/clubs/'.$discipline.'/'.$EquipeE.'.svg',131.5,$decalY,16,16,'','','', $border,true);

$echelle=0.225;	
if ($discipline=='Rugby'){

	//////// ARBITRE ////////
	$pdf->SetFont('oswaldmedium','', 9);
	$pdf->SetXY(0, 17.5);
	$pdf->Cell(147.5,'','- Arbitre : '.$DatasFront[5].' -', $border, 0, 'C', 0, '', 1, false, '', 'M');
	
	//////// PARTIE GAUCHE ////////
	for ($i=1; $i<16; $i++) { 
	//////// cercles ////////	
		$pdf->Circle((($csv[$i][4]*$echelle)+2),(($csv[$i][5]*$echelle)+17.5),$tailleRond,0,360, 'F', '',CouleurFond($EquipeD,$colorFill));
		//////// Noms ////////	
		$pdf->SetFont('oswaldmedium','', 8);
		$pdf->SetTextColor(0,0,0,100);
		$pdf->SetXY((($csv[$i][4]*$echelle)-8),(($csv[$i][5]*$echelle)+20.5));
		$pdf->Cell(20,'',$csv[$i][7], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
		//////// Capitaine ////////
		$pdf->SetXY((($csv[$i][4]*$echelle)-8),(($csv[$i][5]*$echelle)+23.7));
		$pdf->Cell(20,'',$csv[$i][8], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
		//////// Numéros ////////	
		$pdf->SetFont('oswaldbold','', 9.5);
		$pdf->SetTextColor($colorNumD[0],$colorNumD[1],$colorNumD[2],$colorNumD[3]);
		$pdf->SetXY((($csv[$i][4]*$echelle)-8.1),(($csv[$i][5]*$echelle)+15.4));
		$pdf->Cell(20,'',$csv[$i][15], $border, 0, 'C', 0, '', 1, false, '', 'M');
	}
	//////// PARTIE DROITE ////////
	for ($i=16; $i<31; $i++) { 
		//////// cercles ////////	
		$pdf->Circle((($csv[$i][4]*$echelle)+4),(($csv[$i][5]*$echelle)+17.5),$tailleRond,0,360, 'F', '',CouleurFond($EquipeE,$colorFill));
		////// Noms ////////	
		$pdf->SetFont('oswaldmedium','', 8);
		$pdf->SetTextColor(0,0,0,100);
		$pdf->SetXY((($csv[$i][4]*$echelle)-6),(($csv[$i][5]*$echelle)+20.5));
		$pdf->Cell(20,'',$csv[$i][7], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
		//////// Capitaine ////////
		$pdf->SetXY((($csv[$i][4]*$echelle)-6),(($csv[$i][5]*$echelle)+23.7));
		$pdf->Cell(20,'',$csv[$i][8], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
		//////// Numéros ////////	
		$pdf->SetFont('oswaldbold','', 9.5);
		$pdf->SetTextColor($colorNumE[0],$colorNumE[1],$colorNumE[2],$colorNumE[3]);
		$pdf->SetXY((($csv[$i][4]*$echelle)-5.95),(($csv[$i][5]*$echelle)+15.4));
		$pdf->Cell(20,'',$csv[$i][15], $border, 0, 'C', 0, '', 1, false, '', 'M');
	}
}
elseif ($discipline=='Foot'){
	
	//////// ARBITRE ////////
	$pdf->SetFont('oswaldmedium','', 9);
	$pdf->SetXY(0, 14.5);
	$pdf->Cell(147.5,'','- Arbitre : '.$DatasFront[5].' -', $border, 0, 'C', 0, '', 1, false, '', 'M');

	$echelle=0.23;
	for ($i=1; $i<12; $i++) { 
		//////// cercles ////////	
		$pdf->Circle((($csv[$i][4]*$echelle)+1),(($csv[$i][5]*$echelle)+18),$tailleRond,0,360, 'F', '',couleurFond($EquipeD,$colorFill));
		//////// Noms ////////	
		$pdf->SetFont('oswaldmedium','', 8);
		$pdf->SetTextColor(0,0,0,100);
		$pdf->SetXY((($csv[$i][4]*$echelle)-6.5),(($csv[$i][5]*$echelle)+21));
		$pdf->Cell(15,'',$csv[$i][7], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
		//////// Capitaine ////////
		$pdf->SetXY((($csv[$i][4]*$echelle)-6.5),(($csv[$i][5]*$echelle)+24.2));
		$pdf->Cell(15,'',$csv[$i][8], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
		//////// Numéros ////////	
		$pdf->SetFont('oswaldbold','', 9.5);
		$pdf->SetTextColor($colorNumD[0],$colorNumD[1],$colorNumD[2],$colorNumD[3]);
		$pdf->SetXY((($csv[$i][4]*$echelle)-6.6),(($csv[$i][5]*$echelle)+15.9));
		$pdf->Cell(15,'',$csv[$i][25], $border, 0, 'C', 0, '', 1, false, '', 'M');
	}

	//////// PARTIE DROITE ////////

	for ($i=12; $i<23; $i++) { 
		//////// cercles ////////	
		$pdf->Circle((($csv[$i][4]*$echelle)+2),(($csv[$i][5]*$echelle)+18),$tailleRond,0,360, 'F', '',couleurFond($EquipeE,$colorFill));
		//////// Noms ////////	
		$pdf->SetFont('oswaldmedium','', 8);
		$pdf->SetTextColor(0,0,0,100);
		$pdf->SetXY((($csv[$i][4]*$echelle)-5.5),(($csv[$i][5]*$echelle)+21));
		$pdf->Cell(15,'',$csv[$i][7], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
		//////// Capitaine ////////
		$pdf->SetXY((($csv[$i][4]*$echelle)-5.5),(($csv[$i][5]*$echelle)+24.2));
		$pdf->Cell(15,'',$csv[$i][8], $border, 0, 'C', 0, '', 1, false, '', 'M');

		//////// Numéros ////////	
		$pdf->SetFont('oswaldbold','', 9.5);
		$pdf->SetTextColor($colorNumE[0],$colorNumE[1],$colorNumE[2],$colorNumE[3]);
		$pdf->SetXY((($csv[$i][4]*$echelle)-5.5),(($csv[$i][5]*$echelle)+15.9));
		$pdf->Cell(15,'',$csv[$i][25], $border, 0, 'C', 0, '', 1, false, '', 'M');
	}
}

//////////////////////////////////////////
//////// ENTRAINEURS REMPLACANTS ////////
/////////////////////////////////////////
$coach = SinguPluriel($discipline);
//////// PARTIE GAUCHE ////////
$pdf->SetFont('oswaldlight','', 8.5);
$BlocBasDom = <<<EOF
	<table>
		<tr style="background-color:cmyk(0%, 0%, 0%, 100%);">
			<td style="height:10px; color:white;">&nbsp; $coach</td>
		</tr>
		<tr>
			<td style="line-height: 0.1;"></td>
		</tr>
		<tr>
			<td style="line-height: 1;">$DatasFront[6]</td>
		</tr>
		<tr>
			<td style="line-height: 0.3;"></td>
		</tr>
		<tr style="background-color:cmyk(0%, 0%, 0%, 100%);">
			<td style="height:10px; color:white;">&nbsp; Remplaçants</td>
		</tr>
		<tr>
			<td style="line-height: 0.1;"></td>
		</tr>
		<tr>
			<td style="line-height: 1;">$DatasFront[7]</td>
		</tr>
	</table>		
EOF;
$pdf->SetTextColor(0,0,0,100);
// $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
$pdf->writeHTMLCell(73.75, '', 0, 95, $BlocBasDom, $border, 0,0,true, 'L',true);

//////// PARTIE DROITE ////////
$BlocBasExt = <<<EOF
	<table>
		<tr style="background-color:cmyk(0%, 0%, 0%, 100%;)">
			<td style="height:10px; color:white;">$coach &nbsp;</td>
		</tr>
		<tr>
			<td style="line-height: 0.1;"></td>
		</tr>
		<tr>
			<td style="line-height: 1;">$DatasFront[8]</td>
		</tr>
		<tr>
			<td style="line-height: 0.3;"></td>
		</tr>
		<tr style="background-color:cmyk(0%, 0%, 0%, 100%);">
			<td style="height:10px; color:white;">Remplaçants &nbsp;</td>
		</tr>
		<tr>
			<td style="line-height: 0.1;"></td>
		</tr>
		<tr>
			<td style="line-height: 1;">$DatasFront[9]</td>
		</tr>
	</table>
EOF;
$pdf->SetTextColor(0,0,0,100);
$pdf->writeHTMLCell(73.75, '', 73.75, 95, $BlocBasExt, $border, 0, 0, false, 'R',false);

/////////////////////////
//////// SIGNATURE ////////
/////////////////////////
$pdf->ImageSVG('css/images/signature.svg',0,116.5,148,3.5,'','','', $border,true);


// ---------------------------------------------------------

//Close and output PDF document
// $pdf->Output();
// $pdf->Output('ProductionPdf/'.$discipline.'/Compo'.$RencontreF.'_3120.pdf','I');
$pdf->Output('ProductionPdf/'.$discipline.'/Compo'.$RencontreF.'_'.nomFormat($format).'.pdf','F');


//============================================================+
// END OF FILE
//============================================================+
