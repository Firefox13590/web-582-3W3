<?php 
// indiquer page
$page = "casquettes";

// inclure contenu de l'entete ici
// ressemble a un copier/coller
include("modules/entete.mod.php"); 
?>

<main class="page-produits page-casquettes">
    <article class="amorce">
        <h1><?= $obj_page->titre; ?></h1>
    </article>
    <article class="principal">
        <p><?= $obj_page->enConstruction; ?></p>
    </article>
</main>

<?php 
// inclure contenu du pied de page ici
include("modules/pied.mod.php"); 
?>