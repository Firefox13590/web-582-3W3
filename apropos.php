<?php 
    // Indiquer la page
    $page = "apropos";
    include("modules/entete.mod.php"); 
?>
    <main class="page-apropos">
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