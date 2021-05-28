<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Repository;

use App\Entity\Skill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class SkillRepository.
 */
class SkillRepository extends ServiceEntityRepository
{
    /**
     * ExperienceRepository constructor.
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Skill::class);
    }

    public function getSkillsByType(): array
    {
        $qb = $this->createQueryBuilder('skl');

        $qb
            ->select('skl')
            ->where('skl.disable = 0')
            ->innerJoin('skl.skillType', 'type')
            ->addSelect('type')
            ->orderBy('skl.position', 'ASC');

        $result = $qb
            ->getQuery()
            ->getResult();

        $listing = [];
        foreach ($result as $skill) {
            $listing[$skill->getSkillType()->getLabel()][] = $skill;
        }

        return $listing;
    }
}
