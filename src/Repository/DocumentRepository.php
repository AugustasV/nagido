<?php

namespace App\Repository;

use App\Entity\Document;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Document|null find($id, $lockMode = null, $lockVersion = null)
 * @method Document|null findOneBy(array $criteria, array $orderBy = null)
 * @method Document[]    findAll()
 * @method Document[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Document::class);
    }

    /**
     * @param $value
     * @param $user
     * @return mixed
     */
    public function search($value, $user)
    {
        return $this->createQueryBuilder("document")
            ->andWhere('document.documentName LIKE :value')
            ->andWhere('document.user = :user')
            ->setParameter('value', "%".$value."%")
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function reminderDates($id)
    {
        return $this->createQueryBuilder("document")
            ->andWhere('document.documentReminder IS NOT NULL AND document.user = :user')
            ->setParameter('user', $id)
            ->getQuery()
            ->getResult()
            ;
    }

    public function categoryFiles($category, $user)
    {
        return $this->createQueryBuilder("document")
            ->andWhere('document.category = :category AND document.user = :user')
            ->setParameter('user', $user)
            ->setParameter('category', $category)
            ->getQuery()
            ->getResult()
            ;
    }

    public function tagFiles($tag, $user)
    {
        return $this->createQueryBuilder("document")
            ->leftJoin('document.tag', 'c')
            ->andWhere('c.id = :tag')
            ->setParameter('tag', $tag)
            ->andWhere('document.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult()
            ;
    }

//    /**
//     * @return Document[] Returns an array of Document objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Document
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
