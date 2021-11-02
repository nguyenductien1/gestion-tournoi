<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventRepository::class)
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $eventName;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $startDate;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $endDate;

    /**
     * @ORM\OneToMany(targetEntity=Tournament::class, mappedBy="ev")
     */
    private $tourn;

    /**
     * @ORM\OneToOne(targetEntity=TypeGame::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeGame;

    public function __construct()
    {
        $this->tourn = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventName(): ?string
    {
        return $this->eventName;
    }

    public function setEventName(string $eventName): self
    {
        $this->eventName = $eventName;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    public function setStartDate(string $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    public function setEndDate(string $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return Collection|Tournament[]
     */
    public function getTourn(): Collection
    {
        return $this->tourn;
    }

    public function addTourn(Tournament $tourn): self
    {
        if (!$this->tourn->contains($tourn)) {
            $this->tourn[] = $tourn;
            $tourn->setEv($this);
        }

        return $this;
    }

    public function removeTourn(Tournament $tourn): self
    {
        if ($this->tourn->removeElement($tourn)) {
            // set the owning side to null (unless already changed)
            if ($tourn->getEv() === $this) {
                $tourn->setEv(null);
            }
        }

        return $this;
    }

    public function getTypeGame(): ?TypeGame
    {
        return $this->typeGame;
    }

    public function setTypeGame(TypeGame $typeGame): self
    {
        $this->typeGame = $typeGame;

        return $this;
    }
}
