$(document).ready(function () {

var dateDebut = null;
var dateFin = null;




    var joursSelectionnes = [];
    var nbJours = 0;
    
    // Fonction pour basculer la couleur de fond au clic
    function basculerCouleurFond(element, classe) {
        element.removeClass('jour-selectionne jour-intermediaire');
        element.addClass(classe);
    }

    // Fonction pour mettre à jour le montant total
    function mettreAJourMontantTotal() {
        var prixParJour = parseFloat($('.afficherPrixDetail').data('prix')) || 0;
        var montantTotal = prixParJour * nbJours;
        if(nbJours == 0){
            montantTotal = prixParJour;
        }
        $('.afficherPrixDetail').text('Total : ' + montantTotal + ' €');
    }

    function mettreAJourDate() {

        if (dateFin < dateDebut) {
            // Inverser les valeurs de dateDebut et dateFin
            var tempDate = dateDebut;
            dateDebut = dateFin;
            dateFin = tempDate;
        }
        
        if (dateDebut !== null && dateFin !== null) {
            var datesText = dateDebut + " - " + dateFin;
            $('#dateLoc').val(datesText);
        }
    }

    function mettreAZeroDate() {
        
        if (nbJours == 0 ) {
            $('#dateLoc').val('');
            dateDebut = null;
            dateFin = null;
        }
    }

    
    
    
    function bateauDisponible(dateDebutLoc, dateFinLoc){
        fetch('bateauDisponible/' + dateDebutLoc + '/' + dateFinLoc + '/', {
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


    $('.btnEnregistrer').on('click', function () {
        bateauDisponible(dateDebut, dateFin);
        $('#afficherModal').modal('hide');
    });

    $('.btnReinitialiser').on('click', function () {
        var selectionnerJours = document.querySelectorAll('.lblJour');
        nbJours = 0;
    
        // Parcourez chaque élément de jour 
        selectionnerJours.forEach(function (unJour) {
            unJour.classList.remove('jour-selectionne'); // Supprimez le css
            unJour.classList.remove('jour-intermediaire'); // Supprimez le css
        });

    
        joursSelectionnes = [];
        mettreAZeroDate();
        afficheBateaux(filtre);
    });

 
    $('.lblJour').on('click', function () {
        var jourClique = $(this);

        

        // Trouver l'index du jour cliqué
        var indexJourClique = $('.lblJour').index(jourClique);

        // Ajoute le jour cliqué si il n'est pas dans le tableau 
        if (!joursSelectionnes.includes(indexJourClique)) {
            // Ajouter l'index 
            joursSelectionnes.push(indexJourClique);
            basculerCouleurFond(jourClique, 'jour-selectionne');

            // Met à jour le background pour les jours intermédiaires
            var indiceDebut = joursSelectionnes.length > 0 ? joursSelectionnes[0] : -1;
            var indiceFin = joursSelectionnes.length > 0 ? joursSelectionnes[joursSelectionnes.length - 1] : -1;
            

            for (var i = indiceDebut + 1; i < indiceFin; i++) {
                // Test si l'index i n'est pas dans le tableau joursSelectionnes
                if (!joursSelectionnes.includes(i)) {
                    // Ajoute l'index i
                    joursSelectionnes.push(i);
                }
            
                // Applique la classe jour-intermediaire
                basculerCouleurFond($('.lblJour').eq(i), 'jour-intermediaire');
            }


            // Récupére la date de début 
            if (indiceDebut !== -1 && dateFin === null) {
                dateDebut = jourDate = $(this).data('jour');
            }

            // Récupére la date de fin 
            if (indiceFin !== -1 && dateDebut !== null) {
                dateFin = jourDate = $(this).data('jour');
            }

            






            

        } else {
            // Supprime le jour si déjà selectionner
            joursSelectionnes.splice(joursSelectionnes.indexOf(indexJourClique), 1);
            basculerCouleurFond(jourClique, '');

            // Enleve le css des jours intermediares
            for (var i = 0; i < joursSelectionnes.length ; i++) {
                var indexIntermediaire = joursSelectionnes[i];
                basculerCouleurFond($('.lblJour').eq(indexIntermediaire), '');
            }

            // Supprimer les jours intermediares
            joursSelectionnes.splice(0, joursSelectionnes.length );

            joursSelectionnes = [];
        }

        // Met à jour le nombre de jours
        nbJours = joursSelectionnes.length;

        
        mettreAJourMontantTotal();

       
        mettreAJourDate();

       
        mettreAZeroDate();

        
    });
});



