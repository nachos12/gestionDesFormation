<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionRepository::class)]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $date_debut;

    #[ORM\Column(type: 'date')]
    private $date_fin;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\ManyToMany(targetEntity: Formateur::class, inversedBy: 'sessions')]
    private $formateur_id;

    #[ORM\ManyToOne(targetEntity: Promotion::class, inversedBy: 'sessions')]
    private $promotion_id;

    #[ORM\ManyToMany(targetEntity: Salle::class, inversedBy: 'sessions')]
    private $salle_id;

    public function __construct()
    {
        $this->formateur_id = new ArrayCollection();
        $this->salle_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Formateur>
     */
    public function getFormateurId(): Collection
    {
        return $this->formateur_id;
    }

    public function addFormateurId(Formateur $formateurId): self
    {
        if (!$this->formateur_id->contains($formateurId)) {
            $this->formateur_id[] = $formateurId;
        }

        return $this;
    }

    public function removeFormateurId(Formateur $formateurId): self
    {
        $this->formateur_id->removeElement($formateurId);

        return $this;
    }

    public function getPromotionId(): ?Promotion
    {
        return $this->promotion_id;
    }

    public function setPromotionId(?Promotion $promotion_id): self
    {
        $this->promotion_id = $promotion_id;

        return $this;
    }

    /**
     * @return Collection<int, Salle>
     */
    public function getSalleId(): Collection
    {
        return $this->salle_id;
    }

    public function addSalleId(Salle $salleId): self
    {
        if (!$this->salle_id->contains($salleId)) {
            $this->salle_id[] = $salleId;
        }

        return $this;
    }

    public function removeSalleId(Salle $salleId): self
    {
        $this->salle_id->removeElement($salleId);

        return $this;
    }
    public function __toString()
    {
        return $this->getNom();
    }
}
