<?php
$nom_fichier = ddc($typeFiche) . '_' . $editeur . '_' . ddc($RencontreF) . '.php';
/**
 * £ Vérification fichier datas php
 * £ #1 si présent on l'include
 * £ #2 si absent : initialisation, on crée le fichier php vide
 * £ #3 on l'include pour le lire
 */
//£ #1 si présent on l'include 
if (file_exists('./datas/' . $discipline . '/' . $nom_fichier)) {
    echo '<h2>' . "Cette fiche est en cours" . '</h2>';
    echo '</br>';
    include('./datas/' . $discipline . '/' . ddc($typeFiche) . '_' . $editeur . '_' . ddc($RencontreF) . '.php');
}
//£ #2 si absent : initialisation, on crée le fichier php vide 
if (!file_exists('./datas/' . $discipline . '/' . $nom_fichier)) {
    echo '<h2>' . "Vous débutez une nouvelle fiche" . '</h2>';
    echo '</br>';
    $fichierv = fopen("./datas/" . $discipline . "/" . ddc($typeFiche) . "_" . $editeur . "_" . ddc($RencontreF) . ".php", 'w+');
    $big = '$DatasFront';
    $texte = ("<?php " . $big . "=array ('','','','','','','','','','','','','','','','','','','','','','','','','','','') ?>");
    fwrite($fichierv, $texte);
    fclose($fichierv);
}
/**
 * £ FIN Vérification fichier datas php
 */

/**
 * @ Fonction pour lire un fichier csv 
 */
function read($csv)
{
    $file = fopen($csv, 'r');
    while (!feof($file)) {
        $line[] = fgetcsv($file, 1024);
    }
    fclose($file);
    return $line;
}
/**
 * @ FIN Fonction pour lire un fichier csv 
 */

/**
 * @ Vérification fichier datas csv
 * @ #1 si absent : on crée -> initialisation du fichier CSV vide en choissant un modèle suivant le sport
 * @ #2 si présent : 
 * @       soit on lit le fichier présent avec ces datas 
 * @       soit on lit le fichier présemment initialisé donc vide 
 */

$csv = './datas/' . $discipline . '/' . ddc($typeFiche) . '_' . $editeur . '_' . ddc($RencontreF) . '.csv';

//@ #1 si absent : on crée -> initialisation du fichier CSV vide en choissant un modèle suivant le sport
if (!file_exists($csv)) {
    for ($i = 1; $i < $entrees; $i++) {
        ${"EquipeDom" . $i} = '';
        ${"EquipeDomCap" . $i} = '';
        ${"EquipeDomNum" . $i} = '';
        ${"ClubDom"} = $ClubDom;
    }
    for ($i = 1; $i < $entrees; $i++) {
        ${"EquipeExt" . $i} = '';
        ${"EquipeExtCap" . $i} = '';
        ${"EquipeExtNum" . $i} = '';
        ${"ClubExt"} = $ClubExt;
    }

    //$ ::::::::  CHOIX DU SPORT  :::::::: 
    if ($discipline == 'Foot') {
        @$tactiqueA = "";
        @$tactiqueB = "";
        include('footTactique.php');
    }
    if ($discipline == 'Rugby') {
        include('rugbyTactique.php');
    }
    if ($discipline == 'Basket') {
        include('basketTactique.php');
    }

    //$ Paramétrage de l'écriture du futur fichier CSV
    $chemin = './datas/' . $discipline . '/' . ddc($typeFiche) . '_' . $editeur . '_' . ddc($RencontreF) . '.csv';
    $delimiteur = ','; //$ Pour une tabulation, utiliser $delimiteur = "t";

    $fichier_csv = fopen($chemin, 'w+');

    foreach ($lignes as $ligne) {
        //$ chaque ligne en cours de lecture est insérée dans le fichier
        //$ les valeurs présentes dans chaque ligne seront séparées par $delimiteur
        fputcsv($fichier_csv, $ligne, $delimiteur);
    }
    //$ fermeture du fichier csv
    //$ fclose($fichier_csv);
}

//@ #2 si présent : 
//@       soit on lit le fichier présent avec ces datas 
//@      soit on lit le fichier présemment initialisé donc vide 
if (file_exists($csv)) {
    $csv = read($csv);
}
