<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Entity;

use Carbon\Carbon;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="experience")
 * @ORM\Entity(repositoryClass="App\Repository\ExperienceRepository")
 * */
class Experience
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="experience_id", type="integer")
     */
    public $id;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdDate;

    /**
     * @var DateTime
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
     * @ORM\Column(name="start_date", type="date")
     */
    private $startDate;

    /**
     * @ORM\Column(name="end_date", type="date", nullable=true)
     */
    private $endDate;

    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="subtitle", type="string", length=255)
     */
    private $subtitle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="company_id", nullable=false)
     */
    private $company;

    /**
     * @var ArrayCollection Skill
     *                      Owning Side
     *
     * @ORM\ManyToMany(targetEntity="Skill")
     * @ORM\JoinTable(name="experience_skill",
     *   joinColumns={@ORM\JoinColumn(name="experience_id", referencedColumnName="experience_id")},
     *   inverseJoinColumns={@ORM\JoinColumn(name="skill_id", referencedColumnName="skill_id")}
     * )
     */
    private $skills;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return Experience
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getCreatedDate(): DateTime
    {
        return $this->createdDate;
    }

    public function setCreatedDate(DateTime $createdDate): Experience
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    public function getUpdatedDate(): DateTime
    {
        return $this->updatedDate;
    }

    public function setUpdatedDate(DateTime $updatedDate): Experience
    {
        $this->updatedDate = $updatedDate;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): Experience
    {
        $this->label = $label;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Experience
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     *
     * @return Experience
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     *
     * @return Experience
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getDuration()
    {
        $endDate = (null == $this->endDate) ? Carbon::now() : new Carbon($this->endDate);
        $startDate = new Carbon($this->startDate);

        $diff = $endDate->diffInMonths($startDate);

        return ['nbYears' => floor($diff / 12), 'nbMonths' => $diff % 12];
    }

    public function getSubtitle(): string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): Experience
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Experience
    {
        $this->description = $description;

        return $this;
    }

    public function getCompany(): Company
    {
        return $this->company;
    }

    public function setCompany(Company $company): Experience
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Add Skill.
     */
    public function addSkill(Skill $skill)
    {
        if (!$this->skills->contains($skill)) {
            $this->skills->add($skill);
        }
    }

    public function setSkills($items)
    {
        if ($items instanceof ArrayCollection || is_array($items)) {
            foreach ($items as $item) {
                $this->addSkill($item);
            }
        } elseif ($items instanceof Skill) {
            $this->addSkill($items);
        } else {
            throw new Exception("$items must be an instance of ArrayCollection");
        }
    }

    /**
     * Get ArrayCollection.
     *
     * @return ArrayCollection $skills
     */
    public function getSkills()
    {
        return $this->skills;
    }
}
