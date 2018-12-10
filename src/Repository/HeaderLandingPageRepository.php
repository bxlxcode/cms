<?php

namespace App\Repository;

use App\Entity\HeaderLandingPage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HeaderLandingPage|null find($id, $lockMode = null, $lockVersion = null)
 * @method HeaderLandingPage|null findOneBy(array $criteria, array $orderBy = null)
 * @method HeaderLandingPage[]    findAll()
 * @method HeaderLandingPage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeaderLandingPageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HeaderLandingPage::class);
    }

    // /**
    //  * @return HeaderLandingPage[] Returns an array of HeaderLandingPage objects
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
    public function findOneBySomeField($value): ?HeaderLandingPage
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
