<?php

namespace App\Repository;

use App\Entity\Legende;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Legende>
 *
 * @method Legende|null find($id, $lockMode = null, $lockVersion = null)
 * @method Legende|null findOneBy(array $criteria, array $orderBy = null)
 * @method Legende[]    findAll()
 * @method Legende[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LegendeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Legende::class);
    }

    public function save(Legende $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Legende $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByCategory(string $categorie)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.categorie = :categorie')
            ->setParameter('categorie', $categorie)
            ->orderBy('l.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

}
