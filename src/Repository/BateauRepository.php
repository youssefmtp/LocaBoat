<?php

namespace App\Repository;

use App\Entity\Bateau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bateau>
 *
 * @method Bateau|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bateau|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bateau[]    findAll()
 * @method Bateau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BateauRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bateau::class);
    }

//    /**
//     * @return Bateau[] Returns an array of Bateau objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }


    /**
    * @return array[] Retourne un tableau contenant les villes rechercher
    */
   public function findVille($value): array 
   {

        return $this->createQueryBuilder('b')
            ->andWhere($this->createQueryBuilder('b')->expr()->like('b.ville', ':value'))
            ->setParameter('value', $value . '%')
            ->setMaxResults(5) 
            ->getQuery()
            ->getResult()
        ;
   }

   /**
    * @return array[] Retourne un tableau contenant les bateaux en fonction du libelle
    */
    public function findBateauById($value): array 
    {
 
         return $this->createQueryBuilder('b')
             ->andWhere('b.idTypeBateau = :value')
             ->setParameter('value', $value . '%')
             ->getQuery()
             ->getResult()
         ;
    }

    /**
    * @return array[] Retourne un tableau contenant les bateaux en fonction de la catégorie
    */
    public function findBateauByCategorie($value): array 
    {
 
         return $this->createQueryBuilder('b')
             ->andWhere('b.categorie = :value')
             ->setParameter('value', $value)
             ->getQuery()
             ->getResult()
         ;
    }

}
