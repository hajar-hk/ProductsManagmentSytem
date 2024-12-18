<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function save(Product $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Product $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findProductsOfRayon(int $idRayon): array
{
    // Rédaction de la requête DQL
    $dql = '
        SELECT p
        FROM App\Entity\Product p
        JOIN p.category c
        JOIN c.rayon r
        WHERE r.id = :idRayon
    ';

    

    // Exécution de la requête
    return $this->_em->createQuery($dql) // $this->_em représente l'EntityManager
        ->setParameter('idRayon', $idRayon) // Définir la valeur du paramètre :idRayon
        ->getResult(); // Retourne un tableau d'objets Product
}

}
