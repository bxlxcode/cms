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
     * @ORM\OneToMany(targetEntity="App\Entity\OffreLandingPage", mappedBy="landingPage")
     */
    private $offreLandingPages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HeaderLandingPage", mappedBy="landingPage")
     */
    private $headerLandingPages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\IntrdocutionLandingPage", mappedBy="landingPage")
     */
    private $intrdocutionLandingPages;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublish;

    public function __construct()
    {
        $this->landingZone = new ArrayCollection();
        $this->language = new ArrayCollection();
        $this->offreLandingPages = new ArrayCollection();
        $this->headerLandingPages = new ArrayCollection();
        $this->intrdocutionLandingPages = new ArrayCollection();
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


    /**
     * @return Collection|OffreLandingPage[]
     */
    public function getOffreLandingPages(): Collection
    {
        return $this->offreLandingPages;
    }

    public function addOffreLandingPage(OffreLandingPage $offreLandingPage): self
    {
        if (!$this->offreLandingPages->contains($offreLandingPage)) {
            $this->offreLandingPages[] = $offreLandingPage;
            $offreLandingPage->setLandingPage($this);
        }

        return $this;
    }

    public function removeOffreLandingPage(OffreLandingPage $offreLandingPage): self
    {
        if ($this->offreLandingPages->contains($offreLandingPage)) {
            $this->offreLandingPages->removeElement($offreLandingPage);
            // set the owning side to null (unless already changed)
            if ($offreLandingPage->getLandingPage() === $this) {
                $offreLandingPage->setLandingPage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|HeaderLandingPage[]
     */
    public function getHeaderLandingPages(): Collection
    {
        return $this->headerLandingPages;
    }

    public function addHeaderLandingPage(HeaderLandingPage $headerLandingPage): self
    {
        if (!$this->headerLandingPages->contains($headerLandingPage)) {
            $this->headerLandingPages[] = $headerLandingPage;
            $headerLandingPage->setLandingPage($this);
        }

        return $this;
    }

    public function removeHeaderLandingPage(HeaderLandingPage $headerLandingPage): self
    {
        if ($this->headerLandingPages->contains($headerLandingPage)) {
            $this->headerLandingPages->removeElement($headerLandingPage);
            // set the owning side to null (unless already changed)
            if ($headerLandingPage->getLandingPage() === $this) {
                $headerLandingPage->setLandingPage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|IntrdocutionLandingPage[]
     */
    public function getIntrdocutionLandingPages(): Collection
    {
        return $this->intrdocutionLandingPages;
    }

    public function addIntrdocutionLandingPage(IntrdocutionLandingPage $intrdocutionLandingPage): self
    {
        if (!$this->intrdocutionLandingPages->contains($intrdocutionLandingPage)) {
            $this->intrdocutionLandingPages[] = $intrdocutionLandingPage;
            $intrdocutionLandingPage->setLandingPage($this);
        }

        return $this;
    }

    public function removeIntrdocutionLandingPage(IntrdocutionLandingPage $intrdocutionLandingPage): self
    {
        if ($this->intrdocutionLandingPages->contains($intrdocutionLandingPage)) {
            $this->intrdocutionLandingPages->removeElement($intrdocutionLandingPage);
            // set the owning side to null (unless already changed)
            if ($intrdocutionLandingPage->getLandingPage() === $this) {
                $intrdocutionLandingPage->setLandingPage(null);
            }
        }

        return $this;
    }

    public function getIsPublish(): ?bool
    {
        return $this->isPublish;
    }

    public function setIsPublish(bool $isPublish): self
    {
        $this->isPublish = $isPublish;

        return $this;
    }
}
