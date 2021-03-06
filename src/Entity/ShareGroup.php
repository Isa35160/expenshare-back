<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShareGroup
 *
 * @ORM\Table(name="share_group", uniqueConstraints={@ORM\UniqueConstraint(name="slug_UNIQUE", columns={"slug"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */

class ShareGroup
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="closed", type="boolean", nullable=false)
     */
    private $closed = '0';


    /**
     * @var
     * @ORM\OneToMany(targetEntity="Person", mappedBy="shareGroup")
     */

    private $person;



    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param mixed $person
     * @return ShareGroup
     */
    public function setPerson($person)
    {
        $this->person = $person;
        return $this;
    }


    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getClosed(): ?bool
    {
        return $this->closed;
    }

    public function setClosed(bool $closed): self
    {
        $this->closed = $closed;

        return $this;
    }
    public function __toString()
    {
        return $this->getSlug();
    }

}
