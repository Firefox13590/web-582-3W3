<?php
// Indiquer la page
$page = "teeshirts";

// Inclure le contenu du fichier entete.inc.php ICI
include("commun/entete.inc.php");
// Intégrer le fichier JSON contenant les produits
$produits = json_decode(file_get_contents("data/teeshirts.json"));
?>
<main class="page-produits page-teeshirts">
    <article class="amorce">
        <h1><?= $_->titre; ?></h1>
    </article>
    <article class="principal">
        <!-- Gabarit -->
		<?php foreach($produits as $prd) : ?>
			<div class="produit">
				<span class="image">
					<img src="images/produits/teeshirts/<?= $prd->id; ?>.webp" alt="<?= $prd->nom; ?>">
				</span>
				<span class="nom"><?= $prd->nom; ?></span>
				<span class="prix"><?= number_format($prd->prix, 2, ',', ' '); ?> $</span>
			</div>
		<?php endforeach; ?>
    </article>
</main>
<?php
// Inclure la partie commune en bas de page.
include("commun/pied2page.inc.php");
?>