<?php
// src/Entity/Person.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity
 */
class Person
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column
     */
    public $name = '';

    /**
     * @ApiSubresource
     * @ORM\OneToMany(targetEntity="Greeting", mappedBy="sender")
     * @ApiFilter(DateFilter::class, properties={"sentGreetings.sentAt"})
     */
    public $sentGreetings;

    /**
     * @ORM\OneToMany(targetEntity="RelatedDummy", mappedBy="person")
     */
    public $relatedDummies;

    public function getId(): int
    {
        return $this->id;
    }
}