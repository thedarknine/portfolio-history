<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SkillType.
 *
 * @ORM\Table(name="skill_type")
 * @ORM\Entity(repositoryClass="App\Repository\SkillTypeRepository")
 */
class SkillType
{
    /**
     * @var int
     *
     * @ORM\Column(name="skill_type_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_date", type="datetime", nullable=true, columnDefinition="DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP")
     */
    private $updatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=80)
     */
    private $icon;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var Skills[]
     *
     * @ORM\OneToMany(targetEntity="Skill", mappedBy="skillType")
     */
    private $skills;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): SkillType
    {
        $this->id = $id;

        return $this;
    }

    public function getCreatedDate(): \DateTime
    {
        return $this->createdDate;
    }

    public function setCreatedDate(\DateTime $createdDate): SkillType
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    public function getUpdatedDate(): \DateTime
    {
        return $this->updatedDate;
    }

    public function setUpdatedDate(\DateTime $updatedDate): SkillType
    {
        $this->updatedDate = $updatedDate;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): SkillType
    {
        $this->label = $label;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): SkillType
    {
        $this->name = $name;

        return $this;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): SkillType
    {
        $this->icon = $icon;

        return $this;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): SkillType
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return Skills[]
     */
    public function getSkills(): array
    {
        return $this->skills;
    }

    /**
     * @param Skills[] $skills
     */
    public function setSkills(array $skills): SkillType
    {
        $this->skills = $skills;

        return $this;
    }
}
