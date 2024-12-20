<?php

namespace App\Repository;

use App\Entity\Rayon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Rayon>
 *
 * @method Rayon|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rayon|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rayon[]    findAll()
 * @method Rayon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RayonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rayon::class);
    }

    public function save(Rayon $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Rayon $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
