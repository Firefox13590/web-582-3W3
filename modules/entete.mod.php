<?php
// inclure fichier librairie i18n
include("lib/i18n.lib.php");

// obtenir les langues disponibles
$languesDisponibles = obtenirLanguesDisponibles();
// print_r($languesDisponibles);

// determine la langue a utiliser
$langue = determinerCodeLangue($languesDisponibles);
// print_r($langue);

// recupere textes statiques et les affecte a des raccourcis via array destructuring
[$obj_ent, $obj_pied, $obj_page, $obj_cat] = obtenirTextesStatiques($langue, $page);


/*********************
 Gestion de la connexion
*********************/
include('lib/connexion.lib.php');

if(isset($_COOKIE['isConnected'])){
    $isConnected = (bool) $_COOKIE['isConnected'];
    $userName = $_COOKIE['userName'];
}
?>

<!DOCTYPE html>
<html lang="<?= $langue; ?>">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;900&family=Noto+Serif:ital,wght@0,400;0,900;1,400&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $obj_page->metaTitre; ?></title>
    <meta name="description" content="<?= $obj_page->metaDesc; ?>">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bonus.css">
    <link rel="icon" type="image/png" href="images/favicon.png" />
</head>

<body>
    <div class="conteneur">
        <header>
            <nav class="barre-haut">
                <!-- nouvelle section du nav pour page connexion -->
				<div class="connexion">
					<span class="material-icons-outlined account-icon">account_circle</span>
					<a href="connexion.php" class="btn-connexion <?= $isConnected ? 'actif' : ''; ?>">
						<?= $isConnected ? "Bonjour, $userName" : 'Se connecter'; ?>
					</a>
				</div>

                <div>
                    <!-- <a href="?lan=fr">fr</a>
                    <a href="?lan=en">en</a>
                    <a href="?lan=es">es</a> -->
                    <!-- generer btns choix langue dynamiquement -->
                    <?php
                    // dossier i18n
                    $i18nFolder = scandir("i18n");
                    // print_r($i18nFolder);

                    // methode 1 de faire html avec php
                    // prof dit que c caca, mais perso je prefere
                    for ($i = 2; $i < count($i18nFolder); $i++) {
                        // echo "Ma balz itched $i times";
                        $langueActive = "";
                        $langueFichier = basename($i18nFolder[$i], '.json');
                        // echo $langueFichier;
                        if ($langue === $langueFichier) $langueActive = 'class="actif"';
                        // echo $langueActive;
                        $nomLocale = locale_get_display_name($langueFichier, $langueFichier);
                        // echo $nomLocale;
                        echo "<a href='?lan=$langueFichier' title='$nomLocale' $langueActive>$langueFichier</a> ";
                    }
                    ?>
                </div>

                <!-- methode 2 de faire html avec php -->
                <!-- prof dit que c mieux pask ca empeche de faire du phtml fucked up, mais perso je trouve ca caca -->
                <!-- quanf utilise blocs php decolles comme ca, on peut remplacer acollades ["{", "}"] par [":", "endforeach"] -->
				<!-- <div>
					<?php foreach($languesDisponibles as $indiceLangue): ?>
					<a 
						class="<?= ($langue == $indiceLangue) ? 'actif' : '' ?>" 
						href="?lan=<?= $indiceLangue ?>"
					>
						<?= $indiceLangue ?>
					</a>
					<?php endforeach; ?>
				</div> -->
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