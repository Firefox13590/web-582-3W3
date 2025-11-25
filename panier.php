<?php
$page = "panier";
include("commun/entete.inc.php");
?>
<main class="page-panier">
    <article class="amorce">
        <h1><?=$_->titrePage?></h1>
    </article>
    <div class="produit-panier">
        <section class="produit-haut">
            <img class="image-produit-panier" src="images/produits/teeshirts/ts0004.webp" alt="">
            <p class="texte-panier">Monstre Douillet</p>
        </section>
        <section class="produit-bas">
            <article class="couleur-panier-vert"></article>
            <p class="taille">M</p>
            <p class="quantite">5</p>
            <p class="prix">29.50$</p>
            <label for="cc-btn-responsive" class="material-icons trash">delete</label>
        </section>
    </div>
        <div class="produit-panier">
        <section class="produit-haut">
            <img class="image-produit-panier" src="images/produits/teeshirts/ts0005.webp" alt="">
            <p class="texte-panier">Bleu comme une orange</p>
        </section>
        <section class="produit-bas">
            <article class="couleur-panier-orange"></article>
            <p class="taille">XS</p>
            <p class="quantite">2</p>
            <p class="prix">19,99$</p>
            <label for="cc-btn-responsive" class="material-icons trash">delete</label>
        </section>
    </div>

    <hr>

    <div class="prix-panier">
        <p class="nombre-produit">(<?= $_->produitTotal; ?>7)</p>
        <p class="prix-total"><?= $_->prixTotal; ?>187,48$</p>
        <button class="commande"><?= $_->commandeComplete; ?></button>
    </div>

</main>
<?php
include("commun/pied2page.inc.php");
?>