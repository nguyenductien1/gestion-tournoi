<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlayerRepository::class)
 */
class Player
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $birthDay;

    /**
     * @ORM\OneToOne(targetEntity=PlayerLevel::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $level;

    /**
     * @ORM\ManyToOne(targetEntity=Team::class, inversedBy="members")
     */
    private $team;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getBirthDay(): ?string
    {
        return $this->birthDay;
    }

    public function setBirthDay(string $birthDay): self
    {
        $this->birthDay = $birthDay;

        return $this;
    }

    public function getLevel(): ?PlayerLevel
    {
        return $this->level;
    }

    public function setLevel(PlayerLevel $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;

        return $this;
    }
}
