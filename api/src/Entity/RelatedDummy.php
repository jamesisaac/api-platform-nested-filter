<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/** *
 * @ApiResource
 * @ORM\Entity
 */
class RelatedDummy
{
    /**
     * @var int The entity Id
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column
     */
    public $dummyData = '';

    /**
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="relatedDummies")
     * @ORM\JoinColumn(name="person_id")
     */
    public $person;

    public function getId(): int
    {
        return $this->id;
    }
}
