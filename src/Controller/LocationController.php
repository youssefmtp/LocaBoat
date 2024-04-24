<?php

namespace App\Controller;

use App\Date\Mois;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BateauRepository;
use App\Repository\LocationRepository;
use App\Repository\TypeBateauRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Bateau;
use App\Entity\TypeBateau;
use App\Entity\Location;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;

class LocationController extends AbstractController
{

    private $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    #[Route('/location', name: 'app_location')]
    public function location(): Response
    {
        try{
            $mois = new Mois($_GET['mois'] ?? null, $_GET['annee'] ?? null);
        } catch (\Exception $e){
            $mois = new Mois();
        }
        $nbSemaines = $mois->getNbSemaines();
        $premierJour = $mois->getDebutMois();
        $premierJourSuivant = $mois->getDebutMoisSuivant();
        $jourSemaine = (int) $premierJourSuivant->format('N');
        $ajustementJours = 7 - $jourSemaine + 1;
        $premierJourSuivant = $premierJourSuivant->modify("+$ajustementJours days");
        $moisAnnee = $mois->ToString();
        $moisAnneeSuivant = $mois->getMoisSuivant();
        $joursSem = $mois->getJours();

        
        
        

        return $this->render('location/index.html.twig', [
            'moisAnnee' => $moisAnnee,
            'moisAnneeSuivant' => $moisAnneeSuivant,
            'nbSemaines' => $nbSemaines,
            'joursSem' => $joursSem,
            'premierJour' => $premierJour->format('d-m-Y'),
            'premierJourSuivant' => $premierJourSuivant->format('d-m-Y'),
            
        ]);
    }

    #[Route('/location/detail/{id}', name: 'app_location_detail')]
    public function detail(LocationRepository $locationRepository, $id): Response
    {
        try{
            $mois = new Mois($_GET['mois'] ?? null, $_GET['annee'] ?? null);
        } catch (\Exception $e){
            $mois = new Mois();
        }
        $nbSemaines = $mois->getNbSemaines();
        $premierJour = $mois->getDebutMois();
        $premierJourSuivant = $mois->getDebutMoisSuivant();
        $jourSemaine = (int) $premierJourSuivant->format('N');
        $ajustementJours = 7 - $jourSemaine + 1;
        $premierJourSuivant = $premierJourSuivant->modify("+$ajustementJours days");
        $moisAnnee = $mois->ToString();
        $moisAnneeSuivant = $mois->getMoisSuivant();
        $joursSem = $mois->getJours();

        $entityManager = $this->managerRegistry->getManager();
        $repo = $entityManager->getRepository(Bateau::class);
        $unBateau = $repo->find($id);

        $libelleTypeBateau = $unBateau->getIdTypeBateau()->getLibelle();

        $lesLocations = $locationRepository->findAll();
        $lesJoursLouer = $locationRepository->getLesJoursLouer($lesLocations, $unBateau);




        return $this->render('location/detailproduit.html.twig', [
            'moisAnnee' => $moisAnnee,
            'moisAnneeSuivant' => $moisAnneeSuivant,
            'nbSemaines' => $nbSemaines,
            'joursSem' => $joursSem,
            'premierJour' => $premierJour->format('d-m-Y'),
            'premierJourSuivant' => $premierJourSuivant->format('d-m-Y'),
            'unBateau' => $unBateau,
            'libelleTypeBateau' => $libelleTypeBateau,
            'lesLocations' => $lesJoursLouer,
        ]);
    }


    #[Route('/reserver', name: 'reserver', methods: ['POST'])]
    public function reserver(ManagerRegistry $managerRegistry, Request $request): Response 
    {
        $userId = $request->get('userId');
        $bateauId = $request->get('bateauId');
        $dateDebut = $request->get('dateDebut');
        $dateFin = $request->get('dateFin');


        $entityManager = $this->managerRegistry->getManager();
        $repo = $entityManager->getRepository(User::class);
        $user = $repo->find($userId);

        $entityManager = $this->managerRegistry->getManager();
        $repoB = $entityManager->getRepository(Bateau::class);
        $bateau = $repoB->find($bateauId);

        

        $location = new Location();
        $location->setIdBateau($bateau);
        $location->setIdUser($user);
        $location->setDebutLocation(new \DateTime($dateDebut));
        $location->setFinLocation(new \DateTime($dateFin));

        

        

        $entityManager = $this->managerRegistry->getManager();
        $entityManager->persist($location);
        $entityManager->flush();


        return $this->json(['success' => true]);
    }

    #[Route('/produits/{filtre}', name: 'produits', methods: ['GET'])]
    public function produits(BateauRepository $bateauRepository, TypeBateauRepository $typeBateauRepository, $filtre): Response 
    {
        

        if($filtre === 'Tous'){
            // récupère les bateaux
            $lesBateaux = $bateauRepository->findAll();
        } else {
            $idType = $typeBateauRepository->findIdByLibelle($filtre);
            $id = $idType[0]->getId();
            $lesBateaux = $bateauRepository->findBateauById($id);
            
        }
       
        return $this->json($lesBateaux);
    }

    #[Route('/produitsByCateg/{filtre}', name: 'produitsByCateg', methods: ['GET'])]
    public function produitsByCateg(BateauRepository $bateauRepository, $filtre): Response 
    {
        
        $lesBateaux = $bateauRepository->findBateauByCategorie($filtre);
            
       
        return $this->json($lesBateaux);
    }
    
    #[Route('/recherche/{valeurRechercher}', name: 'recherche', methods: ['GET'])]
    public function recherche(BateauRepository $bateauRepository, $valeurRechercher): Response 
    {
        $suggestions = $bateauRepository->findVille($valeurRechercher);
  
        return $this->json($suggestions);
    }

    #[Route('/bateauDisponible/{dateDebutLoc}/{dateFinLoc}', name: 'bateauDisponible')]
    public function bateauDisponible(BateauRepository $bateauRepository, LocationRepository $locationRepository, $dateDebutLoc, $dateFinLoc): Response 
    {
        $lesBateaux = $bateauRepository->findAll();
        $lesLocations = $locationRepository->findAll();
        $bateauDispo = $locationRepository->findBateauDispo($lesBateaux, $dateDebutLoc, $dateFinLoc, $lesLocations);
        

  
        return $this->json($bateauDispo);
    }


    
}
