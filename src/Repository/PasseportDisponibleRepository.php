<?php

namespace App\Repository;

use App\Entity\PasseportDisponible;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PasseportDisponible>
 *
 * @method PasseportDisponible|null find($id, $lockMode = null, $lockVersion = null)
 * @method PasseportDisponible|null findOneBy(array $criteria, array $orderBy = null)
 * @method PasseportDisponible[]    findAll()
 * @method PasseportDisponible[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PasseportDisponibleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PasseportDisponible::class);
    }

    public function save(PasseportDisponible $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PasseportDisponible $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PasseportDisponible[] Returns an array of PasseportDisponible objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PasseportDisponible
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
