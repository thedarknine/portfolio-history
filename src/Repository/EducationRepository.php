<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Repository;

use App\Entity\Education;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class EducationRepository.
 */
class EducationRepository extends ServiceEntityRepository
{
    /**
     * ExperienceRepository constructor.
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Education::class);
    }

    /**
     * @return int|mixed|string
     */
    public function getEducationsWithSchool()
    {
        $qb = $this->createQueryBuilder('educ');

        $qb
            ->select('educ')
            ->innerJoin('educ.school', 'sch')
            ->addSelect('sch')
            ->orderBy('educ.year', 'DESC');

        // Enfin, on retourne le résultat
        return $qb
            ->getQuery()
            ->getResult();
    }
}
