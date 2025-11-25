<?php
// Inclure la librairie de fonctions de comparaison (pour le tri des produits)
include("../lib/catalogue.lib.php");

// Gestion du catalogue
$catalogue = json_decode(file_get_contents("../data/teeshirts.json"));
// Tableau pour les produits (nous n'avons pas besoin des thèmes dans la requête asynchrone)
$produits = [];

foreach ($catalogue as $codeTheme => $detailTheme) {
	$produits = array_merge($produits, $detailTheme->produits);
}

// gestion du filtrage
$filtre = obtenirCritereFiltre();
$produits = filtrerProduits($produits, $filtre);
// Gestion du tri.
$tri = obtenirCritereTri();
$produits = trierProduits($produits, $tri);

// etape verification presence image (sinon peut pas mettre image placeholder avec js)
foreach($produits as $produit => $detailProduit){
	if(file_exists("../images/produits/teeshirts/" . $detailProduit->id . ".webp")){
		$detailProduit->imageValide = true;
	}else{
		$detailProduit->imageValide = false;
	}
}

// Gestion de la réponse.
echo json_encode($produits);
?>