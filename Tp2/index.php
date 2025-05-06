<?php
if (isset($_COOKIE['panier'])) {
    $panier = json_decode($_COOKIE['panier'], true);
} else {
    $panier = array();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <nav class=" navigation navbar navbar-expand-md  border p-0  px-5">
        <div class="container-fluid py-0">
            <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#menuHamburger" aria-controls="menuHamburger" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
          <a class="navbar-brand" href="#">
          <img src="./Tp2img/logoA.png" alt="Logo" width="80" height="80">
           <span class="nom"> E-com Zen-Store</span>
        </a>
          
            <ul class="navbar-nav  ">
            <button id="darkModeToggle" class="mode btn btn-outline-secondary me-4" type="button">
    <i id="darkIcon" class="bi bi-moon-fill"></i> 
</button>              
            <button class="btn btn-outline-success me-2 border-0" type="button"><i class="bi bi-person"></i> Se connecter</button>
            </ul>
           </div> 
          </nav>
      <div class=" contenu d-flex">
        <!-- Menu vertical -->
        
        <div class="navbar-collapse border collapse d-md-block w-100 w-md-25" id="menuHamburger">
            <ul class="nav flex-column text-white p-3  gap-3" >
             <div class="element " id="acceuil" onclick ="acceuil()" ><li class="nav-item"><a class="nav-link active " ><i class="bi bi-house-fill"></i> Accueil</a></li></div> 
             <div class="element" id="panier" onclick ="panier()"><li class="nav-item element" onclick="panier()"><a class="nav-link position-relative">
                <span class="position-relative">
                    <span id="notif" class="position-absolute mt-0 start-100 translate-middle badge rounded-pill bg-danger d-none">
                        
                    </span>
                        </span>
                             <i class="bi bi-cart fs-5"></i>Panier</a></li></div>

              <div class="element"  ><li class="nav-item"><a class="nav-link "><i class="bi bi-person"></i> Profil</a></li></div>
            
              <div class="fonctionalités ">
              <div class="filtre">
                <i class="bi bi-funnel"></i> 
                <p class=>Filtres</p>
                <p id="count_filtre" class="nbproduit"></p>
                <div id="reload" class="reitiliser btn btn-danger">
                        <i class="bi bi-funnel"></i>
                        Réinitialiser   
                    </div>
            </div>

                
                <div>
                    <p>Trier par &nbsp;&nbsp; <i class="bi bi-info-circle"></i> </p>
                    <select id="pro_filtre" class="form-select">
                        <option value="1" selected>Titre(A-Z)</option>
                        <option value="2">Titre(Z-A)</option>
                        <option value="3">Prix (croissant)</option>
                        <option value="4">Prix (décroissant)</option>
                        </select>
                </div>
                <div>
                    <p> Recherche &nbsp;&nbsp; <i class="bi bi-info-circle"></i> </p>
                    <input id="search" type="text" class="form-control" placeholder="Rechercher des produits..." aria-label="Rechercher">
                </div>
                <div>
                    <p>Catégories &nbsp;&nbsp; <i class="bi bi-info-circle"></i> </p>
                    <select id="category_filtre"  class="form-select">
                        <option value="All" selected>Toutes les catégories</option>
                        <option value="beauty">Beauty</option>
                        <option value="fragrances">Fragrances</option>
                        <option value="furniture">Furniture</option>
                        <option value="groceries">Groceries</option>
                        <option value="home-decoration">Home Decoration</option>
                        <option value="kitchen-accessories">Kitchen Accessories</option>
                        <option value="laptops">Laptops</option>
                        <option value="mens-shirts">Mens Shirts</option>
                        <option value="mens-shoes">Mens Shoes</option>
                        <option value="mens-watches">Mens Watches</option>
                        <option value="mobile-accessories">Mobile Accessories</option>
                        <option value="motorcycle">Motorcycle</option>
                        <option value="skin-care">Skin Care</option>
                        <option value="smartphones">Smartphones</option>
                        <option value="sports-accessories">Sports Accessories</option>
                        <option value="sunglasses">Sunglasses</option>
                        <option value="tablets">Tablets</option>
                        <option value="tops">Tops</option>
                        <option value="vehicle">Vehicle</option>
                        <option value="womens-bags">Womens Bags</option>
                        <option value="womens-dresses">Womens Dresses</option>
                        <option value="womens-jewellery">Womens Jewellery</option>
                        <option value="womens-shoes">Womens Shoes</option>
                        <option value="womens-watches">Womens Watches</option>

                        </select>
                </div>
                <div>
                    <div id="filtre_prix">
                    <label for="Prix">Prix : <span id="PriceValue"></span>€</label>
                    <input type="range" id="Prix"  step="10">



                    <button class="btn btn-danger" id="reloadPrix" > Réinitialiser</button>
                    </div>

                </div>     
            </ul>
          </div> 
        
          
    


    <div class="container  ">
        <div class="row">
            <div class="d-flex  mb-3">
            <p id="statistique"></p>
        
        <div>
        <div id="perPage">
        <label class="ms-3" for="itemsPerPage">Produits par page :</label>
        <select class="mantine-Select-input p-1" id="itemsPerPage" name="itemsPerPage">
            <option value="12" selected>12 par page</option>
            <option value="24">24 par page</option>
            <option value="36">36 par page</option>
            <option value="48">48 par page</option> 
        </select>
        </div>
        </div></div>
    </div>
        <div id="container" class="articles row "></div>
    </div>
</div>
<div id="items-container"></div>

<div id="pagination" style="margin-top: 20px; text-align: center;"></div>

<!-- Modèle d'alerte d'ajout-->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="cartToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body" id="toast-body">
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Fermer"></button>
    </div>
  </div>
</div>

<!-- Modèle de confirmation de la sppression --> 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body" id="modalBody">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-danger" id="confirmAction">Confirmer</button>
      </div>
    </div>
  </div>
</div>

  
    <script>
        const url = 'https://api.daaif.net/products?limit=194';

        let allProducts = []; 
        let filteredProducts = []; 
        let prix_max;
        let prix_min;
        let currentPage = 1;

// Chargement initial des produits + gestion des produits par page
fetch(url)
    .then(response => response.json())
    .then(data => {
        console.log("Produits récupérés :", data.products);
        allProducts = data.products.sort((a, b) => a.title.localeCompare(b.title)); // Tri par défaut par titre croissant
        filteredProducts = allProducts; // Initialisation des produits filtrés avec tous les produits
        // Affichage des 12 premiers produits par défaut
        const itemsPerPage = 12;  // Affichage par défaut de 12 produits
        afficher(data.products.slice(0, itemsPerPage));

        const prix= document.getElementById('Prix');
        const pricevalue = document.getElementById('PriceValue');
        prix_max= Math.max(...data.products.map(product => product.price)); 
        prix_min= Math.min(...data.products.map(product => product.price));

        prix.max = prix_max;
        prix.min = prix_min;
        prix.value = prix.max; 
        pricevalue.textContent = prix.max; 
        
        

        // Appel à la fonction pour afficher les produits selon la sélection de la page
        afficherProduitsParPage();
         // Affiche le nombre total de produits
        const count_filtre = document.getElementById('count_filtre');
        count_filtre.innerHTML = `${allProducts.length} produits`;

        afficherPagination();
        
        // Applique les filtres
        appliquer_filtre(); 
        filtre_prix(); // Applique le filtre de prix
        search(); // Applique le filtre de recherche
        filtre_category(); // Applique le filtre de catégorie

        CartNotification();

    })
    .catch(error => console.error("Erreur lors de la récupération des produits :", error));

function afficherProduitsParPage() {
    document.getElementById('statistique').innerHTML = `Nombre total de produits : ${allProducts.length}`;
    const itemsPerPage = parseInt(document.getElementById('itemsPerPage').value, 10) || 12;  // Valeur par défaut de 12 si non sélectionnée
     currentPage = 1;
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    afficher(filteredProducts.slice(startIndex, endIndex));
    afficherPagination();
}

// Événement : changement de la sélection des produits par page
document.getElementById('itemsPerPage').addEventListener('change', () => {
    currentPage = 1;
    afficherProduitsParPage();
});


function afficher(produits) {
    const container = document.getElementById('container');
    container.innerHTML = '';

    if (!Array.isArray(produits) || produits.length === 0) {
        container.innerHTML = '<p class="text-warning">Aucun produit disponible.</p>';
        return;
    }

    produits.forEach(produit => {
        const card = document.createElement('div');
        card.className = 'col-12 col-md-6 col-lg-4 mb-4';

        const cardInner = document.createElement('div');
        cardInner.className = 'card shadow';

        const img = document.createElement('img');
        img.className = 'card-img-top';
        img.src = produit.images && produit.images.length > 0 ? produit.images[0] : 'https://via.placeholder.com/150';
        img.alt = produit.title || "Image indisponible";

        const cardBody = document.createElement('div');
        cardBody.className = 'card-body';

        const title = document.createElement('h5');
        title.className = 'card-title';
        title.textContent = produit.title || "Nom inconnu";

        const price = document.createElement('p');
        price.className = 'card-price fw-bold';
        price.textContent = produit.price ? `${produit.price}€` : 'Prix non disponible';

        const description = document.createElement('p');
        description.className = 'card-text';
        description.textContent = produit.description || "Pas de description.";

        const button = document.createElement('a');
        button.className = 'btn btn-primary w-100';
        button.setAttribute('data-product-id', produit.id); 
        button.addEventListener('click', function() {
            add_panier(produit); 
        });
        button.textContent = 'Ajouter au panier';

        cardBody.appendChild(title);
        cardBody.appendChild(description);
        cardBody.appendChild(price);
        cardBody.appendChild(button);

        cardInner.appendChild(img);
        cardInner.appendChild(cardBody);
        card.appendChild(cardInner);
        container.appendChild(card);
    });
}

function afficherPagination() {
    const itemsPerPage = parseInt(document.getElementById('itemsPerPage').value, 10) || 12;
    const totalPages = Math.ceil(filteredProducts.length / itemsPerPage);
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = '';
    for (let i = 1; i <= totalPages; i++) {
        const button = document.createElement('button');
        button.className = 'btn btn-outline-primary mx-1';
        button.textContent = i;
        button.addEventListener('click', function() {
            const startIndex = (i - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            console.log("Produits filtrés :",filteredProducts );
            afficher(filteredProducts.slice(startIndex, endIndex));
        document.querySelectorAll('#pagination button').forEach(b => b.classList.remove('active'));
      button.classList.add('active');
        });
        pagination.appendChild(button);
    }
    const firstBtn = pagination.querySelector(`button:nth-child(${currentPage})`);
    if (firstBtn) firstBtn.classList.add('active');
}



// filtre
function appliquer_filtre(){
const selectElement = document.getElementById("pro_filtre");

selectElement.addEventListener("change", function() {
  const selectedValue = this.value;
  console.log("Valeur sélectionnée :", selectedValue);
  switch (selectedValue) {
    case "1":
      filteredProducts.sort((a, b) => a.title.localeCompare(b.title));
      break;
    case "2":
      filteredProducts.sort((a, b) => b.title.localeCompare(a.title));
      break;
    case "3":
       filteredProducts.sort((a, b) => a.price - b.price);
      break;
    case "4":
       filteredProducts.sort((a, b) => b.price - a.price);
      break;
    default:
      break;
  }
  currentPage = 1;
    afficherProduitsParPage();
    afficherPagination();
});

}

function search(){
    const searchInput = document.getElementById('search');
    searchInput.addEventListener('input', function() {
        combinerFiltres();   
    });
   
}

function filtre_prix(){
    const rangeInput = document.getElementById('Prix');
    const pricevalue = document.getElementById('PriceValue');
    rangeInput.addEventListener('input', function(){
        pricevalue.textContent = this.value;
       combinerFiltres();
    });
   
}

function filtre_category(){
    const categoryInput = document.getElementById('category_filtre');
    categoryInput.addEventListener('change', function() {
        combinerFiltres();  
    });
}

function combinerFiltres() {
    const searchValue = document.getElementById('search').value.toLowerCase().trim();
    const selectedValue = document.getElementById("pro_filtre").value;
    const maxPrice = document.getElementById('Prix').value;
    const categoryValue = document.getElementById('category_filtre').value;
    console.log("Valeur de la catégorie :", categoryValue);
    const itemsPerPage = null ? 12 :parseInt(document.getElementById('itemsPerPage').value, 10) || 12; // Valeur par défaut de 12 si non sélectionnée
    console.log("Valeur de la recherche :", itemsPerPage);
     filteredProducts = allProducts.filter(product => {
        const matchesSearch = product.title.toLowerCase().includes(searchValue);
        const matchesPrice = product.price <= maxPrice;
        const matchesCategory = product.category === categoryValue || categoryValue === 'All'; 
        return matchesSearch && matchesPrice && matchesCategory;
    });
    currentPage = 1; 
    appliquer_filtre(); 
    afficherProduitsParPage();
    afficherPagination();
    const count_filtre = document.getElementById('count_filtre');
    console.log("Nombre de produits après filtre :", filteredProducts.length);
    count_filtre.innerHTML = filteredProducts.length ? `${filteredProducts.length} produits` : '0 produit';

}

function resetFilters() {
    document.getElementById('reload').addEventListener('click', function() {
        document.getElementById('search').value = '';
        document.getElementById('Prix').value = prix_max;
        document.getElementById('PriceValue').textContent = prix_max;
        document.getElementById('pro_filtre').value = '1';
        document.getElementById('category_filtre').value = 'All'; 
        combinerFiltres();
        
    });
}

function resetPrix() {
    document.getElementById('reloadPrix').addEventListener('click', function() {
        document.getElementById('Prix').value = prix_max;
        document.getElementById('PriceValue').textContent = prix_max;
        combinerFiltres();
    });
}
 
resetFilters();
resetPrix(); 

// panier
function panier() {
    const pan=document.getElementById('panier');
    const acc=document.getElementById('acceuil');
    pan.classList.add('selection');
    acc.classList.remove('selection');
    const container = document.getElementById('container');
    const pagination = document.getElementById('pagination');
    const statistique = document.getElementById('statistique');
    const PerPage = document.getElementById('perPage');
    pagination.innerHTML = '';
    container.innerHTML = ''; 
    statistique.innerHTML = '';
    PerPage.style.visibility = 'hidden';
    const header=document.createElement('div');
    header.className = 'header';
    const Title = document.createElement('h3');
    const icon =document.createElement('i');
    icon.className="bi bi-cart4";
    Title.className = 'mt-5';
    Title.classList.add('titrePanier');
    Title.appendChild(icon); 
    Title.appendChild(document.createTextNode(' Votre Panier'));
    header.appendChild(Title);
    const vider_panier = document.createElement('button');
    const vicon=document.createElement('i');
    vicon.className="bi bi-cart-x";

    vider_panier.className = 'btn btn-danger mb-3';
    vider_panier.classList.add("btn_vider");
    vider_panier.addEventListener('click', deletePanier);
    vider_panier.appendChild(vicon); 
    vider_panier.appendChild(document.createTextNode(' Vider le Panier'));
    header.appendChild(vider_panier);
    container.appendChild(header);
    
    console.log("Panier");
    let cart = get_cookie('panier');
    console.log("Contenu du panier :", cart);
    const keys = Object.keys(cart);
    if (!keys.length) {
  const originalClasses = container.className;
    container.innerHTML = '';
  container.className = 'empty-message-container'; 
  
  container.innerHTML = `
    <div class="empty-message-content">
      <div class="card text-center border-0 shadow">
        <div class="card-header bg-light py-3">
          <h4 class="m-0"><i class="bi bi-cart-x me-2"></i>Votre panier est vide !</h4>
        </div>
        <div class="card-body p-4">
          <div class="text-muted mb-3" style="font-size: 3rem">
            <i class="bi bi-emoji-frown"></i>
          </div>
          <h5 class="card-title mb-2">Aucun produit dans le panier</h5>
          <p class="card-text text-muted mb-4">Ajoutez des produits à votre panier pour les voir ici.</p>
          <button class="btn btn-primary px-4">
            <i class="bi bi-arrow-left me-2"></i>Continuer vos achats
          </button>
        </div>
      </div>
    </div>
  `;
  
  // Restauration des classes fonctionnelles nécessaires
  container.classList.add('d-flex', 'justify-content-center', 'align-items-center');
  container.querySelector('button').addEventListener('click', () => {
    container.className = originalClasses; 
    console.log(container.className)
    acceuil(); 
});
  return;
}



  // Construire l'affichage
  let total = 0;
  keys.forEach(k => {
   article(cart[k]);
    total += cart[k].prix * cart[k].quantite;
    console.log("qte", cart[k].quantite);
    console.log("prix", cart[k].prix);
  });
  const totalElement = document.createElement('div');
    totalElement.className = 'total text-center mt-4';
    totalElement.innerHTML = `<h4 class="fw-bold"> <i class="bi bi-cash-coin align-middle me-2"></i> Total : ${total.toFixed(2)}€</h4>`;
    container.appendChild(totalElement);




}


function add_panier(produit) {
  let cart = get_cookie('panier');
  if (cart[produit.id]) {
    cart[produit.id].quantite += 1;
  } else {
    cart[produit.id] = {
      id:       produit.id,
      nom:      produit.title,
      prix:     produit.price,
      image:    produit.images[0],
      description: produit.description,
      quantite: 1
    };
  }


  const json = encodeURIComponent(JSON.stringify(cart));
  const expires = new Date(Date.now() + 24 * 3600e3).toUTCString();
  document.cookie = `panier=${json}; expires=${expires}; path=/`;

  console.log(`Produit ajouté au panier : ${produit.title}`);

  f_alert("Produit ajouté au panier avec succès !","success");
  CartNotification();
}

function article(id) {

    const card = document.createElement('div');
    card.className = 'card mb-3 article';

    const row = document.createElement('div');
    row.className = 'row g-0';

    const col = document.createElement('div');
    col.className = 'col-md-4';

    const img = document.createElement('img');
    img.src = id.image;
    img.className = 'img-fluid rounded-start article-img';
    img.alt = id.nom;

    const col2 = document.createElement('div');
    col2.className = 'col-md-8 article-col';

    const cardBody = document.createElement('div');
    cardBody.className = 'card-body article-body';

    const title = document.createElement('h3');
    title.className = 'card-title article-title';
    title.textContent = id.nom;

    const description = document.createElement('p');
    description.className = 'card-text article-description';
    description.textContent = id.description;

    const price = document.createElement('p');
    price.className = 'card-text fw-bold';
    price.textContent = `${id.prix}€`;

    const quantityWrapper = document.createElement('div');
    quantityWrapper.className = 'mb-2';

    const quantityLabel = document.createElement('label');
    quantityLabel.textContent = 'Quantité : ';
    quantityLabel.setAttribute('for', `quantity-${id.id}`);

    const quantity = document.createElement('input');
    quantity.id = `quantity-${id.id}`;
    quantity.className = 'form-control form-control-sm w-auto d-inline-block ms-2 article-quantity';
    quantity.type = 'number';
    quantity.value = id.quantite;
    quantity.min = 1;
    quantity.addEventListener('change', function() {
        changerQuantite(id.id, this.value);
    });

    quantityWrapper.append(quantityLabel, quantity);

    const removeButton = document.createElement('button');
    removeButton.className = 'btn btn-danger';
    removeButton.textContent = 'Retirer du panier';
    removeButton.addEventListener('click', function() {
    removeFromCart(id);

    });

    const totalPrice = document.createElement('p');
    totalPrice.className = 'card-text fw-bold';
    totalPrice.textContent = `Total : ${(id.prix * id.quantite).toFixed(2)}€`;

    cardBody.append(title, description, price, quantityWrapper, totalPrice, removeButton);
    col.appendChild(img);
    col2.appendChild(cardBody);
    row.append(col, col2);
    card.appendChild(row);
    container.appendChild(card);
}


function get_cookie(name) {
    const cookie = document.cookie
    .split('; ')
    .find(row => row.startsWith(name + '='));
  let cart = cookie
    ? JSON.parse(decodeURIComponent(cookie.split('=')[1]))
    : {};
    return cart;
}

function removeFromCart(prd) {
    console.log(prd);
    Confirmation(`Voulez-vous retirer "${prd.nom}" du panier ?`, function () {
    let cart = get_cookie('panier');
    delete cart[prd.id];
    const json = encodeURIComponent(JSON.stringify(cart));
    const expires = new Date(Date.now() + 24 * 3600e3).toUTCString();
    document.cookie = `panier=${json}; expires=${expires}; path=/`;
    f_alert(`Produit retiré du panier : ${prd.nom}`,"warning");
    panier();
    CartNotification();
});
}

function changerQuantite(id, quantite) {
    let cart = get_cookie('panier');
    if (cart[id]) {
        cart[id].quantite = parseInt(quantite, 10);
        const json = encodeURIComponent(JSON.stringify(cart));
        const expires = new Date(Date.now() + 24 * 3600e3).toUTCString();
        document.cookie = `panier=${json}; expires=${expires}; path=/`;
    }
    f_alert(`Quantité mise à jour pour le produit : ${cart[id].nom}`,"info");
    panier();
    CartNotification();
}

function deletePanier() {
    Confirmation("Voulez-vous retirer vider le panier ?", function () {
    document.cookie = `panier=; path=/; max-age=0`;
    panier();
    CartNotification(); 
 }); 
}
function acceuil(){
    const acc=document.getElementById('acceuil');
    const pan=document.getElementById('panier');
    acc.classList.add('selection');
    pan.classList.remove('selection');
    const container = document.getElementById('container');
    const pagination = document.getElementById('pagination');
    const statistique = document.getElementById('statistique');
    const PerPage = document.getElementById('perPage');
    pagination.classList.remove('d-none');
    container.classList.remove('d-none');
    statistique.classList.remove('d-none');
    PerPage.style.visibility = 'visible';
    currentPage = 1;
    combinerFiltres();
    afficherPagination();
   

}

function CartNotification() {
    const cart = get_cookie('panier');
    const notif = document.getElementById('notif');
    
      let itemCount = 0;
    for (const key in cart) {
        if (cart.hasOwnProperty(key)) {
            itemCount += cart[key].quantite;
        }
    }
    
    
    if (itemCount > 0) {
        notif.textContent = itemCount;
        notif.classList.remove('d-none');
    } else {
        notif.classList.add('d-none');
    }
}

function f_alert(msg,type){
    console.log(msg);
    const toastEl = document.getElementById('cartToast');
    const toastBody = document.getElementById('toast-body');
    toastBody.textContent = msg;
    toastEl.className = `toast align-items-center text-bg-${type} border-0`;
    const toast = new bootstrap.Toast(toastEl);
    toast.show();
}

  function Confirmation(msg, callback) {
    document.getElementById('modalBody').textContent = msg ;

    const confirmBtn = document.getElementById('confirmAction');
    const newBtn = confirmBtn.cloneNode(true);
    confirmBtn.parentNode.replaceChild(newBtn, confirmBtn);

    newBtn.addEventListener('click', function () {
      callback(); 
      const modal = bootstrap.Modal.getInstance(document.getElementById('exampleModal'));
      modal.hide(); // ferme le modal
    });

    const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
    modal.show();
  }


  // mode nuit
  const themeEnreg = localStorage.getItem('theme') || 'dark';
  document.body.setAttribute('data-bs-theme', themeEnreg);
  console.log()

  const icon = document.getElementById('darkIcon');
  icon.classList.toggle('bi-sun-fill', themeEnreg=== 'dark');
  icon.classList.toggle('bi-moon-fill', themeEnreg !== 'dark');

  document.getElementById('darkModeToggle').addEventListener('click', () => {
    const themeChoisi = document.body.getAttribute('data-bs-theme');
    const themeNouveau = themeChoisi === 'dark' ? 'light' : 'dark';

    document.body.setAttribute('data-bs-theme', themeNouveau);
    localStorage.setItem('theme', themeNouveau);

    icon.classList.toggle('bi-sun-fill', themeNouveau === 'dark');
    icon.classList.toggle('bi-moon-fill', themeNouveau !== 'dark');
  });




</script>
    
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>