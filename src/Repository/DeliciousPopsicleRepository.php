<?php

namespace App\Repository;

use App\Entity\DeliciousPopsicle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DeliciousPopsicle>
 *
 * @method DeliciousPopsicle|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeliciousPopsicle|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeliciousPopsicle[]    findAll()
 * @method DeliciousPopsicle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeliciousPopsicleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DeliciousPopsicle::class);
    }

    public function save(DeliciousPopsicle $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DeliciousPopsicle $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return DeliciousPopsicle[] Returns an array of DeliciousPopsicle objects
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

//    public function findOneBySomeField($value): ?DeliciousPopsicle
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
