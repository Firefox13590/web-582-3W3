<?php
$page = "casquettes";

// Inclure le contenu du fichier entete.inc.php ICI
include("commun/entete.inc.php");
?>
<main class="page-casquettes">
    <article class="amorce">
        <h1><?= $_->titre; ?></h1>
    </article>
    <article class="principal">
        <p><?= $_->enConstruction; ?></p>
    </article>
</main>
<?php
// Inclure la partie commune en bas de page.
include("commun/pied2page.inc.php");
?>