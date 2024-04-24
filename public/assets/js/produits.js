var filtre = 'Tous';
var filtreCateg = '';

$(document).ready(function() {
    $(".dropdown").on("click", ".dropdown-item", function() {
        
        var filtre = $(this).data("value");
        
        afficheBateaux(filtre);
    });
});

function afficheBateaux(filtre){
    var filtre = encodeURIComponent(filtre);
    fetch('produits/' + filtre + '/', {
        method: 'GET'
    })
    .then(response => {
        if (!response.ok) {
            console.log('Code d\'état HTTP : ' + response.status);
            throw new Error('Erreur à l\'envoi de la requête');
        }
        return response.json();
    })
    .then(data => { 

    var container = document.querySelector('.divProd');

    while(container.firstChild){
        container.removeChild(container.firstChild); // Vide le contenu 
    }

    var bateaux = data;

    if(bateaux.length > 0){
        var row = document.createElement('div');
        row.className = 'row justify-content-center';
        container.appendChild(row);

        bateaux.forEach(unB => {

            var produitLien = document.createElement('a');
            produitLien.href = `/location/detail/${unB.id}`; 
            produitLien.className = 'card col-3 divLinkProd';

            produitLien.innerHTML = ` <img class="card-img-top" src="${unB.img}" alt="Image Bateau">
            <div class="card-body">
                <h5 class="card-title"> ${ unB.nom }</h5>
                <p class="card-text lblProd"><i class="fas fa-light fa-location-dot iconProd"></i> ${unB.ville + ', ' +  unB.pays } </p>
                <p class="card-text lblPrix">À partir de <span class="pPrix">${unB.prixJour } € </span> </p>
            </div> `;
            
            row.appendChild(produitLien);

            
        });
    } else {
            console.error('La requête ne comporte aucun élément à afficher.');
        }
    })
    .catch(error => {
        console.error('Erreur :', error);
    });
}

function afficheBateauxRechercher(valeurRecherche){

    var container = document.querySelector('.divProd');

    while(container.firstChild){
        container.removeChild(container.firstChild); // Vide le contenu 
    }


    if(valeurRecherche.length > 0){
        var row = document.createElement('div');
        row.className = 'row justify-content-center';
        container.appendChild(row);

        valeurRecherche.forEach(unB => {

            var produitLien = document.createElement('a');
            produitLien.href = `/location/detail/${unB.id}`; 
            produitLien.className = 'card col-3 divLinkProd';

            produitLien.innerHTML = ` <img class="card-img-top" src="${unB.img}" alt="Image Bateau">
            <div class="card-body">
                <h5 class="card-title"> ${ unB.nom }</h5>
                <p class="card-text lblProd"><i class="fas fa-light fa-location-dot iconProd"></i> ${unB.ville + ', ' +  unB.pays } </p>
                <p class="card-text lblPrix">À partir de <span class="pPrix">${unB.prixJour } € </span> </p>
            </div> `;
            
            row.appendChild(produitLien);

            
        });
    } else {
            console.error('La requête ne comporte aucun élément à afficher.');
    }
}



function afficheBateauxByCateg(filtreCateg){
    var filtreCategNettoyer = encodeURIComponent(filtreCateg);
    fetch('produitsByCateg/' + filtreCategNettoyer + '/', {
        method: 'GET'
    })
    .then(response => {
        if (!response.ok) {
            console.log('Code d\'état HTTP : ' + response.status);
            throw new Error('Erreur à l\'envoi de la requête');
        }
        return response.json();
    })
    .then(data => { 

    var container = document.querySelector('.divProd');

    while(container.firstChild){
        container.removeChild(container.firstChild); // Vide le contenu 
    }

    var bateaux = data;

    if(bateaux.length > 0){
        var row = document.createElement('div');
        row.className = 'row justify-content-center';
        container.appendChild(row);

        bateaux.forEach(unB => {

            var produitLien = document.createElement('a');
            produitLien.href = `/location/detail/${unB.id}`; 
            produitLien.className = 'card col-3 divLinkProd';

            produitLien.innerHTML = ` <img class="card-img-top" src="${unB.img}" alt="Image Bateau">
            <div class="card-body">
                <h5 class="card-title"> ${ unB.nom }</h5>
                <p class="card-text lblProd"><i class="fas fa-light fa-location-dot iconProd"></i> ${unB.ville + ', ' +  unB.pays } </p>
                <p class="card-text lblPrix">À partir de <span class="pPrix">${unB.prixJour } € </span> </p>
            </div> `;
            
            row.appendChild(produitLien);

            
        });
    } else {
            console.error('La requête ne comporte aucun élément à afficher.');
        }
    })
    .catch(error => {
        console.error('Erreur :', error);
    });
}


afficheBateaux(filtre);
