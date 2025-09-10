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
                <!-- <a href="#">en</a>
                <a href="#">es</a>
                <a class="actif" href="#">fr</a> -->
                <?php 
                    // langue par défaut
                    $langue = "fr";
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

                    $propertyPageName = "page".ucfirst($page);
                    // echo $propertyPageName;
                    $obj_page = $obj->$propertyPageName;
                    // print_r($obj_page);

                    // dossier i18n
                    $i18nFolder = scandir("i18n");
                    // print_r($i18nFolder);
                    for($i = 2; $i < count($i18nFolder); $i++){
                        $langueActive = "";
                        $langueFichier = basename($i18nFolder[$i], '.json');
                        if($langue === $langueFichier) $langueActive = 'class="actif"';
                        // echo $langueActive;
                        // echo "Ma balz itched $i times";
                        // echo $langueFichier;
                        echo "<a $langueActive>$langueFichier</a> ";

                    }
                ?>
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
                <a <?php if($page == "teeshirts"){echo "class='actif'";} ?> href="teeshirts.php"><?= $obj_ent->navTeeshirts; ?></a>
                <a <?php if($page == "casquettes"){echo "class='actif'";} ?> href="casquettes.php"><?= $obj_ent->navCasquettes; ?></a>
                <a <?php if($page == "hoodies"){echo "class='actif'";} ?> href="hoodies.php"><?= $obj_ent->navHoodies; ?></a>
                <span class="separateur"></span>
                <a <?php if($page == "aide"){echo "class='actif'";} ?> href="aide.php"><?= $obj_ent->navAide; ?></a>
                <a <?php if($page == "apropos"){echo "class='actif'";} ?> href="apropos.php"><?= $obj_ent->navNous; ?></a>
            </nav>
        </header>