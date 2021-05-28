<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Repository;

use App\Entity\Experience;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class ExperienceRepository.
 */
class ExperienceRepository extends ServiceEntityRepository
{
    /**
     * ExperienceRepository constructor.
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Experience::class);
    }

    public function getExperiencesWithCompany(): array
    {
        $qb = $this->createQueryBuilder('exp');

        $qb
            ->select('exp')
            ->innerJoin('exp.company', 'comp')
            ->addSelect('comp')
            ->orderBy('exp.startDate', 'DESC');

        return $qb
            ->getQuery()
            ->getResult();
    }
}
