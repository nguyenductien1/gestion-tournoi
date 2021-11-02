<?php

namespace App\Entity;

use App\Repository\TableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TableRepository::class)
 * @ORM\Table(name="`table`")
 */
class Table
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Team::class, mappedBy="tb")
     */
    private $team;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    private $win;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    private $loose;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    private $setWin;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    private $setLose;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    private $score;

    /**
     * @ORM\ManyToOne(targetEntity=Organizer::class, inversedBy="tb")
     */
    private $org;

    public function __construct()
    {
        $this->team = new ArrayCollection();
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
            $team->setTb($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->team->removeElement($team)) {
            // set the owning side to null (unless already changed)
            if ($team->getTb() === $this) {
                $team->setTb(null);
            }
        }

        return $this;
    }

    public function getWin(): ?string
    {
        return $this->win;
    }

    public function setWin(?string $win): self
    {
        $this->win = $win;

        return $this;
    }

    public function getLoose(): ?string
    {
        return $this->loose;
    }

    public function setLoose(?string $loose): self
    {
        $this->loose = $loose;

        return $this;
    }

    public function getSetWin(): ?string
    {
        return $this->setWin;
    }

    public function setSetWin(?string $setWin): self
    {
        $this->setWin = $setWin;

        return $this;
    }

    public function getSetLose(): ?string
    {
        return $this->setLose;
    }

    public function setSetLose(?string $setLose): self
    {
        $this->setLose = $setLose;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(?string $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getOrg(): ?Organizer
    {
        return $this->org;
    }

    public function setOrg(?Organizer $org): self
    {
        $this->org = $org;

        return $this;
    }
}
