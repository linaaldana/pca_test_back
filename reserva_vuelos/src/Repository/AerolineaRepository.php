<?php

namespace App\Repository;

use App\Entity\Aerolinea;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Aerolinea>
 *
 * @method Aerolinea|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aerolinea|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aerolinea[]    findAll()
 * @method Aerolinea[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AerolineaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aerolinea::class);
    }

    //    /**
    //     * @return Aerolinea[] Returns an array of Aerolinea objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Aerolinea
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
