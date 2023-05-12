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

        $sql = 'SELECT id, name, description, image FROM work';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        $works = $resultSet->fetchAll();

        $sql = 'SELECT * FROM likes WHERE user_id = :user_id';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery(['user_id' => $userId]);
        $likes = $resultSet->fetchAll();

        foreach ($works as $key => $work) {
            foreach ($likes as $like) {
                if ($work['id'] === $like['work_id']) {
                    $works[$key]['likes_bool'] = $like['likes_bool'];
                    unset($works[$key]['id']);
                }
            }
        }
        foreach ($works as $key => $work) {
            if (!isset($work['likes_bool'])) {
                $works[$key]['likes_bool'] = 0;
            }
        }

        return $works;
    }
}
