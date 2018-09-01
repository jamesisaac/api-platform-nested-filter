<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This is a dummy entity. Remove it!
 *
 * @ApiResource
 * @ApiFilter(DateFilter::class, properties={"sentAt"})
 * @ApiFilter(SearchFilter::class, properties={"recipientName"})
 * @ORM\Entity
 */
class Greeting
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
     * @var string A nice person
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $recipientName = '';

    /**
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="sentGreetings")
     * @ORM\JoinColumn(name="sender_id")
     */
    public $sender;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    public $sentAt;

    public function getId(): int
    {
        return $this->id;
    }
}
