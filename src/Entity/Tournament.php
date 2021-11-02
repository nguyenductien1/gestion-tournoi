<?php

namespace App\Entity;

use App\Repository\TournamentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TournamentRepository::class)
 */
class Tournament
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Event::class, inversedBy="tourn")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ev;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $tournamentName;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Organizer::class, mappedBy="tourn")
     */
    private $org;

    public function __construct()
    {
        $this->org = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEv(): ?Event
    {
        return $this->ev;
    }

    public function setEv(?Event $ev): self
    {
        $this->ev = $ev;

        return $this;
    }

    public function getTournamentName(): ?string
    {
        return $this->tournamentName;
    }

    public function setTournamentName(string $tournamentName): self
    {
        $this->tournamentName = $tournamentName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Organizer[]
     */
    public function getOrg(): Collection
    {
        return $this->org;
    }

    public function addOrg(Organizer $org): self
    {
        if (!$this->org->contains($org)) {
            $this->org[] = $org;
            $org->setTourn($this);
        }

        return $this;
    }

    public function removeOrg(Organizer $org): self
    {
        if ($this->org->removeElement($org)) {
            // set the owning side to null (unless already changed)
            if ($org->getTourn() === $this) {
                $org->setTourn(null);
            }
        }

        return $this;
    }
}
