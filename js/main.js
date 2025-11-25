// 1) Méthode traditionnelle
// Soumettre le formulaire de filtre et tri lorsqu'une option 
// dans l'une ou l'autre des listes change.
document.querySelectorAll("form.controle select").forEach(
    eltSelect => eltSelect.addEventListener("change", 
        evt => evt.target.form.submit()
    )
);

// Méthode utilisant la technique Ajax
// document.querySelectorAll("form.controle select").forEach(
//     eltSelect => eltSelect.addEventListener("change", 
//         evt => {
//             evt.preventDefault();
//             gererProduitsAsynchrone(evt.target.form)
//         }
//     )
// );

async function gererProduitsAsynchrone(frm) {
    console.log("Le formulaire du SELECT qui a déclenché l'évt CHANGE : "
        , frm);

    const paramsURL = new URLSearchParams(new FormData(frm)).toString();

    console.log("Chaîne des paramètres d'URL : " + paramsURL);
    
    
    // Envoyer la requête HTTP adéquate
    const reponseFiltreEtTri = await fetch("async/produits.async.php?" + paramsURL);
    console.log("reponseFiltreEtTri : ", reponseFiltreEtTri);
    
    // Sortir le contenu JSON de la réponse HTTP
    const contenu = await reponseFiltreEtTri.json();

    // Modifier le UI (afficher les produits dans le tableau "contenu")
    afficherProduits(contenu);
}

function afficherProduits(produits) {
    console.log("Le tableau des produits triés et filtrés : ", produits);
    // Vider le conteneur
    let conteneurProduits = document.querySelector("article.principal");
    conteneurProduits.innerHTML = "";

    // Gabarit d'un produit
    const gabaritProduit = document.querySelector("#gabarit-produit").content;
    let eltProduit = null;

    // Récupérer la langue active
    const langue = document.querySelector("html").lang;

    for (const prd of produits) {
        eltProduit = gabaritProduit.cloneNode(true);
        eltProduit.querySelector(".image img").src 
            = "images/produits/teeshirts/" + prd.id + ".webp";
        eltProduit.querySelector(".image img").alt =  prd.nom[langue]; 
        eltProduit.querySelector(".prix").innerText = prd.prix;
        eltProduit.querySelector(".nom").innerText = prd.nom[langue];


        // Ajouter l'élément au conteneur
        conteneurProduits.append(eltProduit);
    }

}