<?php
// Hack pour éviter erreur sur le tri par nom
$langue = "fr";
include("../lib/catalogue.lib.php");
$catalogue = json_decode(file_get_contents("../data/teeshirts.json"));

$produits = [];
foreach ($catalogue as $codeTheme => $detailTheme) {
	$produits = array_merge($produits, $detailTheme->produits);
}

// Gestion du tri
$tri = obtenirCritereTri();
$produits = trierProduits($produits, $tri);

echo json_encode($produits);
?>