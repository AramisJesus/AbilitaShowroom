<?php

namespace App\Repository;

use App\Entity\Estofados;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Estofados>
 *
 * @method Estofados|null find($id, $lockMode = null, $lockVersion = null)
 * @method Estofados|null findOneBy(array $criteria, array $orderBy = null)
 * @method Estofados[]    findAll()
 * @method Estofados[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstofadosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Estofados::class);
    }

//    /**
//     * @return Estofados[] Returns an array of Estofados objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Estofados
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
