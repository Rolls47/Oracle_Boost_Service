<?php

namespace App\Repository;

use App\Entity\KeyDifficulty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KeyDifficulty|null find($id, $lockMode = null, $lockVersion = null)
 * @method KeyDifficulty|null findOneBy(array $criteria, array $orderBy = null)
 * @method KeyDifficulty[]    findAll()
 * @method KeyDifficulty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KeyDifficultyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KeyDifficulty::class);
    }

    // /**
    //  * @return KeyDifficulty[] Returns an array of KeyDifficulty objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?KeyDifficulty
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
