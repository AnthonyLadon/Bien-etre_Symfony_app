<?php

namespace App\Repository;

use App\Entity\CodePostal;
use App\Entity\Prestataire;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Prestataire>
 *
 * @method Prestataire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prestataire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prestataire[]    findAll()
 * @method Prestataire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrestataireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prestataire::class);
    }

    public function save(Prestataire $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Prestataire $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    //    /**
    //     * @return Prestataire[] Returns an array of Prestataire objects
    //     */


    // permet de selectionner les ID les plus grands (donc les dernières entrées 
    // et de limiter le resultat à 4)
    public function findLastPrestataires(): array
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult()
        ;
    }



    // Trouve les 4 derniers prestataires inscrits dans une même catégorie
    public function last4Prestataires($serviceId): ?array
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.proposer', 'categ')
            ->andWhere('categ = :val')
            ->setParameter('val', $serviceId)
            ->orderBy('p.nom')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
        ;
    }


    // Requete envoyée via la barre de recherche pour trouver un ou plusieurs prestataires 

       public function SearchBar($nomPrestataire, $categorieId, $localite, $codePostal, $commune): ?array
       {
           $query = $this->createQueryBuilder('p')
                // liaison prestataire-catégorie 'proposer' via les Id
                ->join('p.proposer', 'proposer')
                ->join('p.utilisateur', 'user')
                ->join('user.codePostal', 'codePostal')
                ->join('user.commune', 'commune')
                ;
                if($nomPrestataire){
                    $query->andWhere('p.nom LIKE :nom')
                    ->setParameter('nom', '%'.$nomPrestataire.'%');
                }
                if($categorieId){
                    $query->andWhere('proposer = :categorieId')
                    ->setParameter('categorieId', $categorieId);
                }
                if($localite){
                    $query->andWhere('user.localite = :loc')
                    ->setParameter('loc' , $localite);
                }
                if($commune){
                    $query->andWhere('commune.commune = :com')
                    ->setParameter('com', $commune);
                }
                if($codePostal){
                    $query->andWhere('codePostal.codePostal = :cp')
                    ->setParameter('cp', $codePostal);
                }
                $query->orderBy('p.nom', 'ASC');
                $query = $query->getQuery();
                return $query->getResult();
           ;
       }

    }