<?php

namespace App\Repository;

use App\Entity\LandignPage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LandignPage|null find($id, $lockMode = null, $lockVersion = null)
 * @method LandignPage|null findOneBy(array $criteria, array $orderBy = null)
 * @method LandignPage[]    findAll()
 * @method LandignPage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LandignPageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LandignPage::class);
    }

    // /**
    //  * @return LandignPage[] Returns an array of LandignPage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LandignPage
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
