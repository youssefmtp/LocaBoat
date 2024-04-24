<?php

namespace App\Repository;

use App\Entity\TypeBateau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeBateau>
 *
 * @method TypeBateau|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeBateau|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeBateau[]    findAll()
 * @method TypeBateau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeBateauRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeBateau::class);
    }


    /**
    * @return array[] Retourne le type bateau en fonction du libelle passer en paramètre
    */
    public function findIdByLibelle($value): array 
    {
 
         return $this->createQueryBuilder('tb')
             ->andWhere('tb.libelle = :value')
             ->setParameter('value', $value)
             ->getQuery()
             ->getResult()
         ;
    }

//    /**
//     * @return TypeBateau[] Returns an array of TypeBateau objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TypeBateau
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
