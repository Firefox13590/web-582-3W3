<?php
// Indiquer la page
$page = "teeshirts";

// Inclure le contenu du fichier entete.inc.php ICI
include("commun/entete.inc.php");
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

// print_r($produits);

// Gestion du tri
if(isset($_GET["tri"]) && $_GET["tri"] != "aleatoire") {
	$tri = $_GET["tri"];
	// Trier le tableau $produits selon le critère indiqué dans la variable $tri
	if($tri=="ventesDesc") {
		usort($produits, function($elt1, $elt2) {
			return $elt2->ventes - $elt1->ventes;
		});
	}
	else if($tri=="prixAsc") {
		usort($produits, function($elt1, $elt2) {
			return $elt1->prix - $elt2->prix;
		});
	}
	else if($tri=="prixDesc") {
		usort($produits, function($elt1, $elt2) {
			return $elt2->prix - $elt1->prix;
		});
	}
}
else {
	$tri = "aleatoire";
	shuffle($produits);
}

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
				<span class="prix"><?= number_format($prd->prix, 2, ',', ' '); ?> $</span>
				<span class="ventes"><?= $prd->ventes; ?></span>
			</div>
		<?php endforeach; ?>
	</article>
</main>
<?php
// Inclure la partie commune en bas de page.
include("commun/pied2page.inc.php");
?>