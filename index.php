<?php 
// indiquer page
$page = "accueil";

// inclure contenu de l'entete ici
// ressemble a un copier/coller
include("modules/entete.mod.php"); 
?>

<main class="page-accueil">
    <article class="amorce">
        <h1><?= $obj_page->amorceH1; ?></h1>
        <h2><?= $obj_page->amorceH2; ?></h2>
        <h4><?= $obj_page->amorceH4; ?></h4>
    </article>
    <article class="principal">
        <p><?= $obj_page->principalP1; ?></p>
        <p><?= $obj_page->principalP2; ?></p>
    </article>
</main>

<?php 
// inclure contenu du pied de page ici
include("modules/pied.mod.php"); 
?>