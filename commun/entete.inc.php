<?php
// Inclure le fichier de la librairie i18n
include("lib/i18n.lib.php");

// Obtenir le tableau des langues disponibles
$languesDisponibles = obtenirLanguesDisponibles();

// Déterminer la langue à utiliser
$langue = determinerCodeLangue($languesDisponibles);

// Obtenir les textes et les mettres dans les raccourcis utilisés dans le site.
// On utilise l'affectation par épandage (destructuring assignment)
[$_ent, $_pp, $_] = recupererTextesStatiques($langue, $page);

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
                <!-- Générer les boutons de choix de langue dynamiquement en PHP -->

                <?php
                // Méthode 1 : moins désirable
                // foreach ($languesDisponibles as $codeLangue) {
                //     echo "<a href='?lan=$codeLangue'>$codeLangue</a>";
                // }
                ?>
                <?php foreach ($languesDisponibles as $codeLangue) :  ?>
                    <a
                        <?= $langue == $codeLangue ? 'class="actif"' : '' ?>
                        href="?lan=<?= $codeLangue; ?>">
                        <?= $codeLangue; ?>
                    </a>
                <?php endforeach ?>
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
                <a <?= $page == "teeshirts" ? ' class="actif" ' : '' ?> href="teeshirts.php"><?= $_ent->menuTeeshirts; ?></a>
                <a <?= $page == "casquettes" ? ' class="actif" ' : '' ?> href="casquettes.php"><?= $_ent->menuCasquettes; ?></a>
                <a <?= $page == "hoodies" ? ' class="actif" ' : '' ?> href="hoodies.php"><?= $_ent->menuHoodies; ?></a>
                <span class="separateur"></span>
                <a <?= $page == "aide" ? ' class="actif" ' : '' ?> href="aide.php"><?= $_ent->menuAide; ?></a>
                <a <?= $page == "apropos" ? ' class="actif" ' : '' ?> href="apropos.php"><?= $_ent->menuNous; ?></a>
            </nav>
        </header>