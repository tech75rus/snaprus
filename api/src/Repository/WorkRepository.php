<?php

namespace App\Repository;

use App\Entity\Work;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Work>
 *
 * @method Work|null find($id, $lockMode = null, $lockVersion = null)
 * @method Work|null findOneBy(array $criteria, array $orderBy = null)
 * @method Work[]    findAll()
 * @method Work[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Work::class);
    }

    public function save(Work $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Work $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findWorksLikes(int $userId): array|bool
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT w.*, l.likes_bool FROM work AS w
            INNER JOIN likes l on w.id = l.work_id
            INNER JOIN user u on l.user_id = u.id
            WHERE u.id = :user_id ORDER BY w.id';

        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery(['user_id' => $userId]);

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAll();
    }

//    public function findWorksLikes(int $userId): ?array
//    {
//        $entityManager = $this->getEntityManager();
//
//        $query = $entityManager->createQuery(
//            'SELECT w, l
//            FROM App\Entity\Likes l
//            INNER JOIN l.user u
//            INNER JOIN l.work w
//            WHERE u.id = :id'
//        )->setParameter('id', $userId);
//
////        return $query->getResult();
//        return $query->getArrayResult();
//    }
}
