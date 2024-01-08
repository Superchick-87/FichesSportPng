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


// include (dirname(__FILE__).'/includes/ddc.php');
include (dirname(__FILE__).'/datas/'.$discipline.'/CompteRendu_'.$editeur.'_'.$RencontreF.'.php');
include (dirname(__FILE__).'/includes/SinguPluriel_pdf.php');
include (dirname(__FILE__).'/includes/colorSet'.$discipline.'_pdf.php');
include (dirname(__FILE__).'/includes/colorVictoireDefaite.php');
include (dirname(__FILE__).'/includes/Pourcentage.php');
include (dirname(__FILE__).'/includes/nbreSpectateurs.php');



// Fonction pour lire un fichier csv
function read($csv){
    $file = fopen($csv, 'r');
    while (!feof($file) ) {
        $line[] = fgetcsv($file, 1024);
    }
    fclose($file);
    return $line;
}
$csv = dirname(__FILE__).'/datas/'.$discipline.'/CompteRendu_'.$editeur.'_'.$RencontreF.'.csv';
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
$pageLayout = array(97,135); //  or array($height, $width) 
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


$border=0;


$pdf->SetFont('oswaldlight','', 8);
$pdf->SetTextColor(0,0,0,100);
// $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
// $pdf->writeHTMLCell(97,4, 0, 4.2, $Tv, $border, 0,0,true, 'C',true);

$colorNum ="";
$colorNumD = CouleurNum($EquipeD,$colorNum);
$colorNumE = CouleurNum($EquipeE,$colorNum);

$colorFondD = CouleurFond($EquipeD,$colorFill);
$colorFondE = CouleurFond($EquipeE,$colorFill);
/////////////////////////
//////// TERRAIN ////////
/////////////////////////

	//////// Paramètres terrain ////////
	// $tailleRond=1.8;
	// setlocale(LC_CTYPE, 'de_DE.UTF8');

	//////// Fond ////////
	// // $pdf->ImageSVG($file, $x=30, $y=100, $w='', $h=100, $link='', $align='', $palign='', $border=0, $fitonpage=false);
	// $pdf->ImageSVG('css/images/FondTerrainDesktop'.$discipline.'.svg',-4.3,16.5,105,54,'','','', $border,false);
	// $pdf->ImageSVG('css/images/FondTerrainDesktop'.$discipline.'.svg',0,17,97,50,'','','', $border,true);

/*============================================================
=                      Partie infos haute 1                   =
============================================================*/
	// $decalY = 5;
	// 	$hautl1 = ''.$DatasFront[0].' à '.$DatasFront[1].' | '.$DatasFront[4].' |  Spectateurs : '.$DatasFront[6].'';
	// 	$pdf->SetFont('oswaldlight', '', 8);
	// 	$pdf->SetXY(0, 0);
	// 	$pdf->Cell(97,0,$hautl1 , $border, 0, 'C', 0, '', 1, false, '', 'M');

	// 	$hautl2 = 'Météo : '.$DatasFront[7].' |  Etat du terrain : '.$DatasFront[8].'';
	// 	$pdf->SetXY(0, 3);
	// 	$pdf->Cell(97,0,$hautl2 , $border, 0, 'C', 0, '', 1, false, '', 'M');
	
/*==================  End of infos haute   ==================*/

/*============================================================
=                       Partie terrain                       =
============================================================*/

	/*=============================
	=            Rugby            =
	=============================*/
	if ($discipline=='Rugby'){
		$tailleRond=1.8;
		// // $pdf->ImageSVG($file, $x=30, $y=100, $w='', $h=100, $link='', $align='', $palign='', $border=0, $fitonpage=false);
		$pdf->ImageSVG('css/images/FondTerrainDesktopRugby.svg',-4.3,16.5,105,54,'','','', $border,false);
		
		// ---------- Parametres callage ---------
			$echelle=0.16;	
			$decalGX = 6.3;
			$decalDX = 8.2;
			$largeurCell = 10.6;
		
		/*-------------  Arbitre  -------------*/

			$pdf->SetTextColor(0,0,0,100);
			$pdf->SetFont('oswaldmedium','', 8);
			$pdf->SetXY(0, 17);
			$pdf->Cell(97,'','- Arbitre : '.$DatasFront[5].' -', $border, 0, 'C', 0, '', 1, false, '', 'M');


		/*-------------  Partie gauche  -------------*/
		
		for ($i=1; $i<16; $i++) { 

			/*----------  Cercles  ----------*/	
			
			$pdf->Circle((($csv[$i][3]*$echelle)-1),(($csv[$i][4]*$echelle)+17),$tailleRond,0,360, 'F', '',$colorFondD);
			
			/*----------  Noms  ----------*/
					
			$pdf->SetFont('oswaldmedium','', 7);
			$pdf->SetTextColor(0,0,0,100);
			$pdf->SetXY((($csv[$i][3]*$echelle)-$decalGX),(($csv[$i][4]*$echelle)+18.8));
			// $pdf->setCellPaddings( $left = '', $top = '', $right = '', $bottom = '');
			$pdf->setCellPaddings(0,0,0,0);
			$pdf->Cell($largeurCell,'',$csv[$i][5], $border, 0, 'C', 0, '', 1, false, '', 'M');
			
			/*----------  Capitaine  ----------*/

			$pdf->SetXY((($csv[$i][3]*$echelle)-$decalGX),(($csv[$i][4]*$echelle)+21.5));
			$pdf->Cell($largeurCell,'',$csv[$i][6], $border, 0, 'C', 0, '', 1, false, '', 'M');
			
			/*----------  Numéros  ----------*/

			$pdf->SetFont('oswaldbold','', 7);
			$pdf->SetTextColor($colorNumD[0],$colorNumD[1],$colorNumD[2],$colorNumD[3]);
			$pdf->SetXY((($csv[$i][3]*$echelle)-$decalGX),(($csv[$i][4]*$echelle)+15.4));
			$pdf->Cell($largeurCell,'',$csv[$i][7], $border, 0, 'C', 0, '', 1, false, '', 'M');
		}
		/*-------------  End of Partie gauche  -------------*/
		
		/*-------------  Partie droite  -------------*/

		for ($i=16; $i<31; $i++) { 
			
			/*----------  Cercles  ----------*/	

			$pdf->Circle((($csv[$i][3]*$echelle)-2.8),(($csv[$i][4]*$echelle)+17),$tailleRond,0,360, 'F', '',$colorFondE);
			
			/*----------  Noms  ----------*/

			$pdf->SetFont('oswaldmedium','', 7);
			$pdf->SetTextColor(0,0,0,100);
			$pdf->setCellPaddings(0,0,0,0);
			$pdf->SetXY((($csv[$i][3]*$echelle)-$decalDX),(($csv[$i][4]*$echelle)+18.8));
			$pdf->Cell($largeurCell,'',$csv[$i][5], $border, 0, 'C', 0, '', 1, false, '', 'M');
			
			/*----------  Capitaine  ----------*/

			$pdf->SetXY((($csv[$i][3]*$echelle)-$decalDX),(($csv[$i][4]*$echelle)+21.5));
			$pdf->Cell($largeurCell,'',$csv[$i][6], $border, 0, 'C', 0, '', 1, false, '', 'M');

			/*----------  Numéros  ----------*/

			$pdf->SetFont('oswaldbold','', 7);
			$pdf->SetTextColor($colorNumE[0],$colorNumE[1],$colorNumE[2],$colorNumE[3]);
			$pdf->SetXY((($csv[$i][3]*$echelle)-$decalDX),(($csv[$i][4]*$echelle)+15.4));
			$pdf->Cell($largeurCell,'',$csv[$i][7], $border, 0, 'C', 0, '', 1, false, '', 'M');
		}

		/*-------------  End of Partie droite  -------------*/
	}

	/*=====  End of Rugby  ======*/

	/*=============================
	=            Foot             =
	=============================*/

	elseif ($discipline=='Foot'){
			$tailleRond=2;
			// $pdf->ImageSVG($file, $x=30, $y=100, $w='', $h=100, $link='', $align='', $palign='', $border=0, $fitonpage=false);
			$pdf->ImageSVG('css/images/FondTerrainDesktopFoot.svg',-1.5,17,100,54,'','','', $border,false);
		
			// ////// ARBITRE ////////
			// $pdf->SetTextColor(0,0,0,100);
			// $pdf->SetFont('oswaldmedium','', 7.5);
			// $pdf->SetXY(0, 15);
			// $pdf->Cell(97,'','- Arbitre : '.$DatasFront[5].' -', $border, 0, 'C', 0, '', 1, false, '', 'M');

		// ---------- Parametres callage ---------
			
			$echelle=0.15;
			$largeurCell = 12;
			$decalGX = 4.5;
			$decalDX = 4.5;
			$decalYnoms = 20;
		 
			$decalYnumb = $decalYnoms-3.7;
			$decalYrond = $decalYnoms-1.8;

			/*-------------  Arbitre  -------------*/

			$pdf->SetTextColor(0,0,0,100);
			$pdf->SetFont('oswaldmedium','', 8);
			$pdf->SetXY(0, 18);
			$pdf->Cell(97,'','- Arbitre : '.$DatasFront[5].' -', $border, 0, 'C', 0, '', 1, false, '', 'M');

		/*-------------  Partie gauche  -------------*/

		for ($i=1; $i<12; $i++) { 
			
			/*----------  Cercles  ----------*/	

			$pdf->Circle((($csv[$i][3]*$echelle)+1.5),(($csv[$i][4]*$echelle)+$decalYrond),$tailleRond,0,360, 'F', '',$colorFondD);
			
			/*----------  Noms  ----------*/

			$pdf->SetFont('oswaldbold','', 8);
			$pdf->SetTextColor(0,0,0,100);
			$pdf->setCellPaddings(0,0,0,0);
			$pdf->SetXY((($csv[$i][3]*$echelle)-$decalGX),(($csv[$i][4]*$echelle)+$decalYnoms));
			$pdf->Cell($largeurCell,'',$csv[$i][5], $border, 0, 'C', 0, '', 1, false, '', 'M');
			
			/*----------  Capitaine  ----------*/

			$pdf->SetXY((($csv[$i][3]*$echelle)-$decalGX),(($csv[$i][4]*$echelle)+22.5));
			$pdf->Cell($largeurCell,'',$csv[$i][6], $border, 0, 'C', 0, '', 1, false, '', 'M');
			
			/*----------  Numéros  ----------*/

			$pdf->SetFont('oswaldbold','', 8);
			$pdf->SetTextColor($colorNumD[0],$colorNumD[1],$colorNumD[2],$colorNumD[3]);
			$pdf->SetXY((($csv[$i][3]*$echelle)-$decalGX),(($csv[$i][4]*$echelle)+$decalYnumb));
			$pdf->Cell($largeurCell,'',$csv[$i][7], $border, 0, 'C', 0, '', 1, false, '', 'M');
		}

		/*-------------  End of Partie gauche  -------------*/

		/*-------------  Partie droite  -------------*/

		for ($i=12; $i<23; $i++) { 
			
			/*----------  Cercles  ----------*/	

			$pdf->Circle((($csv[$i][3]*$echelle)+1.5),(($csv[$i][4]*$echelle)+$decalYrond),$tailleRond,0,360, 'F', '',$colorFondE);
			
			/*----------  Noms  ----------*/

			$pdf->SetFont('oswaldbold','', 8);
			$pdf->SetTextColor(0,0,0,100);
			$pdf->setCellPaddings(0,0,0,0);
			$pdf->SetXY((($csv[$i][3]*$echelle)-$decalDX),(($csv[$i][4]*$echelle)+$decalYnoms));
			$pdf->Cell($largeurCell,'',$csv[$i][5], $border, 0, 'C', 0, '', 1, false, '', 'M');
			
			/*----------  Capitaine  ----------*/

			$pdf->SetXY((($csv[$i][3]*$echelle)-$decalDX),(($csv[$i][4]*$echelle)+22.5));
			$pdf->Cell($largeurCell,'',$csv[$i][6], $border, 0, 'C', 0, '', 1, false, '', 'M');
			
			/*----------  Numéros  ----------*/

			$pdf->SetFont('oswaldbold','', 8);
			$pdf->SetTextColor($colorNumE[0],$colorNumE[1],$colorNumE[2],$colorNumE[3]);
			$pdf->SetXY((($csv[$i][3]*$echelle)-$decalDX),(($csv[$i][4]*$echelle)+$decalYnumb));
			$pdf->Cell($largeurCell,'',$csv[$i][7], $border, 0, 'C', 0, '', 1, false, '', 'M');
		}

		/*-------------  End of Partie droite  -------------*/
	}	

	/*=====  End of Foot  ======*/

	/*=============================
	=           Basket            =
	=============================*/

	elseif ($discipline=='Basket'){
			$tailleRond=2;
			
			/**
			 * Doc paramètre rec à cette url
			 * www.rubydoc.info/gems/rfpdf/1.17.1/TCPDF:Rect
			 *
			 */
			
			$pdf->Rect(0.5, 18, 96, 52, 'F', '', $colorFondD);
			// $pdf->ImageSVG($file, $x=30, $y=100, $w='', $h=100, $link='', $align='', $palign='', $border=0, $fitonpage=false);
			$pdf->ImageSVG('css/images/FondDeskBasketSol.svg',-1.5,17,100,54,'','','', $border,false);
			
			$pdf->SetAlpha(0.3);
			$pdf->Rect(10.8, 37.9, 17, 12, 'F', '', $colorFondD);
			$pdf->Rect(69, 37.9, 17, 12, 'F', '', $colorFondD);
			$pdf->SetAlpha(1);
			

			$pdf->StartTransform();
			// Rotate 90 degrees counter-clockwise centered by (70,110) which is the lower left corner of the rectangle
			$pdf->Rotate(90, 48, 82);
			// $pdf->Rect(62, 41.5, 48, 82, 'D');
			// $pdf->Text(62, 37, 'Rotate');
			// Stop Transformation
			$pdf->SetFont('oswaldbold','', 18);
			$pdf->SetTextColor($colorNumD[0],$colorNumD[1],$colorNumD[2],$colorNumD[3]);
			$pdf->SetXY(62, 35);
			$pdf->SetAlpha(0.8);
			$pdf->Cell(48, 8,$DatasFront[2], $border, 0, 'C', 1, '', 1, false, '', 'M');
			$pdf->StopTransform();

			$pdf->StartTransform();
			// Rotate 90 degrees counter-clockwise centered by (70,110) which is the lower left corner of the rectangle
			$pdf->Rotate(-90, 48, 68);
			// $pdf->Rect(62, 41.5, 48, 82, 'D');
			// $pdf->Text(62, 37, 'Rotate');
			// Stop Transformation
			$pdf->SetFont('oswaldbold','', 18);
			$pdf->SetTextColor($colorNumD[0],$colorNumD[1],$colorNumD[2],$colorNumD[3]);
			$pdf->SetXY(0, 20);
			$pdf->SetAlpha(0.8);
			$pdf->Cell(48, 8,$DatasFront[2], $border, 0, 'C', 1, '', 1, false, '', 'M');
			$pdf->StopTransform();

			// $pdf->SetTextColor(0,0,0,100);
			// $pdf->SetFont('oswaldmedium', '', 14);
			

			$pdf->ImageSVG('css/images/FondDeskBasketMarquage.svg',-1.5,17,100,54,'','','', $border,false);
			$pdf->Image('css/images/clubs/'.$discipline.'/'.$EquipeD.'.png',38.5,33.7,20,20,'','','', $border,true);

		// ---------- Parametres callage ---------
			
			$echelle=0.15;
			$largeurCell = 12;
			$decalGX = 4.5;
			$decalDX = 4.5;
			$decalYnoms = 20;
		 
			$decalYnumb = $decalYnoms-3.7;
			$decalYrond = $decalYnoms-1.8;

			/*-------------  Arbitre  -------------*/

			$pdf->SetTextColor(0,0,0,100);
			$pdf->SetFont('oswaldmedium','', 8);
			$pdf->SetXY(0, 20);
			$pdf->Cell(97,'','- Arbitre : '.$DatasFront[5].' -', $border, 0, 'C', 0, '', 1, false, '', 'M');

		/*-------------  Partie gauche  -------------*/

		for ($i=1; $i<6; $i++) { 
			
			/*----------  Cercles  ----------*/	

			$pdf->Circle((($csv[$i][3]*$echelle)+1.5),(($csv[$i][4]*$echelle)+$decalYrond),$tailleRond,0,360, 'F', '',$colorFondD);
			
			/*----------  Noms  ----------*/

			$pdf->SetFont('oswaldbold','', 8);
			$pdf->SetTextColor(0,0,0,100);
			$pdf->setCellPaddings(0,0,0,0);
			$pdf->SetXY((($csv[$i][3]*$echelle)-$decalGX),(($csv[$i][4]*$echelle)+$decalYnoms));
			$pdf->Cell($largeurCell,'',$csv[$i][5], $border, 0, 'C', 0, '', 1, false, '', 'M');
			
			/*----------  Capitaine  ----------*/

			$pdf->SetXY((($csv[$i][3]*$echelle)-$decalGX),(($csv[$i][4]*$echelle)+22.5));
			$pdf->Cell($largeurCell,'',$csv[$i][6], $border, 0, 'C', 0, '', 1, false, '', 'M');
			
			/*----------  Numéros  ----------*/

			$pdf->SetFont('oswaldbold','', 8);
			$pdf->SetTextColor($colorNumD[0],$colorNumD[1],$colorNumD[2],$colorNumD[3]);
			$pdf->SetXY((($csv[$i][3]*$echelle)-$decalGX),(($csv[$i][4]*$echelle)+$decalYnumb));
			$pdf->Cell($largeurCell,'',$csv[$i][7], $border, 0, 'C', 0, '', 1, false, '', 'M');
		}

		/*-------------  End of Partie gauche  -------------*/

		/*-------------  Partie droite  -------------*/

		for ($i=6; $i<11; $i++) { 
			
			/*----------  Cercles  ----------*/	

			$pdf->Circle((($csv[$i][3]*$echelle)+1.5),(($csv[$i][4]*$echelle)+$decalYrond),$tailleRond,0,360, 'F', '',$colorFondE);
			
			/*----------  Noms  ----------*/

			$pdf->SetFont('oswaldbold','', 8);
			$pdf->SetTextColor(0,0,0,100);
			$pdf->setCellPaddings(0,0,0,0);
			$pdf->SetXY((($csv[$i][3]*$echelle)-$decalDX),(($csv[$i][4]*$echelle)+$decalYnoms));
			$pdf->Cell($largeurCell,'',$csv[$i][5], $border, 0, 'C', 0, '', 1, false, '', 'M');
			
			/*----------  Capitaine  ----------*/

			$pdf->SetXY((($csv[$i][3]*$echelle)-$decalDX),(($csv[$i][4]*$echelle)+22.5));
			$pdf->Cell($largeurCell,'',$csv[$i][6], $border, 0, 'C', 0, '', 1, false, '', 'M');
			
			/*----------  Numéros  ----------*/

			$pdf->SetFont('oswaldbold','', 8);
			$pdf->SetTextColor($colorNumE[0],$colorNumE[1],$colorNumE[2],$colorNumE[3]);
			$pdf->SetXY((($csv[$i][3]*$echelle)-$decalDX),(($csv[$i][4]*$echelle)+$decalYnumb));
			$pdf->Cell($largeurCell,'',$csv[$i][7], $border, 0, 'C', 0, '', 1, false, '', 'M');
		}

		/*-------------  End of Partie droite  -------------*/
	}	

	/*=====  End of Basket  ======*/

/*=================  End of Partie terrain   ================*/

/*============================================================
=                     Partie infos haute 2                   =
============================================================*/
		/*----------  Stade et spectateurs  ----------*/
		
		$decalY = 5;
		$hautl1 = ''.$DatasFront[0].' à '.$DatasFront[1].' | '.$DatasFront[4].' | '.nbreSpectateurs($DatasFront[6]).'';
		$pdf->SetTextColor(0,0,0,100);
		$pdf->SetFont('oswaldlight', '', 8);
		$pdf->SetXY(0, 0);
		$pdf->Cell(97,0,$hautl1 , $border, 0, 'C', 0, '', 1, false, '', 'M');

		/*----------  Météo - Terrain  ----------*/
		
		if ($discipline=='Rugby' || $discipline=='Foot'){
			$hautl2 = 'Météo : '.$DatasFront[7].' |  Etat du terrain : '.$DatasFront[8].'';
			$pdf->SetXY(0, 3);
			$pdf->Cell(97,0,$hautl2 , $border, 0, 'C', 0, '', 1, false, '', 'M');
		}
		else{}

	/*------------- Partie gauche  -------------*/
		
		$pdf->SetTextColor(0,0,0,100);
		
		/*----------  Nom de l'équipe  ----------*/
		$border = 0;
		$pdf->SetFont('oswaldmedium', '', 14);
		$pdf->SetXY(13, $decalY);
		$pdf->Cell(28,10,$DatasFront[2],$border, 0, 'L', 0, '', 1, false, '', 'M');
		
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
		// Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)

	/*-------------  End of Partie gauche  -------------*/

	/*-------------  Partie droite  -------------*/
	
		/*----------  Nom de l'équipe  ----------*/
		$pdf->SetXY(55, $decalY);
		$pdf->SetCellPaddings(0.5,'','',0);
		$pdf->Cell(29,10,$DatasFront[3], $border, 0, 'R', 0, '', 1, false, '', 'M');
		
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
	
	/*-------------  End of Partie droite  -------------*/

	/*------------- Partie centre  -------------*/
	
		/*----------  Score  à la mi-temps  ----------*/

		if ($discipline=='Rugby'){
			$scoreMtps = '(Score à la mi-temps : '.$DatasFront[10].')';
			$pdf->SetFont('oswaldregular', '', 8.5);
			$pdf->SetXY(28.5, $decalY+5);
			$pdf->Cell(40,9,$scoreMtps , $border, 0, 'C', 0, '', 1, false, '', 'M');
		}
		elseif ($discipline=='Foot' || $discipline=='Basket'){
			$scoreMtps = '(Score à la mi-temps : '.$DatasFront[10].')';
			$pdf->SetFont('oswaldregular', '', 8.5);
			$pdf->SetXY(28.5, $decalY+6);
			$pdf->Cell(40,9,$scoreMtps , $border, 0, 'C', 0, '', 1, false, '', 'M');
		}
		
		/*----------  Score  ----------*/

		$pdf->SetFont('oswaldmedium', '', 14);
		$pdf-> SetFillColor(0,0,0,100); // Grey
		$pdf->SetTextColor(0,0,0,0);
		// $this -> TCPDF -> Cell(95,$cellHigh,$data,'L',0,'L',$fill,'',0,false,'T','C');
		$pdf->setCellPaddings(0,0,0,0);
		$pdf->SetXY(42, $decalY+2);
		$pdf->Cell(13,6,$DatasFront[9], $border, 0, 'C',1, '', 1, false, 1, 'M');

	/*-------------  End of Partie droite  -------------*/

/*=================   Partie infos haute 2   ================*/

/*============================================================
=                        Partie basse                        =
============================================================*/

/*----------  Récupération des datas  ----------*/

function AfficherMasq($a,$b){
	if ($a == '') {
		return $b = 'display:none;';
	}
	else{
		return $b = 'display:block;';
	}
};

$displayD1 = AfficherMasq($DatasFront[11],$b);
$displayD2 = AfficherMasq($DatasFront[12],$b);
$displayD3 = AfficherMasq($DatasFront[15],$b);
$displayD4 = AfficherMasq($DatasFront[17],$b);
$displayD5 = AfficherMasq($DatasFront[19],$b);

$displayE1 = AfficherMasq($DatasFront[13],$b);
$displayE2 = AfficherMasq($DatasFront[14],$b);
$displayE3 = AfficherMasq($DatasFront[16],$b);
$displayE4 = AfficherMasq($DatasFront[18],$b);
$displayE5 = AfficherMasq($DatasFront[20],$b);

$coach = SinguPluriel($discipline);

$points = disciplineButsPtsPdf($discipline);

/*------  End of Récupération des datas  ------*/

/*--------------  Colonne gauche  --------------*/

$pdf->SetFont('oswaldlight','', 7);
$backgColor = 'background-color:cmyk(0%, 0%, 0%, 0%);';
$BlocBasDom = <<<EOF
	<table style="$displayD1 $backgColor">
		<tr style="text-align:left; background-color:cmyk(0%, 0%, 0%, 100%);">
			<td style="height:10px; color:white;">&nbsp;$coach</td>
		</tr>
		<tr>
			<td style="line-height: 0.15;"></td>
		</tr>
		<tr>
			<td style="line-height: 1.1;">$DatasFront[11]</td>
		</tr>
		<tr>
			<td style="line-height: 0.35;"></td>
		</tr>
	</table>
	<table style="$displayD2 $backgColor">
		<tr style="background-color:cmyk(0%, 0%, 0%, 100%);">
			<td style="height:10px; color:white;">&nbsp;Remplacement(s)</td>
		</tr>
		<tr>
			<td style="line-height: 0.15;"></td>
		</tr>
		<tr>
			<td style="line-height: 1.1;">$DatasFront[12]</td>
		</tr>
		<tr>
			<td style="line-height: 0.35;"></td>
		</tr>
	</table>
	<table style="$displayD3 $backgColor">
		<tr style="background-color:cmyk(0%, 0%, 0%, 100%);">
			<td style="text-align:left; height:10px; color:white;">&nbsp;$points</td>
		</tr>
		<tr>
			<td style="line-height: 0.15;"></td>
		</tr>
		<tr>
			<td style="text-align:left;line-height: 1.1;">$DatasFront[15]</td>
		</tr>
		<tr>
			<td style="line-height: 0.35;"></td>
		</tr>
	</table>
	<table style="$displayD4 $backgColor">
		<tr style="background-color:cmyk(0%, 0%, 0%, 100%);">
			<td style="text-align:left; height:10px; color:white;">&nbsp;Avertissement(s)</td>
		</tr>
		<tr>
			<td style="line-height: 0.15;"></td>
		</tr>
		<tr>
			<td style="text-align:left;line-height: 1.1;">$DatasFront[17]</td>
		</tr>
		<tr>
			<td style="line-height: 0.35;"></td>
		</tr>
	</table>
	<table style="$displayD5 $backgColor">		
		<tr style="background-color:cmyk(0%, 0%, 0%, 100%);">
			<td style="text-align:left; height:10px; color:white;">&nbsp;Expulsion(s)</td>
		</tr>
		<tr>
			<td style="line-height: 0.15;"></td>
		</tr>
		<tr>
			<td style="text-align:left;line-height: 1.1;">$DatasFront[19]</td>
		</tr>
	</table>		
EOF;

$pdf->setCellPaddings(0.5,0,0,0);
$pdf->SetTextColor(0,0,0,100);
// $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
$pdf->writeHTMLCell(48, '', 0, 71.3, $BlocBasDom, $border, 0,0,true, 'L',true);

/*-----------  End of Colonne gauche  -----------*/

/*--------------  Colonne droite  --------------*/

$BlocBasExt = <<<EOF
	<table style="$displayE1 $backgColor">
		<tr style="background-color:cmyk(0%, 0%, 0%, 100%;)">
			<td style="text-align:right; height:10px; color:white;">$coach&nbsp;</td>
		</tr>
		<tr>
			<td style="line-height: 0.15;"></td>
		</tr>
		<tr>
			<td style="text-align:right; line-height: 1.1;">$DatasFront[13]</td>
		</tr>
		<tr>
			<td style="line-height: 0.35;"></td>
		</tr>
	</table>
	<table style="$displayE2 $backgColor">
		<tr style="background-color:cmyk(0%, 0%, 0%, 100%);">
			<td style="text-align:right; height:10px; color:white;">Remplacement(s)&nbsp;</td>
		</tr>
		<tr>
			<td style="line-height: 0.15;"></td>
		</tr>
		<tr>
			<td style="text-align:right;line-height: 1.1;">$DatasFront[14]</td>
		</tr>
		<tr>
			<td style="line-height: 0.35;"></td>
		</tr>
	</table>
	<table style="$displayE3 $backgColor">
		<tr style="background-color:cmyk(0%, 0%, 0%, 100%);">
			<td style="text-align:right; height:10px; color:white;">$points&nbsp;</td>
		</tr>
		<tr>
			<td style="line-height: 0.15;"></td>
		</tr>
		<tr>
			<td style="text-align:right;line-height: 1.1;">$DatasFront[16]</td>
		</tr>
		<tr>
			<td style="line-height: 0.35;"></td>
		</tr>
	</table>
	<table style="$displayE4 $backgColor">
		<tr style="background-color:cmyk(0%, 0%, 0%, 100%);">
			<td style="text-align:right; height:10px; color:white;">Avertissement(s)&nbsp;</td>
		</tr>
		<tr>
			<td style="line-height: 0.15;"></td>
		</tr>
		<tr>
			<td style="text-align:right;line-height: 1.1;">$DatasFront[18]</td>
		</tr>
		<tr>
			<td style="line-height: 0.35;"></td>
		</tr>
	</table>
	<table style="$displayE5 $backgColor">
		<tr style="background-color:cmyk(0%, 0%, 0%, 100%);">
			<td style="text-align:right; height:10px; color:white;">Expulsion(s)&nbsp;</td>
		</tr>
		<tr>
			<td style="line-height: 0.15;"></td>
		</tr>
		<tr>
			<td style="text-align:right;line-height: 1.1;">$DatasFront[20]</td>
		</tr>
	</table>
EOF;
$pdf->setCellPaddings(0,0,0.5,0);
$pdf->SetTextColor(0,0,0,100);
$pdf->writeHTMLCell(48, '', 49, 71.3, $BlocBasExt, $border, 0, 0, false, 'R',false);

/*-----------  End of Colonne droite  -----------*/

/*=================  End of Partie basse  ==================*/

	
/*---------------  Signature  --------------*/
	
// $pdf->ImageSVG('css/images/signature.svg',0,121.5,97,3,'','','', $border,true);

/*-----------  End of Signature  -----------*/

/*============================================================
=                         Sortie pdf                         =
============================================================*/
// $pdf->Output();
// $pdf->Output('ProductionPdf/'.$discipline.'/Compo'.$RencontreF.'_3120.pdf','I');
$pdf->Output('ProductionPdf/'.$discipline.'/'.strtoupper($editeur).'_CompteRendu_'.$RencontreF.'_'.$datePdf.'.pdf','F');

//============================================================+
// END OF FILE
//============================================================+