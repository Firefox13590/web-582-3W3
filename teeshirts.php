<?php 
// indiquer page
$page = "teeshirts";

// inclure contenu de l'entete ici
// ressemble a un copier/coller
include("modules/entete.mod.php"); 
?>

<main class="page-produits page-teeshirts">
    <article class="amorce">
        <h1><?= $obj_page->titre; ?></h1>
    </article>
	<!-- controle tri et filtre -->
	<form class="controle">
		<div class="filtre">
			<label for="filtre">Filtrer par thème : </label>
			<select name="filtre" id="filtre">
				<option value="tous">Tous les produits</option>
				<option value="animaux">Animaux</option>
				<option value="nature">Nature</option>
				<option value="jeux">Jeux vidéo</option>
				<option value="inusite">Inusité</option>
				<option value="sport">Sport</option>
			</select>
		</div>
		<div class="tri">
			<label for="tri">Trier par : </label>
			<select name="tri" id="tri">
				<option value="tous">Meilleur vendeur</option>
				<option value="prix-asc">Prix / ascendant</option>
				<option value="prix-desc">Prix / descendant</option>
				<option value="nom-asc">Alpha / ascendant</option>
				<option value="nom-desc">Alpha / descendant</option>
				<option value="date_jout">Nouveauté</option>
			</select>
		</div>
	</form>
	
    <article class="principal">
		<?php
			// recupere donnees teeshirts
			$dataTeeshirts = json_decode(file_get_contents('data/teeshirts.json'));
			// var_dump($dataTeeshirts);

			// extraire themes et produits catalogue
			$themes = [];
			$produits = [];
			
			// affichage dynamique chaque produit t-shirts
			foreach($produits as $item):
		?>
		<div class="produit" data-item-id="<?= $data->id; ?>">
			<span class="image">
				<img src="images/produits/teeshirts/<?= $data->id; ?>.webp" alt="<?= $data->nom; ?>">
			</span>
			<span class="nom"><?= $data->nom; ?></span>
			<span class="prix"><?= $data->prix; ?> $</span>
		</div>
		<?php endforeach; ?>
	</article>
</main>

<?php 
// inclure contenu du pied de page ici
include("modules/pied.mod.php"); 
?>