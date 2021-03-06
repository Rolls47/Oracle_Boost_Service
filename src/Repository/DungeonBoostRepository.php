<?php

namespace App\Repository;

use App\Entity\DungeonBoost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DungeonBoost|null find($id, $lockMode = null, $lockVersion = null)
 * @method DungeonBoost|null findOneBy(array $criteria, array $orderBy = null)
 * @method DungeonBoost[]    findAll()
 * @method DungeonBoost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DungeonBoostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DungeonBoost::class);
    }

    public const MAXRESULT = 1;

    /**
     * @param $userId
     * @return DungeonBoost[] Returns an array of DungeonBoost objects
     */

    public function sumBoostByUser($userId): array
    {
        return $this->createQueryBuilder('db')
            ->select('SUM(db.amount)')
            ->innerJoin('App:Character', 'c')
            ->innerJoin('App:User', 'u')
            ->andWhere('db.tank = c.id')
            ->orWhere('db.heal = c.id')
            ->orWhere('db.dpsOne = c.id')
            ->orWhere('db.dpsTwo = c.id')
            ->andWhere('c.user = :userId')
            ->setParameter('userId', $userId)
            ->groupBy('u.pseudo')
            ->setMaxResults(self::MAXRESULT)
            ->getQuery()
            ->getResult();
    }
    public function countBoostByUser($userId): array
    {
        return $this->createQueryBuilder('db')
            ->select('COUNT(db.amount)')
            ->innerJoin('App:Character', 'c')
            ->innerJoin('App:User', 'u')
            ->andWhere('db.tank = c.id')
            ->orWhere('db.heal = c.id')
            ->orWhere('db.dpsOne = c.id')
            ->orWhere('db.dpsTwo = c.id')
            ->andWhere('c.user = :userId')
            ->setParameter('userId', $userId)
            ->groupBy('u.pseudo')
            ->setMaxResults(self::MAXRESULT)
            ->getQuery()
            ->getResult();
    }
}
