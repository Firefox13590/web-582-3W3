<?php
// echo uniqid('teetim', true);

// Indiquer la page
$page = "teeshirts";

// Inclure le contenu du fichier entete.inc.php ICI
include("commun/entete.inc.php");
// Inclure la librairie de gestion du catalogue
// include("lib/catalogue.lib.php");

$tri = $_GET["tri"] ?? "RAND()";
$filtre = $_GET["filtre"] ?? "tous";
$filtreSql = $filtre!="tous" ? " AND themeId=$filtre" : "";

// Intégrer la BD MySQL
$cnx = mysqli_connect('localhost', 'root', ''); // Pas sécuritaire : à mettre caché ailleurs (plus tard)
mysqli_set_charset($cnx, 'utf8mb4');
mysqli_select_db($cnx, 'teetim');

$themesJE = mysqli_query($cnx, "SELECT * FROM themes");
// CODE DANGEREUX : susceptible d'attaques par INJECTION SQL
// ON arrange ça plus tard !!!
$produitsJE = mysqli_query($cnx, 
	"SELECT * FROM produits WHERE categorieId=1 $filtreSql ORDER BY $tri");

// Extraire les thèmes et les produits du catalogue
$themes = mysqli_fetch_all($themesJE, MYSQLI_ASSOC);
$produits = mysqli_fetch_all($produitsJE, MYSQLI_ASSOC);

// print_r($produits);

$decompteProduits = count($produits);
?>
<main class="page-produits page-teeshirts">
	<article class="amorce">
		<h1><?= $_->titre; ?></h1>
		<!-- Barre de contrôle (filtrage, tri, etc.) -->
		<form class="controle" action="">
			<div class="filtre">
				<label for="filtre">Filtrer par thème : </label>
				<select name="filtre" id="filtre">
					<option value="tous">Tous les produits (<?= $decompteProduits; ?>)</option>
					<?php foreach($themes as $unTheme) : ?>
						<option 
							value="<?= $unTheme["id"]; ?>"
							<?= $filtre===$unTheme["id"] ? "selected" : "" ; ?>
						>
							<?= $unTheme["nom"]; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="tri">
				<label for="tri"><?= $_cat->etiquetteTri; ?></label>
				<select name="tri" id="tri">
					<option <?= ($tri=="RAND()") ? "selected" : ""; ?> value="RAND()"><?= $_cat->triAleatoire; ?></option>
					<option <?= ($tri=="ventes DESC") ? "selected" : ""; ?> value="ventes DESC"><?= $_cat->triMeilleurVendeur; ?></option>
					<option <?= ($tri=="prix ASC") ? "selected" : ""; ?> value="prix ASC"><?= $_cat->triPrixAsc; ?></option>
					<option <?= ($tri=="prix DESC") ? "selected" : ""; ?> value="prix DESC"><?= $_cat->triPrixDesc; ?></option>
					<option <?= ($tri=="nom ASC") ? "selected" : ""; ?> value="nom ASC"><?= $_cat->triNomAsc; ?></option>
					<option <?= ($tri=="nom DESC") ? "selected" : ""; ?> value="nom DESC"><?= $_cat->triNomDesc; ?></option>
					<option <?= ($tri=="dac DESC") ? "selected" : ""; ?> value="dac DESC"><?= $_cat->triNouveaute; ?></option>
				</select>
			</div>
		</form>
	</article>
	<article class="principal">
		<!-- Gabarit -->
		<?php 
		foreach ($produits as $prd) : 
			$fichierImage = "images/produits/teeshirts/{$prd['fichierImage']}";
			// if(!file_exists($fichierImage)) {
			// 	$fichierImage = "images/produits/teeshirts/ts0000.webp";
			// }
		?>
			<div class="produit">
				<?php if($prd["ventes"] > 0) : ?>
					<span class="ventes"><?= $prd["ventes"]; ?></span>
				<?php endif; ?>
				<span class="image">
					<img 
						src="<?= $fichierImage; ?>" 
						alt="<?= $prd["nom"]; ?>"
					>
				</span>
				<span class="nom"><?= $prd["nom"]; ?></span>
				<span class="prix">
					<?= 
						MessageFormatter::formatMessage(
							$langue, "{0, number, :: currency/CAD}", 
							[$prd["prix"]]
						) 
					?>
				</span>
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