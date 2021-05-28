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
 * CreationType.
 *
 * @ORM\Table(name="creation_type")
 * @ORM\Entity(repositoryClass="App\Repository\CreationTypeRepository")
 */
class CreationType
{
    /**
     * @var int
     *
     * @ORM\Column(name="creation_type_id", type="integer")
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
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): CreationType
    {
        $this->id = $id;

        return $this;
    }

    public function getCreatedDate(): \DateTime
    {
        return $this->createdDate;
    }

    public function setCreatedDate(\DateTime $createdDate): CreationType
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    public function getUpdatedDate(): \DateTime
    {
        return $this->updatedDate;
    }

    public function setUpdatedDate(\DateTime $updatedDate): CreationType
    {
        $this->updatedDate = $updatedDate;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): CreationType
    {
        $this->label = $label;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): CreationType
    {
        $this->name = $name;

        return $this;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): CreationType
    {
        $this->position = $position;

        return $this;
    }
}
