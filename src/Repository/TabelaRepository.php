<?php

namespace App\Repository;

use App\Entity\Tabela;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tabela>
 *
 * @method Tabela|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tabela|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tabela[]    findAll()
 * @method Tabela[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TabelaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tabela::class);
    }

//    /**
//     * @return Tabela[] Returns an array of Tabela objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Tabela
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
