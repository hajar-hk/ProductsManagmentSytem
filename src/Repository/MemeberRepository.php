<?php

namespace App\Repository;

use App\Entity\Memeber;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Memeber>
 *
 * @method Memeber|null find($id, $lockMode = null, $lockVersion = null)
 * @method Memeber|null findOneBy(array $criteria, array $orderBy = null)
 * @method Memeber[]    findAll()
 * @method Memeber[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MemeberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Memeber::class);
    }

    public function save(Memeber $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Memeber $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


}
