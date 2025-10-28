<?php
// Indiquer la page
$page = "teeshirts";

// Inclure le contenu du fichier entete.inc.php ICI
include("commun/entete.inc.php");
// Inclure la librairie de gestion du catalogue
include("lib/catalogue.lib.php");

// Intégrer le fichier JSON contenant les produits
$catalogue = json_decode(file_get_contents("data/teeshirts.json"));
//print_r($catalogue);

// Extraire les thèmes et les produits du catalogue
$themes = [];
$produits = [];

foreach ($catalogue as $codeTheme => $detailTheme) {
	$themes[$codeTheme] = $detailTheme->theme->$langue;
	$produits = array_merge($produits, $detailTheme->produits);
}

// Gestion du tri
$tri = obtenirCritereTri();
$produits = trierProduits($produits, $tri);

// Méthode 1 (pas utilisée)
// Instancier un objet formatteur pour cette page
// $frmt = obtenirFormatteurNombre($langue);
?>
<main class="page-produits page-teeshirts">
	<article class="amorce">
		<h1><?= $_->titre; ?></h1>
		<!-- Barre de contrôle (filtrage, tri, etc.) -->
		<form class="controle" action="">
			<div class="filtre">
				<label for="filtre">Filtrer par thème : </label>
				<select name="filtre" id="filtre">
					<option value="tous">Tous les produits</option>
					<?php foreach($themes as $codeTheme=>$nomTheme) : ?>
						<option value="<?= $codeTheme; ?>"><?= $nomTheme; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="tri">
				<label for="tri"><?= $_cat->etiquetteTri; ?></label>
				<select name="tri" id="tri">
					<option <?= ($tri=="aleatoire") ? "selected" : ""; ?> value="aleatoire"><?= $_cat->triAleatoire; ?></option>
					<option <?= ($tri=="ventesDesc") ? "selected" : ""; ?> value="ventesDesc"><?= $_cat->triMeilleurVendeur; ?></option>
					<option <?= ($tri=="prixAsc") ? "selected" : ""; ?> value="prixAsc"><?= $_cat->triPrixAsc; ?></option>
					<option <?= ($tri=="prixDesc") ? "selected" : ""; ?> value="prixDesc"><?= $_cat->triPrixDesc; ?></option>
					<option <?= ($tri=="nomAsc") ? "selected" : ""; ?> value="nomAsc"><?= $_cat->triNomAsc; ?></option>
					<option <?= ($tri=="nomDesc") ? "selected" : ""; ?> value="nomDesc"><?= $_cat->triNomDesc; ?></option>
					<option <?= ($tri=="dacDesc") ? "selected" : ""; ?> value="dacDesc"><?= $_cat->triNouveaute; ?></option>
				</select>
			</div>
		</form>
	</article>
	<article class="principal">
		<!-- Gabarit -->
		<?php foreach ($produits as $prd) : ?>
			<div class="produit">
				<span class="image">
					<img src="images/produits/teeshirts/<?= $prd->id; ?>.webp" alt="<?= $prd->nom->$langue; ?>">
				</span>
				<span class="nom"><?= $prd->nom->$langue; ?></span>
				<!-- Méthode 1 : pas utilisée -->
				<!-- <span class="prix"><?= ""; //$frmt->formatCurrency($prd->prix, "GBP"); ?></span> -->
				<!-- Méthode 2 : préférée pour formatter rapidement -->
				<span class="prix"><?= MessageFormatter::formatMessage($langue, "{0, number, :: currency/CAD}", [$prd->prix]) ?></span>
				<span class="ventes"><?= $prd->ventes; ?></span>
			</div>
		<?php endforeach; ?>
	</article>
</main>

<!-- Gabarit de produit -->
<template id="gabarit-produit">
	<div class="produit">
		<span class="image">
			<img src="images/produits/teeshirts/ID.webp" alt="NOM">
		</span>
		<span class="nom">NOM</span>
		<span class="prix">PRIX</span>
	</div>
</template>

<?php
// Inclure la partie commune en bas de page.
include("commun/pied2page.inc.php");
?>