<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $intitule;

    #[ORM\ManyToOne(targetEntity: Organisme::class, inversedBy: 'formations')]
    private $organisme_id;

    #[ORM\OneToMany(mappedBy: 'fromation_id', targetEntity: Promotion::class)]
    private $promotions;

    public function __construct()
    {
        $this->promotions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getOrganismeId(): ?Organisme
    {
        return $this->organisme_id;
    }

    public function setOrganismeId(?Organisme $organisme_id): self
    {
        $this->organisme_id = $organisme_id;

        return $this;
    }

    /**
     * @return Collection<int, Promotion>
     */
    public function getPromotions(): Collection
    {
        return $this->promotions;
    }

    public function addPromotion(Promotion $promotion): self
    {
        if (!$this->promotions->contains($promotion)) {
            $this->promotions[] = $promotion;
            $promotion->setFromationId($this);
        }

        return $this;
    }

    public function removePromotion(Promotion $promotion): self
    {
        if ($this->promotions->removeElement($promotion)) {
            // set the owning side to null (unless already changed)
            if ($promotion->getFromationId() === $this) {
                $promotion->setFromationId(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getIntitule();
    }
}
