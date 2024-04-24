$(document).on('click', function (e) {
    if ($(e.target).hasClass('modal')) {
        $('#afficherModal').modal('hide');
    }
});


$(document).ready(function () {
    $("#prixDropdown .dropdown-menu").on("click", function (e) {
        e.stopPropagation(); 
    });
});

const barre = document.getElementById('barre');
const progressionBarre = document.getElementById('progressionBarre');
const curseurDebut = document.getElementById('curseurDebut');
const curseurFin = document.getElementById('curseurFin');
const blocGauche = document.getElementById('blocGauche');
const blocDroite = document.getElementById('blocDroite');
const lblMinP = document.querySelector('.lblMinP');
const lblMaxP = document.querySelector('.lblMaxP')
const coef = 10;

let curseurDMouv = false; 
let curseurFMouv = false;
let valeurMin = 0;
let valeurMax = 1000;

function mettreAJourValeurs() {
    const positionDebut = parseFloat(curseurDebut.style.left) / 97;
    const positionFin = parseFloat(curseurFin.style.left) / 97;

    valeurMin = Math.floor(positionDebut * 1000 / coef) * coef;
    valeurMax = Math.floor(positionFin * 1000 / coef) * coef;

    // Afficher les valeurs mises à jour
    if(isNaN(valeurMin)){
        lblMinP.textContent = `0 €`;
    } else {
        lblMinP.textContent = `${valeurMin}€`;
    }

    if(isNaN(valeurMax)){
        lblMaxP.textContent = `1000 €`;
    } else {
        lblMaxP.textContent = `${valeurMax}€`;
    }
    
}

curseurDebut.addEventListener('mousedown', (e) => {
    curseurDMouv = true;
    e.preventDefault();
});

curseurFin.addEventListener('mousedown', (e) => {
    curseurFMouv = true;
    e.preventDefault();
});

document.addEventListener('mouseup', () => {
    curseurDMouv = false;
    curseurFMouv = false;
});

document.addEventListener('mousemove', (e) => {
    if (curseurDMouv || curseurFMouv) {
        const barreRect = barre.getBoundingClientRect();
        const position = (e.clientX - barreRect.left) / barreRect.width;

        const newPosition = Math.min(1, Math.max(0, position));

        if (curseurDMouv) {
            var positionFin = parseFloat(curseurFin.style.left) / 97;            
            
            if (newPosition <= positionFin || isNaN(positionFin)) {
                curseurDebut.style.left = `${newPosition * 97}%`;
                blocGauche.style.width = curseurDebut.style.left;
            }
        }

        if (curseurFMouv) {
            var positionDebut = parseFloat(curseurDebut.style.left) / 97;

            if(newPosition >= positionDebut || isNaN(positionDebut)){
                curseurFin.style.left = `${newPosition * 97}%`;
                blocDroite.style.width = `${100 - parseFloat(curseurFin.style.left)}%`;
            }
            

        }

        mettreAJourValeurs();
    }
});


