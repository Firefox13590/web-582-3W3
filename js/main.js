
// methode traditionelle
// soumettre formulaire filtre et tri lorsqu'une des options change
// document.querySelectorAll("form.controle select").forEach(
//     (elem) => elem.addEventListener("change", 
//         (e) => e.target.form.submit()
//     )
// );


// methode Ajax
// soumettre formulaire filtre et tri lorsqu'une des options change
document.querySelectorAll("form.controle select").forEach(
    (elem) => {elem.addEventListener("change", 
        (e) => {
            e.preventDefault;
            handleProductRequestAsync(e.target.form);
        }
    )}
);

/**
 * 
 * @param {*} form 
 */
async function handleProductRequestAsync(form){
    console.log("form: ", form);
    const paramUrl = new URLSearchParams(new FormData(form));
    console.log(paramUrl, paramUrl.toString());

    const repProduits = await fetch("async/produits.async.php?" + paramUrl);
    console.log(repProduits);

    afficherProduits(await repProduits.json());
}

/**
 * 
 * @param {*} dataProduits 
 */
function afficherProduits(dataProduits){
    console.log("Product array: ", dataProduits);

    const contenteurProduits = document.querySelector("article.principal");
    contenteurProduits.innerHTML = "";

    // gabarit
    const gabaritProduit = document.querySelector("#template-produit").content;
    let singleDataProduct;
    const langue = document.documentElement.lang;

    for(const data of dataProduits){
        singleDataProduct = gabaritProduit.cloneNode(true);
        singleDataProduct.querySelector(".produit").dataset.itemId = data.id;
        singleDataProduct.querySelector(".image img").src = `images/produits/teeshirts/${data.id}.webp`;
        singleDataProduct.querySelector(".image img").alt = data.nom[langue];
        singleDataProduct.querySelector(".prix").innerText = new Intl.NumberFormat(langue, {style: "currency", currency: "CAD"}).format(data.prix);
        singleDataProduct.querySelector(".nom").innerText = data.nom[langue];

        // ajout au conteneur
        contenteurProduits.append(singleDataProduct);
    }
}

