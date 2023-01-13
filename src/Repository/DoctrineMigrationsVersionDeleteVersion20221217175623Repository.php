<?php

namespace App\Repository;

use App\Entity\DoctrineMigrationsVersionDeleteVersion20221217175623;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DoctrineMigrationsVersionDeleteVersion20221217175623>
 *
 * @method DoctrineMigrationsVersionDeleteVersion20221217175623|null find($id, $lockMode = null, $lockVersion = null)
 * @method DoctrineMigrationsVersionDeleteVersion20221217175623|null findOneBy(array $criteria, array $orderBy = null)
 * @method DoctrineMigrationsVersionDeleteVersion20221217175623[]    findAll()
 * @method DoctrineMigrationsVersionDeleteVersion20221217175623[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DoctrineMigrationsVersionDeleteVersion20221217175623Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DoctrineMigrationsVersionDeleteVersion20221217175623::class);
    }

    public function save(DoctrineMigrationsVersionDeleteVersion20221217175623 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DoctrineMigrationsVersionDeleteVersion20221217175623 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return DoctrineMigrationsVersionDeleteVersion20221217175623[] Returns an array of DoctrineMigrationsVersionDeleteVersion20221217175623 objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DoctrineMigrationsVersionDeleteVersion20221217175623
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
