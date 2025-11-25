<?php
$page = "teeshirts";
include("commun/entete.inc.php");
include("lib/catalogue.lib.php");

// Intégrer le fichier JSON contenant les produits
// $catalogue = json_decode(file_get_contents("data/teeshirts.json"));

// filtres pour sql
$tri = $_GET['tri'] ?? "RAND()";
$filtre = $_GET['filtre'] ?? "tous";
$filtreSql = $filtre != "tous" ? " AND themeId = $filtre" : "";

// Intégrer la DB MySQL
// pas securitaire: a mettre cache ailleiurs (plus tard)
$cnx = mysqli_connect('localhost', 'root', '');
mysqli_set_charset($cnx, 'utf8mb4');
mysqli_select_db($cnx, 'teetim');

$themesSqlRes = mysqli_query($cnx, "SELECT * FROM themes");
// CODE DANGEREUX: usceptible d'attaque par injection sql
// on arrange ca plus tard
// $produitsSqlRes = mysqli_query($cnx, "SELECT * FROM produits WHERE categorieId = 1");
$produitsSqlRes = mysqli_query($cnx, 
    "SELECT * FROM produits WHERE categorieId = 1 $filtreSql ORDER BY $tri");
$nbProduitsSqlRes = mysqli_query($cnx, "SELECT themeId, COUNT(id) AS nbProduits FROM produits GROUP BY themeId");

// On crée deux tableaux pour stocker les thèmes et les produits
// $themes = [];
// $produits = [];
$themes = mysqli_fetch_all($themesSqlRes, MYSQLI_ASSOC);
// print_r($themes);
$produits = mysqli_fetch_all($produitsSqlRes, MYSQLI_ASSOC);
// print_r($produits);
$nbProduitsTheme = mysqli_fetch_all($nbProduitsSqlRes, MYSQLI_ASSOC);
// print_r($nbProduitsTheme);

// // création d'un autre tableau pour compter le nombre de produits par thèmes
// $nbProduitsTheme = [];

// // On parcourt le catalogue pour sortir les thèmes et fusionner les produits
// foreach ($catalogue as $codeTheme => $detailTheme) {
//     $themes[$codeTheme] = $detailTheme->theme->$langue ?? $detailTheme->theme->fr;

//     // Compter le nombre de produits par thème
//     $nbProduitsTheme[$codeTheme] = count($detailTheme->produits);

//     // Fusionner avec le tableau $produits
//     $produits = array_merge($produits, $detailTheme->produits);
// }

// // filtre des produits avant le tri
// $filtre = obtenirCritereFiltre();
// $produits = filtrerProduits($produits, $filtre);
// // Le tri des produits est fait à la fin, après le filtrage.
// $tri = obtenirCritereTri();
// $produits = trierProduits($produits, $tri);
?>
<main class="page-produits page-teeshirts">
    <article class="amorce">
        <h1><?= $_->titrePage; ?></h1>
        <form class="controle" action="">
            <div class="filtre">
                <label for="filtre"><?= $_cat->etiquetteFiltre; ?> </label>
                <select name="filtre" id="filtre">
                    <option <?= ($filtre == "tous") ? "selected" : ""; ?>
                        value="tous"><?= $_cat->filtreTous; ?>
                        (<?= count($produits); ?>) </option>
                    <!-- Générer les options des thèmes dynamiquement -->
                    <?php foreach ($themes as $theme) : ?>
                        <option <?= ($filtre == $theme['id']) ? "selected" : ""; ?>
                            value="<?= $theme['id']; ?>"><?= $theme['nom']; ?>
                            (<?= $nbProduitsTheme[$theme['id'] - 1]['nbProduits']; ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="tri">
                <label for="tri"><?= $_cat->etiquetteTri; ?></label>
                <select name="tri" id="tri">
                    <option <?= ($tri == "RAND()") ? "selected" : ""; ?> value="RAND()"><?= $_cat->aleatoire; ?></option>
                    <option <?= ($tri == "ventes DESC") ? "selected" : ""; ?> value="ventes DESC"><?= $_cat->ventesDesc; ?></option>
                    <option <?= ($tri == "prix ASC") ? "selected" : ""; ?> value="prix ASC"><?= $_cat->prixAsc; ?></option>
                    <option <?= ($tri == "prix DESC") ? "selected" : ""; ?> value="prix DESC"><?= $_cat->prixDesc; ?></option>
                    <!-- Pour les besoins du TP, nous ne gérons pas le tri par nom et par date d'ajout -->
                    
                        <option <?= ($tri == "nom ASC") ? "selected" : ""; ?> value="nom ASC"><?= $_cat->nomAsc; ?></option>
                        <option <?= ($tri == "nom DESC") ? "selected" : ""; ?> value="nom DESC"><?= $_cat->nomDesc; ?></option>
                        <option <?= ($tri == "dac DESC") ? "selected" : ""; ?> value="dac DESC"><?= $_cat->dacDesc; ?></option>
                   
                </select>
            </div>
        </form>
    </article>
    <article class="principal">
        <!-- Gabarit -->
        <?php foreach ($produits as $prd) : ?>
            <div class="produit">

                <span class="image">
                    <?php
                    $nbVentes = $prd['ventes'];
                    if ($nbVentes > 0):
                    ?>
                        <span class="ventes">
                            <?php
                            echo ($nbVentes);
                            ?>
                        </span>
                    <?php endif;

                    //chemin d'accès vers l'image demandé en fonction du id
                    $cheminImage = "images/produits/teeshirts/" . $prd['id'] . ".webp";
                    //si l'image n'existe pas, utiliser l'image par défaut.
                    if (!file_exists($cheminImage)) {
                        $cheminImage = "images/produits/teeshirts/ts0000.webp";
                    }
                    ?>
                    <img src="<?= $cheminImage; ?> " alt="<?= $prd['nom']; ?>">
                </span>

                <span class="nom"><?= $prd['nom']; ?></span>
                <span class="prix"><?= MessageFormatter::formatMessage($langue, "{0, number, :: currency/CAD}", [$prd['prix']]) ?></span>
            </div>
        <?php endforeach; ?>
    </article>
</main>

<!-- Gabarit à utiliser pour implémenter l'affichage asynchrone des produits -->
<!-- Adapter le gabarit ci-dessous pour répondre aux besoins du TP -->
<template id="gabarit-produit">
    <div class="produit">
        <span class="image">
            <span class="ventes">indicateur ventes</span>
            <img
                src="images/produits/teeshirts/[ID].webp"
                alt="Nom du produit dans la langue courante">
        </span>
        <span class="nom">Nom du produit dans la langue courante</span>
        <span class="prix">
            <span class="montant">XX.XX</span>
        </span>
    </div>
</template>
<?php
include("commun/pied2page.inc.php");
?>