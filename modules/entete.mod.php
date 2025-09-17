<?php 
    /** INTERECTIVITE DE CHANGEMENT DE LANGUE */

    // langue par défaut
    $langue = "fr";

    // dossier i18n
    $i18nFolder = scandir("i18n");
    // print_r($i18nFolder);

    // recupere array assosiatif (index nommes) avec tous param requete http (querystring)
    // print_r($_GET);
    // recuperer choix langue dans cookie si user a fait choix auparavant
    // check si langue dans cookie est disponible
    if(isset($_COOKIE["lan"]) && in_array($_COOKIE["lan"].".json", $i18nFolder)){
        $langue = $_COOKIE["lan"];
    }

    // langue dynamique (apres clique sur btn de langue)
    // si index abscent, "fr" par defaut
    // check si langue dans url est disponible
    // echo $_GET["lan"];
    // print_r(in_array($_GET["lan"], $i18nFolder));
    if(isset($_GET["lan"]) && in_array($_GET["lan"].".json", $i18nFolder)){
        $langue = $_GET['lan'];
        // retenir choix de langue dans temoin HTTP (cookie)
        setcookie("lan", $langue, time()+60*60*24*30);
    }

    // lire fichier json
    $json = file_get_contents("i18n/$langue.json"); 
    // convertir en objet (ou autre structure) php
    $obj = json_decode($json); 
    // erreur: echo print seulement les strings, pas les structures/objets
    // utiliser print_r() ou var_dump() plutot
    // echo $obj;
    // print_r($obj);
    // var_dump($obj);

    // raccourcis utiles pour objet
    $obj_ent = $obj->moduleEntete;
    $obj_pied = $obj->modulePied;

    // raccourcis dynamique pour page
    $propertyPageName = "page".ucfirst($page);
    // echo $propertyPageName;
    $obj_page = $obj->$propertyPageName;
    // print_r($obj_page);
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
                <!-- <a href="?lan=fr">fr</a>
                <a href="?lan=en">en</a>
                <a href="?lan=es">es</a> -->
                <!-- generer btns choix langue dynamiquement -->
                <?php
                    // dossier i18n
                    // $i18nFolder = scandir("i18n");
                    // print_r($i18nFolder);

                    // methode 1 de faire html avec php
                    // prof dit que c caca, mais perso je prefere
                    for($i = 2; $i < count($i18nFolder); $i++){
                        // echo "Ma balz itched $i times";
                        $langueActive = "";
                        $langueFichier = basename($i18nFolder[$i], '.json');
                        // echo $langueFichier;
                        if($langue === $langueFichier) $langueActive = 'class="actif"';
                        // echo $langueActive;
                        $nomLocale = locale_get_display_name($langueFichier, $langueFichier);
                        // echo $nomLocale;
                        echo "<a href='?lan=$langueFichier' title='$nomLocale' $langueActive>$langueFichier</a> ";
                    }
                ?>

                <!-- methode 2 de faire html avec php -->
                <!-- prof dit que c mieux pask ca empeche de faire du phtml fucked up, mais perso je trouve ca caca -->
                <!-- quanf utilise blocs php decolles comme ca, on peut remplacer acollades ["{", "}"] par [":", "endforeach"] -->
                <!-- < for($i = 2; $i < count($i18nFolder); $i++) :
                    $langueActive = "";
                    $langueFichier = basename($i18nFolder[$i], '.json');
                    // echo $langueFichier;
                    if($langue === $langueFichier) $langueActive = 'class="actif"';
                    // echo $langueActive;
                    $nomLocale = locale_get_display_name($langueFichier, $langueFichier); ?>
                    <a 
                    href="?lan=< $langueFichier; ?>"
                    title="< $nomLocale; ?>"
                    < $langueActive; ?>>
                        < $langueFichier; ?>
                    </a>
                < endforeach; ?> -->
            </nav>
            <nav class="barre-logo">
                <label for="cc-btn-responsive" class="material-icons burger">menu</label>
                <!-- quand balise php contient juste echo, remplace "?php" par "?=" -->
                <a class="logo" href="index.php"><img src="images/logo.png" alt="<?= $obj_ent->logoAlt; ?>"></a>
                <a class="material-icons panier" href="panier.php">shopping_cart</a>
                <input class="recherche" type="search" name="motscles" placeholder="<?= $obj_ent->inputSearchPlaceholder ?>">
            </nav>
            <input type="checkbox" id="cc-btn-responsive">
            <nav class="principale">
                <label for="cc-btn-responsive" class="menu-controle material-icons">close</label>
                <a <?= $page == "teeshirts" ? "class='actif'" : ""; ?> href="teeshirts.php"><?= $obj_ent->navTeeshirts; ?></a>
                <a <?= $page == "casquettes" ? "class='actif'" : ""; ?> href="casquettes.php"><?= $obj_ent->navCasquettes; ?></a>
                <a <?= $page == "hoodies" ? "class='actif'" : ""; ?> href="hoodies.php"><?= $obj_ent->navHoodies; ?></a>
                <span class="separateur"></span>
                <a <?= $page == "aide" ? "class='actif'" : ""; ?> href="aide.php"><?= $obj_ent->navAide; ?></a>
                <a <?= $page == "apropos" ? "class='actif'" : ""; ?> href="apropos.php"><?= $obj_ent->navNous; ?></a>
            </nav>
        </header>