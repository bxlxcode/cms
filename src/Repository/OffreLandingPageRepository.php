<?php

namespace App\Repository;

use App\Entity\OffreLandingPage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OffreLandingPage|null find($id, $lockMode = null, $lockVersion = null)
 * @method OffreLandingPage|null findOneBy(array $criteria, array $orderBy = null)
 * @method OffreLandingPage[]    findAll()
 * @method OffreLandingPage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffreLandingPageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OffreLandingPage::class);
    }

    // /**
    //  * @return OffreLandingPage[] Returns an array of OffreLandingPage objects
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
    public function findOneBySomeField($value): ?OffreLandingPage
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
