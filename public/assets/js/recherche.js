var champRecherche = document.getElementById('recherche');
var champRecherche2 = document.getElementById('recherche');

var listeSuggestions = document.getElementById('listeDestination');
var valeurRechercher = '';
var estVide = '';

champRecherche.addEventListener('input', function(){
    valeurRechercher = champRecherche.value.trim();

    if (valeurRechercher === '') {
        // Si le champ de recherche est vide effacer la liste des suggestions et affiche bateau par defaut
        listeSuggestions.innerHTML = '';
        afficheBateaux(filtre);
    } else {
        
        fetch('recherche/' + valeurRechercher + '/')
        .then(response => response.json())
        .then(suggestions => afficherSuggestions(suggestions))
        .catch(error => console.error('Erreur :', error));
    }
});

function chargerBateauxParRecherche(valeurRecherche) {
  console.log('Recherche en cours avec la valeur :', valeurRecherche);

  fetch('recherche/' + valeurRecherche + '/')
      .then(response => response.json())
      .then(valeurRecherche => afficheBateauxRechercher(valeurRecherche))
      .catch(error => console.error('Erreur :', error));
}



function afficherSuggestions(suggestions) {
    // Efface les suggestions précédentes
    listeSuggestions.innerHTML = '';
  
    if (!Array.isArray(suggestions)) {
      console.error('Réponse non valide :', suggestions);
      return;
    }
  
    // Crée un div pour les suggestions
    const suggestionsContainer = document.createElement('div');
    suggestionsContainer.classList.add('suggestions-container');

    if(suggestions.length == 0){
      const li = document.createElement('li');
      li.classList.add('suggestion');
      li.textContent = "Pas de ville trouvée. Lance une nouvelle recherche vers de nouveaux horizons.";

      suggestionsContainer.appendChild(li);

      // Pour éviter le décalage
    suggestionsContainer.style.boxSizing = 'border-box';

    listeSuggestions.innerHTML = '';
        document.getElementById('listeDestination').innerHTML = '';
  
    // Ajoute la div à la liste de suggestions
    listeSuggestions.appendChild(suggestionsContainer);

    } else {

    
  
    suggestions.forEach(suggestion => {
      
      const li = document.createElement('li');
      li.classList.add('suggestion');
      li.textContent = suggestion.ville + ", " + suggestion.pays;
      li.addEventListener('click', () => {
        // Affiche la suggestion choisis
        champRecherche.value = suggestion.ville + ", " + suggestion.pays;
        champRecherche2.value = suggestion.ville;

        // Effacer les suggestions
        listeSuggestions.innerHTML = '';
        document.getElementById('listeDestination').innerHTML = '';
        
        if(champRecherche2.value != ''){
        chargerBateauxParRecherche(champRecherche2.value);
          
        } else {
          chargerBateauxParRecherche(valeurRechercher);
        }
          
      });
  
      suggestionsContainer.appendChild(li);
    });
  
    // Pour éviter le décalage
    suggestionsContainer.style.boxSizing = 'border-box';
  
    // Ajoute la div à la liste de suggestions
    listeSuggestions.appendChild(suggestionsContainer);

  }
}

document.addEventListener('click', (e) => {
  if (e.target !== champRecherche && e.target !== listeSuggestions) {
    listeSuggestions.innerHTML = '';
  }
});

// Ecouteur d'événements pour la touche Entrée
champRecherche.addEventListener('keydown', (e) => {
  if (e.key === 'Enter') {
      valeurRechercher = champRecherche.value.trim();
      listeSuggestions.innerHTML = '';

      
      chargerBateauxParRecherche(valeurRechercher);

  }
});