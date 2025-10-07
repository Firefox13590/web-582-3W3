<?php 
    // Indiquer la page
    $page = "hoodies";
    include("modules/entete.mod.php"); 
?>
    <main class="page-produits page-hoodies">
        <!-- externalisation des textes -->
        <article class="amorce">
            <h1><?= $obj_page->titre; ?></h1>
        </article>
        <article class="principal">
            <?= $obj_page->enConstruction; ?>
        </article>
    </main>
<?php 
// inclure contenu du pied de page ici
include("modules/pied.mod.php"); 
?>