<?php

namespace App\Repository;

use App\Entity\IntrdocutionLandingPageTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method IntrdocutionLandingPageTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method IntrdocutionLandingPageTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method IntrdocutionLandingPageTranslation[]    findAll()
 * @method IntrdocutionLandingPageTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IntrdocutionLandingPageTranslationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, IntrdocutionLandingPageTranslation::class);
    }

    // /**
    //  * @return IntrdocutionLandingPageTranslation[] Returns an array of IntrdocutionLandingPageTranslation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IntrdocutionLandingPageTranslation
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
