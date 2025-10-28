<?php
// hack pour eviter erreur sur tri par nom
$langue = "fr";

// recupere donnees teeshirts
$dataTeeshirts = json_decode(file_get_contents('../data/teeshirts.json'));
// var_dump($dataTeeshirts);

// extraire themes et produits catalogue
// $themes = [];
$produits = [];

// affichage dynamique chaque produit t-shirts
foreach($dataTeeshirts as $codeTheme => $detailsTheme){
	// $themes[$codeTheme] = $detailsTheme->nomTheme->$langue;
	$produits = array_merge($produits, $detailsTheme->produits);
	// var_dump($detailsTheme->produits);
}
// var_dump($themes);
// var_dump($produits);


/* GESTION TRI */
include('../lib/filterNSort.lib.php');

$tri = obtenirCriteresTri();
// $filtre = obtenirCriteresFiltre();
$produits = trierProduits($produits, $tri);


echo json_encode($produits);












