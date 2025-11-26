<?php
// Indiquer la page
$page = "accueil";

// Inclure le contenu du fichier entete.inc.php ICI
// Cette opération ressemble à un copier/coller
include("commun/entete.inc.php");
?>
<main class="page-accueil">
    <article class="amorce">
        <h1><?= $_->amorceH1; ?></h1>
        <h2><?= $_->amorceH2; ?></h2>
        <h4><?= $_->amorceH4; ?></h4>
    </article>
    <article class="principal">
        <p><?= $_->para1; ?></p>
        <p><?= $_->para2; ?></p>
    </article>
</main>
<?php
// Inclure la partie commune en bas de page.
include("commun/pied2page.inc.php");
?>