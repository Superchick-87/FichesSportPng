<?php
//=================== POUR BOSSER EN LOCAL ==========================

// $RencontreF=$_GET['front'];
// $discipline=$_GET['Discipline'];
// include (dirname(__FILE__).'/includes/ddc.php');
// function nomFormat($a){
// 			$a = str_replace(' ','', $a);
// 			$a = str_replace('x','', $a);
// 			return $a;	
// 		}

//===================================================================


include (dirname(__FILE__).'/datas/'.$discipline.'/Presentation_'.$editeur.'_'.$RencontreF.'.php');
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
$csv = dirname(__FILE__).'/datas/'.$discipline.'/Presentation_'.$editeur.'_'.$RencontreF.'.csv';
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
$pageLayout = array(97,110); //  or array($height, $width) 
$pdf = new TCPDF('P', 'mm', $pageLayout, true, 'UTF-8', false);


// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicolas Peyrebrune');
$pdf->SetTitle('Infographie Composition '.$discipline.''.$RencontreF.'_2125');
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

//////////////////////////////
//////// RETRANSMISSION //////
//////////////////////////////

$border=0;

if ((!empty($DatasFront[24])) AND (empty($DatasFront[25]))) {
$Tv = <<<EOF
	<div>
		<img style="height:12px;" src="css/images/tv/$DatasFront[24].png"/>
		<span>&nbsp;</span>
		<img src="css/images/tv/web$editeur.png" style="height:12px;"/>
	</div>
EOF;
}
elseif ((!empty($DatasFront[24])) AND (!empty($DatasFront[25]))){
$Tv = <<<EOF
	<div>
		<img style="height:12px;" src="css/images/tv/$DatasFront[24].png"/>
		<span>&nbsp;</span>
		<img style="height:12px;" src="css/images/tv/$DatasFront[25].png"/>
		<span>&nbsp;</span>
		<img style="height:12px;" src="css/images/tv/web$editeur.png"/>
	</div>
EOF;
}
elseif ((empty($DatasFront[24])) AND (empty($DatasFront[25]))){
$Tv = <<<EOF
	<div>
		<img style="height:12px;" src="css/images/tv/web$editeur.png"/>
		
	</div>
EOF;
}

$pdf->SetFont('oswaldlight','', 8);
$pdf->SetTextColor(0,0,0,100);
// $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
$pdf->writeHTMLCell(97,4, 0, 4.2, $Tv, $border, 0,0,true, 'C',true);

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
	// // $pdf->Image($file, $x=30, $y=100, $w='', $h=100, $link='', $align='', $palign='', $border=0, $fitonpage=false);
	// $pdf->Image('css/images/FondTerrainDesktop'.$discipline.'.png',-4.3,16.5,105,54,'','','', $border,false);
	// $pdf->Image('css/images/FondTerrainDesktop'.$discipline.'.png',0,17,97,50,'','','', $border,true);

/////////////////////////
//////// RENCONTRE //////
/////////////////////////

	//////// Paramètres terrain ////////
	$decalY = 5;
	
	//////// LIEU ////////
	$pdf->SetFont('oswaldmedium','', 7.5);
	$pdf->SetXY(0, 0);
	$pdf->Cell(97,3,$DatasFront[0].' à '.$DatasFront[1].' - '.$DatasFront[4], $border, 0, 'C', 0, '', 1, false, '', 'M');	

	//////// AFFICHE PARTIE GAUCHE ////////
	$border=0;
	//////// Nom Equipe gauche ////////
	$pdf->SetFont('oswaldmedium', '', 12);
	$pdf->SetXY(11.5, $decalY);
	$pdf->Cell(36.5,12,$DatasFront[2].' - '.$DatasFront[26], $border, 0, 'L', 0, '', 1, false, '', 'M');
	
	//////// AFFICHE PARTIE DROITE ////////
	//////// Nom Equipe droite ////////
	$pdf->SetXY(48.5, $decalY);
	$pdf->Cell(36.5,12,$DatasFront[27].' - '.$DatasFront[3], $border, 0, 'R', 0, '', 1, false, '', 'M');

if ($discipline=='Rugby'){
	//////// ARBITRE ////////
	$pdf->SetFont('oswaldmedium','', 7.5);
	$pdf->SetXY(0, 13.5);
	$pdf->Cell(97,'','- Arbitre : '.$DatasFront[5].' -', $border, 0, 'C', 0, '', 1, false, '', 'M');

	// // $pdf->Image($file, $x=30, $y=100, $w='', $h=100, $link='', $align='', $palign='', $border=0, $fitonpage=false);
	$pdf->ImageSVG('css/images/FondTerrainDesktopRugby.svg',-4.3,16.5,105,54,'','','', $border,false);
	
	// ---------- Parametres callage ---------
		$echelle=0.16;	
		$decalGX = 6.3;
		$decalDX = 8.2;
		$largeurCell = 10.6;
	// ---------------------------------------

	//////// PARTIE GAUCHE ////////
	for ($i=1; $i<16; $i++) { 
	//////// cercles ////////	
		$pdf->Circle((($csv[$i][3]*$echelle)-1),(($csv[$i][4]*$echelle)+17),$tailleRond,0,360, 'F', '',$colorFondD);
		
		//////// Noms ////////	
		$pdf->SetFont('oswaldmedium','', 7);
		$pdf->SetTextColor(0,0,0,100);
		$pdf->SetXY((($csv[$i][3]*$echelle)-$decalGX),(($csv[$i][4]*$echelle)+18.8));
		// $pdf->setCellPaddings( $left = '', $top = '', $right = '', $bottom = '');
		$pdf->setCellPaddings(0,0,0,0);
		$pdf->Cell($largeurCell,'',$csv[$i][5], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
		//////// Capitaine ////////
		$pdf->SetXY((($csv[$i][3]*$echelle)-$decalGX),(($csv[$i][4]*$echelle)+21.5));
		$pdf->Cell($largeurCell,'',$csv[$i][6], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
		//////// Numéros ////////	
		$pdf->SetFont('oswaldbold','', 7);
		$pdf->SetTextColor($colorNumD[0],$colorNumD[1],$colorNumD[2],$colorNumD[3]);
		$pdf->SetXY((($csv[$i][3]*$echelle)-$decalGX),(($csv[$i][4]*$echelle)+15.4));
		$pdf->Cell($largeurCell,'',$csv[$i][7], $border, 0, 'C', 0, '', 1, false, '', 'M');
	}
	//////// PARTIE DROITE ////////
	for ($i=16; $i<31; $i++) { 
		//////// cercles ////////	
		$pdf->Circle((($csv[$i][3]*$echelle)-2.8),(($csv[$i][4]*$echelle)+17),$tailleRond,0,360, 'F', '',$colorFondE);
		
		////// Noms ////////	
		$pdf->SetFont('oswaldmedium','', 7);
		$pdf->SetTextColor(0,0,0,100);
		$pdf->setCellPaddings(0,0,0,0);
		$pdf->SetXY((($csv[$i][3]*$echelle)-$decalDX),(($csv[$i][4]*$echelle)+18.8));
		$pdf->Cell($largeurCell,'',$csv[$i][5], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
		//////// Capitaine ////////
		$pdf->SetXY((($csv[$i][3]*$echelle)-$decalDX),(($csv[$i][4]*$echelle)+21.5));
		$pdf->Cell($largeurCell,'',$csv[$i][6], $border, 0, 'C', 0, '', 1, false, '', 'M');

		//////// Numéros ////////	
		$pdf->SetFont('oswaldbold','', 7);
		$pdf->SetTextColor($colorNumE[0],$colorNumE[1],$colorNumE[2],$colorNumE[3]);
		$pdf->SetXY((($csv[$i][3]*$echelle)-$decalDX),(($csv[$i][4]*$echelle)+15.4));
		$pdf->Cell($largeurCell,'',$csv[$i][7], $border, 0, 'C', 0, '', 1, false, '', 'M');
	}
}
elseif ($discipline=='Foot'){
		// $pdf->Image($file, $x=30, $y=100, $w='', $h=100, $link='', $align='', $palign='', $border=0, $fitonpage=false);
		$pdf->ImageSVG('css/images/FondTerrainDesktopFoot.svg',-1.5,17,100,54,'','','', $border,false);
	
		//////// ARBITRE ////////
		$pdf->SetFont('oswaldmedium','', 7.5);
		$pdf->SetXY(0, 15);
		$pdf->Cell(97,'','- Arbitre : '.$DatasFront[5].' -', $border, 0, 'C', 0, '', 1, false, '', 'M');


	// ---------- Parametres callage ---------
		$echelle=0.15;
		$largeurCell = 12;
		$decalGX = 4.5;
		$decalDX = 4.5;
		$decalYnoms = 20;
		// ---------------------------
		$decalYnumb = $decalYnoms-3.3;
		$decalYrond = $decalYnoms-1.8;
		
	// ---------------------------------------

	for ($i=1; $i<12; $i++) { 
		//////// cercles ////////	
		$pdf->Circle((($csv[$i][3]*$echelle)+1.5),(($csv[$i][4]*$echelle)+$decalYrond),$tailleRond,0,360, 'F', '',$colorFondD);
		
		//////// Noms ////////	
		$pdf->SetFont('oswaldbold','', 7);
		$pdf->SetTextColor(0,0,0,100);
		$pdf->setCellPaddings(0,0,0,0);
		$pdf->SetXY((($csv[$i][3]*$echelle)-$decalGX),(($csv[$i][4]*$echelle)+$decalYnoms));
		$pdf->Cell($largeurCell,'',$csv[$i][5], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
		//////// Capitaine ////////
		$pdf->SetXY((($csv[$i][3]*$echelle)-$decalGX),(($csv[$i][4]*$echelle)+22.5));
		$pdf->Cell($largeurCell,'',$csv[$i][6], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
		//////// Numéros ////////	
		$pdf->SetFont('oswaldbold','', 7);
		$pdf->SetTextColor($colorNumD[0],$colorNumD[1],$colorNumD[2],$colorNumD[3]);
		$pdf->SetXY((($csv[$i][3]*$echelle)-$decalGX),(($csv[$i][4]*$echelle)+$decalYnumb));
		$pdf->Cell($largeurCell,'',$csv[$i][7], $border, 0, 'C', 0, '', 1, false, '', 'M');
	}

	//////// PARTIE DROITE ////////

	for ($i=12; $i<23; $i++) { 
		//////// cercles ////////	
		$pdf->Circle((($csv[$i][3]*$echelle)+1.5),(($csv[$i][4]*$echelle)+$decalYrond),$tailleRond,0,360, 'F', '',$colorFondE);
		
		//////// Noms ////////	
		$pdf->SetFont('oswaldbold','', 7);
		$pdf->SetTextColor(0,0,0,100);
		$pdf->setCellPaddings(0,0,0,0);
		$pdf->SetXY((($csv[$i][3]*$echelle)-$decalDX),(($csv[$i][4]*$echelle)+$decalYnoms));
		$pdf->Cell($largeurCell,'',$csv[$i][5], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
		//////// Capitaine ////////
		$pdf->SetXY((($csv[$i][3]*$echelle)-$decalDX),(($csv[$i][4]*$echelle)+22.5));
		$pdf->Cell($largeurCell,'',$csv[$i][6], $border, 0, 'C', 0, '', 1, false, '', 'M');
		
		//////// Numéros ////////	
		$pdf->SetFont('oswaldbold','', 7);
		$pdf->SetTextColor($colorNumE[0],$colorNumE[1],$colorNumE[2],$colorNumE[3]);
		$pdf->SetXY((($csv[$i][3]*$echelle)-$decalDX),(($csv[$i][4]*$echelle)+$decalYnumb));
		$pdf->Cell($largeurCell,'',$csv[$i][7], $border, 0, 'C', 0, '', 1, false, '', 'M');
	}
}

	/*----------  Ecusson gauche  ----------*/
	$file='css/images/clubs/'.$discipline.'/'.$EquipeD.'.png';
	$x=0;
	$y=$decalY;
	$w=12;
	$h=12;
	$type='';
	$link='';
	$align='';
	$resize=false;
	$dpi=300;
	$palign='';
	$ismask=false;
	$imgmask=false;
	$border=0;
	$fitbox='R'.' ';
	$hidden=false;
	$fitonpage=false;
	$pdf->Image($file, $x, $y, $w, $h, $type, $link, $align, $resize, $dpi, $palign, $ismask, $imgmask, $border, $fitbox, $hidden, $fitonpage);
	/*-------------  End of Ecusson gauche  -------------*/
	
	/*----------  Ecusson droit  ----------*/
	$file='css/images/clubs/'.$discipline.'/'.$EquipeE.'.png';
	$x=85;
	$y=$decalY;
	$w=12;
	$h=12;
	$type='';
	$link='';
	$align='';
	$resize=false;
	$dpi=300;
	$palign='';
	$ismask=false;
	$imgmask=false;
	$border=0;
	$fitbox='L'.' ';
	$hidden=false;
	$fitonpage=false;
	$pdf->Image($file, $x, $y, $w, $h, $type, $link, $align, $resize, $dpi, $palign, $ismask, $imgmask, $border, $fitbox, $hidden, $fitonpage);
	/*-------------  End of Ecusson droit  -------------*/

//////////////////////////////////////////
//////// ENTRAINEURS REMPLACANTS ////////
/////////////////////////////////////////

$coach = SinguPluriel($discipline);
//////// PARTIE GAUCHE ////////

$pdf->SetFont('oswaldlight','', 7);
$BlocBasDom = <<<EOF
	<table>
		<tr style="text-align:left; background-color:cmyk(0%, 0%, 0%, 100%);">
			<td style="height:10px; color:white;">&nbsp;$coach</td>
		</tr>
		<tr>
			<td style="line-height: 0.15;"></td>
		</tr>
		<tr>
			<td style="line-height: 1.1;">$DatasFront[6]</td>
		</tr>
		<tr>
			<td style="line-height: 0.35;"></td>
		</tr>
		<tr style="background-color:cmyk(0%, 0%, 0%, 100%);">
			<td style="height:10px; color:white;">&nbsp;Remplaçants</td>
		</tr>
		<tr>
			<td style="line-height: 0.15;"></td>
		</tr>
		<tr>
			<td style="line-height: 1.1;">$DatasFront[7]</td>
		</tr>
	</table>		
EOF;
$pdf->setCellPaddings(0.5,0,0,0);
$pdf->SetTextColor(0,0,0,100);
// $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
$pdf->writeHTMLCell(48, '', 0, 71.3, $BlocBasDom, $border, 0,0,true, 'L',true);

//////// PARTIE DROITE ////////
$BlocBasExt = <<<EOF
	<table>
		<tr style="background-color:cmyk(0%, 0%, 0%, 100%;)">
			<td style="text-align:right; height:10px; color:white;">$coach &nbsp;</td>
		</tr>
		<tr>
			<td style="line-height: 0.15;"></td>
		</tr>
		<tr>
			<td style="text-align:right; line-height: 1.1;">$DatasFront[8]</td>
		</tr>
		<tr>
			<td style="line-height: 0.35;"></td>
		</tr>
		<tr style="background-color:cmyk(0%, 0%, 0%, 100%);">
			<td style="text-align:right; height:10px; color:white;">Remplaçants &nbsp;</td>
		</tr>
		<tr>
			<td style="line-height: 0.15;"></td>
		</tr>
		<tr>
			<td style="text-align:right;line-height: 1.1;">$DatasFront[9]</td>
		</tr>
	</table>
EOF;
$pdf->setCellPaddings(0,0,0.5,0);
$pdf->SetTextColor(0,0,0,100);
$pdf->writeHTMLCell(48, '', 49, 71.3, $BlocBasExt, $border, 0, 0, false, 'R',false);



/////////////////////////
//////// SERIE EN COURS ////////
/////////////////////////

// 	//////// TITRE ////////
// 	// Line
// 	$styleLine = array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => '1,1,1,1', 'phase' => 10, 'color' => array(0, 0, 0, 100));
// 	$pdf->Line(0, 97.5, 97.5, 97.5, $styleLine);
// 	// Texte
// 	$pdf->SetFont('oswaldmedium','', 12);
// 	$pdf->SetFillColor(0,0,0,0);
// 	$pdf->SetXY(35.5, 94.5);
// 	$pdf->setCellPaddings(1,0,1,0);
// 	//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
// 	$pdf->Cell('26','','La série en cours', $border, 0, 'C', 1, '', 1, false, '', 'M');

	

// $rayonSerie =3.2;
// $space = 2.5;
// $pdf->SetFont('oswaldregular','', 8);
// $pdf->SetTextColor(0,0,0,0);
// //////// PARTIE GAUCHE ////////
// for ($i=0; $i<5; $i++) {
// 	$pdf->Circle(((($i*$rayonSerie)*$space)+6.5),104,$rayonSerie,0,360, 'F', '',colorVictoireDefaite($DatasFront[$i+10],$colorFill));
	
// 	$pdf->SetXY(((($i*$rayonSerie)*($space))+4.3),102.2);
// 	$pdf->Cell(4.4,'',$DatasFront[$i+10][0], $border, 0, 'C', 0, '', 1, false, '', 'M');
// }

// //////// PARTIE DROITE ////////
// for ($i=0; $i<5; $i++) { 
// 	$pdf->Circle(((($i*$rayonSerie)*$space)+58.5),104,$rayonSerie,0,360, 'F', '',colorVictoireDefaite($DatasFront[$i+15],$colorFill));

// 	$pdf->SetXY(((($i*$rayonSerie)*($space))+56.3),102.2);
// 	$pdf->Cell(4.4,'',$DatasFront[$i+15][0], $border, 0, 'C', 0, '', 1, false, '', 'M');
// }

//////////////////////////////
//////// CONFRONTATIONS //////
//////////////////////////////
if ($DatasFront[23] != 0) {

//////// TITRE ////////
	// Line
	// $styleT = array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => '1,1,1,1', 'phase' => 10, 'color' => array(0, 0, 0, 100));
	// $pdf->Line(0, 96, 97, 96, $styleLine);
	// Texte
	$pdf->SetFont('oswaldmedium','', 11);
	$pdf->SetTextColor(0,0,0,100);
	// Bloc
	$pdf->SetFillColor(0,0,0,0);
	$pdf->SetXY(23.5, 95.5);
	$pdf->setCellPaddings(1,0,1,0);
	//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
	$pdf->Cell('50','',confrontations($DatasFront[23],$b), $border, 0, 'C', 0, '', 1, false, '', 'M');


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
		$widht = widht($pourcentageGraph*0.88,$y);
		$widht2 = widht($pourcentageGraph2*0.88,$y);
		$widht3 = widht($pourcentageGraph3*0.88,$y);

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
	
	//--------- Section 1 ----------------
	$pdf->SetXY(11.2, 100.5);
	$pdf->SetFillColor($colorFondD[0],$colorFondD[1],$colorFondD[2],$colorFondD[3]);
	$pdf->SetTextColor($colorNumD[0],$colorNumD[1],$colorNumD[2],$colorNumD[3]);
	//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
	$pdf->Cell($widht,'',$score, $border, 0, 'C', 1, '', 1, false, '', 'M');

	///--------- Section 2 ----------------
	$pdf->SetXY(11.2+$widht, 100.5);
	$pdf->SetFillColor(0,0,0,50);
	$pdf->SetTextColor(0,0,0,0);
	$pdf->Cell($widht2,'',$score2, $border, 0, 'C', 1, '', 1, false, '', 'M');

	//--------- Section 3 ----------------
	$pdf->SetXY(11.2+$widht+$widht2, 100.5);
	$pdf->SetFillColor($colorFondE[0],$colorFondE[1],$colorFondE[2],$colorFondE[3]);
	$pdf->SetTextColor($colorNumE[0],$colorNumE[1],$colorNumE[2],$colorNumE[3]);
	$pdf->Cell($widht3,'',$score3, $border, 0, 'C', 1, '', 1, false, '', 'M');
	
	//--------- Logo gauche ----------------
	$pdf->Image('css/images/clubs/'.$discipline.'/'.$EquipeD.'.png',0,98,10,10, '', '', '', false, 300, '', false, false, 0, 'R'.' ', false, false);
	/*-------------  End of Ecusson gauche  -------------*/
	
	//--------- Logo droit ----------------
	$pdf->Image('css/images/clubs/'.$discipline.'/'.$EquipeE.'.png',87,98,10,10, '', '', '', false, 300, '', false, false, 0, 'L'.' ', false, false);
}
else{
	//--------- Logo gauche ----------------
	$pdf->Image('css/images/clubs/'.$discipline.'/'.$EquipeD.'.png',39,96,10,10, '', '', '', false, 300, '', false, false, 0, 'R'.' ', false, false);
	
	//--------- Logo droit ----------------
	$pdf->Image('css/images/clubs/'.$discipline.'/'.$EquipeE.'.png',49,96,10,10, '', '', '', false, 300, '', false, false, 0, 'L'.' ', false, false);
};	

/////////////////////////
//////// SIGNATURE ////////
/////////////////////////
	$pdf->ImageSVG('css/images/signature'.$editeur.'.svg',0,106.5,97,3,'','','', $border,true);


// ---------------------------------------------------------


//Close and output PDF document
// $pdf->Output();
// $pdf->Output('ProductionPdf/'.$discipline.'/Compo'.$RencontreF.'_3120.pdf','I');
$pdf->Output('ProductionPdf/'.$discipline.'/'.strtoupper($editeur).'_Presentation_'.$RencontreF.'_'.$datePdf.'.pdf','F');
// write some JavaScript code




//============================================================+
// END OF FILE
//============================================================+