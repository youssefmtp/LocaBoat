<?php

namespace App\Repository;

use App\Entity\Location;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @extends ServiceEntityRepository<Location>
 *
 * @method Location|null find($id, $lockMode = null, $lockVersion = null)
 * @method Location|null findOneBy(array $criteria, array $orderBy = null)
 * @method Location[]    findAll()
 * @method Location[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Location::class);
    }

    public function getLesJoursLouer($lesLocations, $unBateau){
        $lesJoursLouer = [];
        foreach($lesLocations as $location){
            if($unBateau->getId() == $location->getIdBateau()->getId()){
                $lesJoursLouer[] = [
                    'debutLoc' => $location->getDebutLocation(),
                    'finLoc' => $location->getFinLocation(),
                ];

            }
        }

        return $lesJoursLouer;
    }

    public function findBateauDispo($lesBateaux, $dateDebutLoc, $dateFinLoc, $lesLocations){
        $lesBateauxDispo = [];


        foreach ($lesBateaux as $unBateau) {

            $lesJoursLouer = $this->getLesJoursLouer($lesLocations, $unBateau);
    
            $estDisponible = true;
            
    
            foreach ($lesJoursLouer as $unB) {

                $dateDebut = new \DateTime($dateDebutLoc);
                $datefin = new \DateTime($dateFinLoc);


    
                // Comparer avec les dates
                if ($unB['debutLoc'] >= $dateDebut && $unB['finLoc'] <= $datefin) {
                    $estDisponible = false;
                    
                }


            }


    
            if ($estDisponible) {
                $lesBateauxDispo[] = $unBateau;
            }
        }


        
        return $lesBateauxDispo;
    }


//    /**
//     * @return Location[] Returns an array of Location objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Location
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}


