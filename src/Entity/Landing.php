<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LandingRepository")
 */
class Landing
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\LandignPage", mappedBy="landingZone")
     */
    private $landignPages;

    public function __construct()
    {
        $this->landignPages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }


    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|LandignPage[]
     */
    public function getLandignPages(): Collection
    {
        return $this->landignPages;
    }

    public function addLandignPage(LandignPage $landignPage): self
    {
        if (!$this->landignPages->contains($landignPage)) {
            $this->landignPages[] = $landignPage;
            $landignPage->addLandingZone($this);
        }

        return $this;
    }

    public function removeLandignPage(LandignPage $landignPage): self
    {
        if ($this->landignPages->contains($landignPage)) {
            $this->landignPages->removeElement($landignPage);
            $landignPage->removeLandingZone($this);
        }

        return $this;
    }
}
