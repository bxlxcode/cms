<?php

namespace App\Repository;

use App\Entity\HeaderLandingPageTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HeaderLandingPageTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method HeaderLandingPageTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method HeaderLandingPageTranslation[]    findAll()
 * @method HeaderLandingPageTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeaderLandingPageTranslationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HeaderLandingPageTranslation::class);
    }

    // /**
    //  * @return HeaderLandingPageTranslation[] Returns an array of HeaderLandingPageTranslation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HeaderLandingPageTranslation
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
