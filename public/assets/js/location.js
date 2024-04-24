function reserverLocation(user, bateau){

    $.ajax({
        type: 'POST',
        url: '/reserver',
        data: {
            userId: user,
            bateauId: bateau,
            dateDebut: dateDebut,
            dateFin: dateFin
        },
        success: function (response) {
            console.log('Réservation réussie');
            window.location.href = '/moncompte/' + user;
        },
        error: function (error) {
            console.error('Erreur de réservation', error);
        }
    });

}