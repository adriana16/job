<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CvRepository extends EntityRepository
{
    public function findAllBySkills($skills)
    {
        $qb = $this->createQueryBuilder('cv')
            ->addSelect("MATCH_AGAINST (cv.work, cv.experience, :searchTerm 'IN NATURAL MODE') as score")
            ->where('MATCH_AGAINST(cv.work, cv.experience, :searchTerm) > 0.001')
            ->setParameter('searchTerm', $skills)
            ->orderBy('score', 'DESC')
        ;

        return $qb->getQuery()->getResult();
    }
}
