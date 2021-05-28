<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Skill.
 *
 * @ORM\Table(name="skill")
 * @ORM\Entity(repositoryClass="App\Repository\SkillRepository")
 */
class Skill
{
    /**
     * @var int
     *
     * @ORM\Column(name="skill_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="disable", type="boolean", options={"default"="0"})
     */
    private $disable;

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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="start_year", type="integer", nullable=true)
     */
    private $startYear;

    /**
     * @var int
     *
     * @ORM\Column(name="end_year", type="integer", nullable=true)
     */
    private $endYear;

    /**
     * @var string
     */
    private $duration;

    /**
     * @var int
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SkillType", inversedBy="skills")
     * @ORM\JoinColumn(name="skill_type_id", referencedColumnName="skill_type_id", nullable=false)
     */
    private $skillType;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Skill
    {
        $this->id = $id;

        return $this;
    }

    public function isDisable(): bool
    {
        return $this->disable;
    }

    public function setDisable(bool $disable): Skill
    {
        $this->disable = $disable;

        return $this;
    }

    public function getCreatedDate(): DateTime
    {
        return $this->createdDate;
    }

    public function setCreatedDate(DateTime $createdDate): Skill
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    public function getUpdatedDate(): DateTime
    {
        return $this->updatedDate;
    }

    public function setUpdatedDate(DateTime $updatedDate): Skill
    {
        $this->updatedDate = $updatedDate;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): Skill
    {
        $this->label = $label;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Skill
    {
        $this->title = $title;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Skill
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return ?string
     */
    public function getDuration(): ?string
    {
        if (null === $this->startYear) {
            return 'En cours';
        } else {
            if (null === $this->endYear) {
                $endYear = intval((new DateTime())->format('Y'));
            } else {
                $endYear = $this->endYear;
            }
            $duration = $endYear - $this->startYear;

            return strval($duration).' ans';
        }
    }

    public function setDuration(string $duration): Skill
    {
        $this->duration = $duration;

        return $this;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): Skill
    {
        $this->level = $level;

        return $this;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): Skill
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSkillType()
    {
        return $this->skillType;
    }

    /**
     * @param mixed $skillType
     *
     * @return Skill
     */
    public function setSkillType($skillType)
    {
        $this->skillType = $skillType;

        return $this;
    }
}
