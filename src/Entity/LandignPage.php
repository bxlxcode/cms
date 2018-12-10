<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;

use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LandignPageRepository")
 */
class LandignPage
{

    use Common\IdTrait;
    use ORMBehaviors\Translatable\Translatable;

    /**
     * @Assert\Valid
     */
    protected $translations;

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
     * @ORM\ManyToMany(targetEntity="App\Entity\Landing", inversedBy="landignPages")
     */
    private $landingZone;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Language", inversedBy="landignPages")
     */
    private $language;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\HeaderLandingPage", mappedBy="landingPage", cascade={"persist", "remove"})
     */
    private $headerLandingPage;

    public function __construct()
    {
        $this->landingZone = new ArrayCollection();
        $this->language = new ArrayCollection();
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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|Landing[]
     */
    public function getLandingZone(): Collection
    {
        return $this->landingZone;
    }

    public function addLandingZone(Landing $landingZone): self
    {
        if (!$this->landingZone->contains($landingZone)) {
            $this->landingZone[] = $landingZone;
        }

        return $this;
    }

    public function removeLandingZone(Landing $landingZone): self
    {
        if ($this->landingZone->contains($landingZone)) {
            $this->landingZone->removeElement($landingZone);
        }

        return $this;
    }

    /**
     * @return Collection|Language[]
     */
    public function getLanguage(): Collection
    {
        return $this->language;
    }

    public function addLanguage(Language $language): self
    {
        if (!$this->language->contains($language)) {
            $this->language[] = $language;
        }

        return $this;
    }

    public function removeLanguage(Language $language): self
    {
        if ($this->language->contains($language)) {
            $this->language->removeElement($language);
        }

        return $this;
    }

    public function getHeaderLandingPage(): ?HeaderLandingPage
    {
        return $this->headerLandingPage;
    }

    public function setHeaderLandingPage(HeaderLandingPage $headerLandingPage): self
    {
        $this->headerLandingPage = $headerLandingPage;

        // set the owning side of the relation if necessary
        if ($this !== $headerLandingPage->getLandingPage()) {
            $headerLandingPage->setLandingPage($this);
        }

        return $this;
    }
}
