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

// print_r($themes);

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
					<option value="aleatoire"><?= $_cat->triAleatoire; ?></option>
					<option value="ventesDesc"><?= $_cat->triMeilleurVendeur; ?></option>
					<option value="prixAsc"><?= $_cat->triPrixAsc; ?></option>
					<option value="prixDesc"><?= $_cat->triPrixDesc; ?></option>
					<option value="nomAsc"><?= $_cat->triNomAsc; ?></option>
					<option value="nomDesc"><?= $_cat->triNomDesc; ?></option>
					<option value="dacDesc"><?= $_cat->triNouveaute; ?></option>
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
			</div>
		<?php endforeach; ?>
	</article>
</main>

<script>
	document.querySelector("#tri").addEventListener("change", 
										evt => evt.target.form.submit());
</script>

<?php
// Inclure la partie commune en bas de page.
include("commun/pied2page.inc.php");
?>