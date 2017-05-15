<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class JobRepository extends EntityRepository
{
    public function findAllBySearchTerm($searchTerm)
    {
        $qb = $this->createQueryBuilder('j');

        if ($searchTerm) {
            $qb
                ->where('j.title LIKE :searchTerm')
                ->orWhere('j.location LIKE :searchTerm')
                ->orWhere('j.keyword LIKE :searchTerm')
                ->setParameter('searchTerm', '%'.$searchTerm.'%')
            ;
        }

        return $qb->getQuery()->getResult();
    }
}
