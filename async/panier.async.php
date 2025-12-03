<?php
// Actions asynchrones panier
session_Start();
include("../lib/sql.lib.php");
include("../lib/panier.lib.php");
$cnx = connexion();
$panierId = $_SESSION["panierId"];
$action = $_GET["action"] ?? "";

switch($action){
    case "ajouter":
        $produitId = $_GET["produitId"] ?? 0;
        ajouterArticle($cnx, $panierId, $produitId);
        break;
    case "modifier":

        break;
    case "supprimer":

        break;
}

$detailPanier = obtenirDetailPanier($cnx, $panierId);



echo json_encode($detailPanier);
