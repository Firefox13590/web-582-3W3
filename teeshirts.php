<?php 
// indiquer page
$page = "teeshirts";

// inclure contenu de l'entete ici
// ressemble a un copier/coller
include("modules/entete.mod.php");

// recupere donnees teeshirts
$dataTeeshirts = json_decode(file_get_contents('data/teeshirts.json'));
// var_dump($dataTeeshirts);

// extraire themes et produits catalogue
$themes = [];
$produits = [];

// affichage dynamique chaque produit t-shirts
foreach($dataTeeshirts as $codeTheme => $detailsTheme){
	$themes[$codeTheme] = $detailsTheme->nomTheme->$langue;
	$produits = array_merge($produits, $detailsTheme->produits);
	// var_dump($detailsTheme->produits);
}
// var_dump($themes);
// var_dump($produits);


/* GESTION TRI */
include('lib/filterNSort.lib.php');

$tri = obtenirCriteresTri();
$filtre = obtenirCriteresFiltre();
$produits = trierProduits($produits, $tri);


// methode 1 formattage nombre
// remplacee par deuxieme methode en 1 ligne
/* FORMATTAGE PRIX */
// $frmt = obtenirFormatteurNombre($langue);

?>

<main class="page-produits page-teeshirts">
    <article class="amorce">
        <h1><?= $obj_page->titre; ?></h1>

		<form class="controle" action="">
			<div class="filtre">
				<label for="filtre">Filtrer par thème : </label>
				<select name="filtre" id="filtre">
					<option value="tous" id="">Tous les produits</option>
					
					<?php foreach($themes as $themeKey => $themeValue): ?>
					<option value="<?= $themeKey; ?>" <?= $filtre == $themeKey ? "selected" : ""; ?>><?= $themeValue; ?></option>
					<?php endforeach; ?>

					<!-- <option value="animaux">Animaux</option>
					<option value="nature">Nature</option>
					<option value="jeux">Jeux vidéo</option>
					<option value="inusite">Inusité</option>
					<option value="sport">Sport</option> -->
				</select>
			</div>

			<div class="tri">
				<label for="tri"><?= $obj_cat->etiquetteTri; ?></label>
				<select name="tri" id="tri">
					<option value="aleatoire" <?= $tri == "aleatoire" ? "selected" : ""; ?>><?= $obj_cat->triAleatoire; ?></option>
					<option value="ventesDesc" <?= $tri == "ventesDesc" ? "selected" : ""; ?>><?= $obj_cat->triMeilleurVendeur; ?></option>
					<option value="prixAsc" <?= $tri == "prixAsc" ? "selected" : ""; ?>><?= $obj_cat->triPrixAscendant; ?></option>
					<option value="prixDesc" <?= $tri == "prixDesc" ? "selected" : ""; ?>><?= $obj_cat->triPrixDescendant; ?></option>
					<option value="nomAsc" <?= $tri == "nomAsc" ? "selected" : ""; ?>><?= $obj_cat->triNomAscendant; ?></option>
					<option value="nomDesc" <?= $tri == "nomDesc" ? "selected" : ""; ?>><?= $obj_cat->triNomDescendant; ?></option>
					<option value="dacDesc" <?= $tri == "dacDesc" ? "selected" : ""; ?>><?= $obj_cat->triNouveaute; ?></option>
				</select>
			</div>
		</form>
    </article>
	<!-- controle tri et filtre -->
	
    <article class="principal">
		<?php foreach($produits as $item): ?>
		<div class="produit" data-item-id="<?= $item->id; ?>">
			<span class="image">
				<img src="images/produits/teeshirts/<?= $item->id; ?>.webp" alt="<?= $item->nom->$langue; ?>">
			</span>
			<span class="nom"><?= $item->nom->$langue; ?></span>
			<!-- 
			methode 1 formattage nombre
			remplacee par deuxieme methode en 1 ligne
			-->
			<!-- <span class="prix"><?= ''; //$frmt->formatCurrency($item->prix, "CAD"); ?></span> -->
			 <!-- methode 2 -->
			<span class="prix"><?= MessageFormatter::formatMessage($langue, "{0, number, :: currency/CAD}", [$item->prix]); ?></span>
			<span class="ventes"><?= $item->ventes; ?></span>
			<span class="dac"><?= $item->dac; ?></span>
		</div>
		<?php endforeach; ?>
	</article>
</main>

<script src="./js/main.js"></script>

<?php 
// inclure contenu du pied de page ici
include("modules/pied.mod.php"); 
?>