var dateDebut = null;
var dateFin = null;


$(document).ready(function () {
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

    $('.lblJour2').on('click', function () {
        var jourClique = $(this);

        

        // Trouve l'index du jour cliqué
        var indexJourClique = $('.lblJour2').index(jourClique);

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
                basculerCouleurFond($('.lblJour2').eq(i), 'jour-intermediaire');
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
                basculerCouleurFond($('.lblJour2').eq(indexIntermediaire), '');
            }

            // Supprimer les jours intermediares
            joursSelectionnes.splice(0, joursSelectionnes.length );
        }

        // Met à jour le nombre de jours
        nbJours = joursSelectionnes.length;

        
        mettreAJourMontantTotal();

       
        mettreAJourDate();

       
        mettreAZeroDate();

        

    });
});


var debutLoc, finLoc;
var lesJoursLouerJSON = document.querySelector('.lblJour2').dataset.lesjourlouer;
var lesJoursLouerArray = JSON.parse(lesJoursLouerJSON);
var elements = document.querySelectorAll('.lblJour2');


elements.forEach(function(element) {


    lesJoursLouerArray.forEach(unJ => {
        



        debutLoc = unJ['debutLoc'].date.split(" ")[0];
        finLoc = unJ['finLoc'].date.split(" ")[0];

        var currentDay = element.dataset.jourcomparaison;

        if (currentDay >= debutLoc && currentDay <= finLoc) {    
            element.classList.add('jourLouer');
        }
        
    });



    
});