<?php

namespace App\Entity;

use App\Repository\TournamentRepository;
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
}
