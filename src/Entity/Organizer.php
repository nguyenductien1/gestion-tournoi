<?php

namespace App\Entity;

use App\Repository\OrganizerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrganizerRepository::class)
 */
class Organizer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Team::class, mappedBy="organizer")
     */
    private $team;

    /**
     * @ORM\OneToMany(targetEntity=Table::class, mappedBy="org")
     */
    private $tb;

    /**
     * @ORM\ManyToOne(targetEntity=Tournament::class, inversedBy="org")
     */
    private $tourn;

    public function __construct()
    {
        $this->team = new ArrayCollection();
        $this->tb = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Team[]
     */
    public function getTeam(): Collection
    {
        return $this->team;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->team->contains($team)) {
            $this->team[] = $team;
            $team->setOrganizer($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->team->removeElement($team)) {
            // set the owning side to null (unless already changed)
            if ($team->getOrganizer() === $this) {
                $team->setOrganizer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Table[]
     */
    public function getTb(): Collection
    {
        return $this->tb;
    }

    public function addTb(Table $tb): self
    {
        if (!$this->tb->contains($tb)) {
            $this->tb[] = $tb;
            $tb->setOrg($this);
        }

        return $this;
    }

    public function removeTb(Table $tb): self
    {
        if ($this->tb->removeElement($tb)) {
            // set the owning side to null (unless already changed)
            if ($tb->getOrg() === $this) {
                $tb->setOrg(null);
            }
        }

        return $this;
    }

    public function getTourn(): ?Tournament
    {
        return $this->tourn;
    }

    public function setTourn(?Tournament $tourn): self
    {
        $this->tourn = $tourn;

        return $this;
    }
}
