<?php

namespace App\Repository;

use App\Entity\CategorieService;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<CategorieService>
 *
 * @method CategorieService|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieService|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieService[]    findAll()
 * @method CategorieService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieService::class);
    }

    public function save(CategorieService $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CategorieService $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    // permet de récupérer le service mis à la une (et limite le resultat à 1)
    public function findHighlightService(): array
   {
       return $this->createQueryBuilder('c')
           ->andWhere('c.enAvant = 1')
           ->setMaxResults(1)
           ->getQuery()
           ->getResult()
       ;
   }



//    /**
//     * @return CategorieService[] Returns an array of CategorieService objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CategorieService
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
