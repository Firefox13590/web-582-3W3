<?php
// Inclure la librairie de code i18n
include("lib/i18n.lib.php");

// Tableau des langues disponibles
$languesDisponibles = obtenirLanguesDisponibles();

// Langue à utiliser pour l'affichage.
$langue = determinerLangue($languesDisponibles);

// Textes statiques.
// Remarquez l'"affectation par destructuration" (destructuring assignment)
[$_ent, $_pp, $_, $_cat] = obtenirTextesStatiques($langue, $page);

/*********************
     Gestion de la connexion
 *********************/
include('lib/connexion.lib.php');

if (isset($_COOKIE['isConnected'])) {
    $isConnected = (bool) $_COOKIE['isConnected'];
    $userName = $_COOKIE['userName'];
}
?>
<!DOCTYPE html>
<html lang="<?= $langue ?>">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;900&family=Noto+Serif:ital,wght@0,400;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_->metaTitre; ?></title>
    <meta name="description" content="<?= $_->metaDesc; ?>">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bonus.css">
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <script src="js/main.js" defer></script>
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
                    <?php foreach ($languesDisponibles as $codeLangue) : ?>
                        <a
                            href="?lan=<?= $codeLangue; ?>"
                            title="<?php echo locale_get_display_name($codeLangue, $codeLangue); ?>"
                            <?= ($langue == $codeLangue) ? ' class="actif" ' : '' ?>>
                            <?= $codeLangue; ?>
                        </a>
                    <?php endforeach ?>
                </div>
            </nav>
            <nav class="barre-logo">
                <label for="cc-btn-responsive" class="material-icons burger">menu</label>
                <a class="logo" href="index.php"><img src="images/logo.png" alt="<?= $_ent->logoAlt; ?>"></a>
                <a
                    class="material-icons panier"
                    href="panier.php">
                    shopping_cart
                </a>
                <input class="recherche" type="search" name="motscles" placeholder="<?= $_ent->recherchePlaceholder; ?>">
            </nav>
            <input type="checkbox" id="cc-btn-responsive">
            <nav class="principale">
                <label
                    for="cc-btn-responsive"
                    class="menu-controle material-icons">
                    close
                </label>
                <a <?= ($page == "teeshirts") ? ' class="actif" ' : '' ?> href="teeshirts.php"><?= $_ent->menuTeeshirts; ?></a>
                <a <?= ($page == "casquettes") ? ' class="actif" ' : '' ?> href="casquettes.php"><?= $_ent->menuCasquettes; ?></a>
                <a <?= ($page == "hoodies") ? ' class="actif" ' : '' ?> href="hoodies.php"><?= $_ent->menuHoodies; ?></a>
                <span class="separateur"></span>
                <a <?= ($page == "aide") ? ' class="actif" ' : '' ?> href="aide.php"><?= $_ent->menuAide; ?></a>
                <a <?= ($page == "apropos") ? ' class="actif" ' : '' ?> href="apropos.php"><?= $_ent->menuNous; ?></a>
            </nav>
        </header>