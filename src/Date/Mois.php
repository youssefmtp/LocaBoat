<?php
/**
 * /Date/Mois.php
 * Définition de la class Mois
 *
 * @author Y.Ennour
 * @date 12/2023
 */

namespace App\Date;

class Mois {

    private int $mois, $annee;
    private array $lesMois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 
    'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    private array $jours = ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'];

    public function __construct(?int $unMois = null, ?int $uneAnnee = null){

        if($unMois === null){
            $unMois = intval(date('m'));
        }

        if($uneAnnee === null){
            $uneAnnee = intval(date('Y'));
        }

        if($unMois < 1 || $unMois > 12){
            // \Exception pour remonter à la racine cela est du au namespace
            throw new \Exception("Le mois saisie n'est pas valide.");
        }

        $this->mois = $unMois;
        $this->annee = $uneAnnee;
    }


    /**
     * Retourne le mois et l'année 
     */
    public function ToString() : string{
        return $this->lesMois[$this->mois - 1] . ' - ' . $this->annee;
    }

    /**
     * Retourne le mois et l'année suivant
     */
    public function getMoisSuivant(): string {
        // Créer une instance de DateTime pour le premier jour du mois suivant
        $dateSuivante = new \DateTime("{$this->annee}-{$this->mois}-01");
        $dateSuivante->modify('first day of next month');
    
        // Extraire le mois et l'année
        $moisSuivant = (int)$dateSuivante->format('m');
        $anneeSuivante = (int)$dateSuivante->format('Y');
    
        return $this->lesMois[$moisSuivant - 1] . ' - ' . $anneeSuivante;

    }

    /**
     * Retourne le nombre de semaines dans le mois
     */
    public function getNbSemaines() : int{

        $debutMois = $this->getDebutMois();
        $finMois = (clone $debutMois)->modify('last day of this month');

        $debutSemaine = intval($debutMois->format('W'));
        $finSemaine = intval($finMois->format('W'));

        // Calculer le nombre de semaines
        $nbSemaines = $finSemaine - $debutSemaine;

        if ($nbSemaines < 0) {
            $nbSemaines = $finSemaine;
        }

        return $nbSemaines;
    }

    /**
     * Retourne le premier jour du mois
     */
    public function getDebutMois() :\DateTime{
        return new \DateTime("{$this->annee}-{$this->mois}-01");
    }

    /**
     * Retourne les jours de la semaines
     */
    public function getJours() :array{
        return $this->jours;
    }

    public function getDebutMoisSuivant(): \DateTime
    {
    $moisSuivant = ($this->mois % 12) + 1;
    $anneeSuivante = $this->annee + floor(($this->mois + 1) / 12);

    return new \DateTime("{$anneeSuivante}-{$moisSuivant}-01");
    }   



}



?>