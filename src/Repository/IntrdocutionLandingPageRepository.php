<?php

namespace App\Repository;

use App\Entity\IntrdocutionLandingPage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method IntrdocutionLandingPage|null find($id, $lockMode = null, $lockVersion = null)
 * @method IntrdocutionLandingPage|null findOneBy(array $criteria, array $orderBy = null)
 * @method IntrdocutionLandingPage[]    findAll()
 * @method IntrdocutionLandingPage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IntrdocutionLandingPageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, IntrdocutionLandingPage::class);
    }

    // /**
    //  * @return IntrdocutionLandingPage[] Returns an array of IntrdocutionLandingPage objects
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
    public function findOneBySomeField($value): ?IntrdocutionLandingPage
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
