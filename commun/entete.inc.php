<?php
    // Langue par défaut
    $langue = "fr";

    // Lire le fichier JSON qui contient les textes.
    $textesChaineJson =  file_get_contents("i18n/".$langue.".json");
    // Test
    // echo $textesChaineJson;

    // Convertir la chaîne de caractères JSON en objet (ou autre structure de données) PHP.
    $textes = json_decode($textesChaineJson);
    // Test
    // echo $textes; // ERREUR : on ne peut pas "imprimer" une structure (comme un objet ou un tableau)
    // Utiliser les méthodes print_r() ou var_dump() à la place : 
    // print_r($textes);
    // var_dump($textes)

    // Quelques raccourcis utiles pour cet objet ($textes)
    $_ent = $textes->entete;
    $_pp = $textes->pied2page;


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;900&family=Noto+Serif:ital,wght@0,400;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teeTIM // fibre naturelle ... conception artificielle</title>
    <meta name="description" content="Page d'accueil du concepteur de vêtements 100% fait au Québec, conçus par les étudiants du TIM à l'aide de designs produits par intelligence artificielle, et fabriqués avec des fibres 100% naturelles et biologiques.">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" type="image/png" href="images/favicon.png" />
</head>
<body>
    <div class="conteneur">
        <header>
            <nav class="barre-haut">
                <a class="actif" href="#">fr</a>
                <a href="#">cr</a>
            </nav>
            <nav class="barre-logo">
                <label for="cc-btn-responsive" class="material-icons burger">menu</label>
                <a class="logo" href="index.php"><img src="images/logo.png" alt="<?= $_ent->logoAlt; ?>"></a>
                <a class="material-icons panier" href="panier.php">shopping_cart</a>
                <input class="recherche" type="search" name="motscles" placeholder="<?= $_ent->recherchePlaceholder; ?>">
            </nav>
            <input type="checkbox" id="cc-btn-responsive">
            <nav class="principale">
                <label for="cc-btn-responsive" class="menu-controle material-icons">close</label>
                <a <?php if($page=="teeshirts") { echo ' class="actif" '; } ?> href="teeshirts.php"><?= $_ent->menuTeeshirts; ?></a>
                <a <?php if($page=="casquettes") { echo 'class="actif"'; } ?> href="casquettes.php"><?= $_ent->menuCasquettes; ?></a>
                <a <?php if($page=="hoodies") { echo 'class="actif"'; } ?> href="hoodies.php"><?= $_ent->menuHoodies; ?></a>
                <span class="separateur"></span>
                <a <?php if($page=="aide") { echo 'class="actif"'; } ?> href="aide.php"><?= $_ent->menuAide; ?></a>
                <a <?php if($page=="apropos") { echo 'class="actif"'; } ?> href="apropos.php"><?= $_ent->menuNous; ?></a>
            </nav>
        </header>