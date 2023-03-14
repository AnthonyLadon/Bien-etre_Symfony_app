<?php

namespace App\Repository;

use App\Entity\CodePostal;
use App\Entity\Images;
use App\Entity\Prestataire;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManager;
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
    public function lastRegisteredPrestataires(): array
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult()
        ;
    }


    // Trouve les 4 derniers prestataires inscrits dans une même catégorie
    public function lastPrestatairesCategory($serviceId): ?array
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.proposer', 'categ')
            ->andWhere('categ = :val')
            ->setParameter('val', $serviceId)
            ->orderBy('p.id', 'DESC')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
        ;
    }

    // Requete envoyée via la barre de recherche pour trouver un ou plusieurs prestataires 

       public function SearchBar($nom, $categorie, $localite, $codePostal, $commune): ?array
       {
           $query = $this->createQueryBuilder('p')
                //liaison des tables 
                ->leftjoin('p.proposer', 'proposer')
                ->leftjoin('p.utilisateur', 'user')
                ->leftjoin('user.codePostal', 'codePostal')
                ->leftjoin('user.commune', 'commune')
                ->leftjoin('user.localite', 'localite')
                ;
                // test si la varibale $nom n'est pas null, sinon on n'execute pas la requete WHERE
                if($nom){
                    $query->andWhere('p.nom LIKE :nom')
                    ->setParameter('nom', '%'.$nom.'%');
                }
                if($categorie){
                    $query->andWhere('proposer.nom LIKE :CategorieService')
                    ->setParameter('CategorieService', '%'.$categorie.'%');
                }
                if($localite){
                    $query->andWhere('localite.localite LIKE :loc')
                    ->setParameter('loc' , '%'.$localite.'%');
                }
                if($commune){
                    $query->andWhere('commune.commune LIKE :com')
                    ->setParameter('com', '%'.$commune.'%');
                }
                if($codePostal){
                    $query->andWhere('codePostal.codePostal = :cp')
                    ->setParameter('cp', $codePostal);
                }
                $query->groupBy('p');
                $query->orderBy('p.nom');
                $query = $query->getQuery();
                return $query->getResult();
           ;
       }
    }