<?php

namespace App\Repository;

use App\Entity\OffreLandingPageTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OffreLandingPageTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method OffreLandingPageTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method OffreLandingPageTranslation[]    findAll()
 * @method OffreLandingPageTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffreLandingPageTranslationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OffreLandingPageTranslation::class);
    }

    // /**
    //  * @return OffreLandingPageTranslation[] Returns an array of OffreLandingPageTranslation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OffreLandingPageTranslation
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
