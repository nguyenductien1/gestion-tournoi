<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TeamRepository::class)
 */
class Team
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
    private $teamName;

    /**
     * @ORM\OneToMany(targetEntity=Player::class, mappedBy="team")
     */
    private $members;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $teamLevel;

    /**
     * @ORM\ManyToOne(targetEntity=Club::class, inversedBy="team")
     */
    private $club;

    /**
     * @ORM\ManyToOne(targetEntity=Organizer::class, inversedBy="team")
     * @ORM\JoinColumn(nullable=false)
     */
    private $organizer;

    /**
     * @ORM\ManyToOne(targetEntity=Table::class, inversedBy="team")
     */
    private $tb;

    /**
     * @ORM\ManyToOne(targetEntity=Table::class, inversedBy="team")
     */

    public function __construct()
    {
        $this->members = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeamName(): ?string
    {
        return $this->teamName;
    }

    public function setTeamName(string $teamName): self
    {
        $this->teamName = $teamName;

        return $this;
    }

    /**
     * @return Collection|Player[]
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(Player $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->setTeam($this);
        }

        return $this;
    }

    public function removeMember(Player $member): self
    {
        if ($this->members->removeElement($member)) {
            // set the owning side to null (unless already changed)
            if ($member->getTeam() === $this) {
                $member->setTeam(null);
            }
        }

        return $this;
    }

    public function getTeamLevel(): ?string
    {
        return $this->teamLevel;
    }

    public function setTeamLevel(?string $teamLevel): self
    {
        $this->teamLevel = $teamLevel;

        return $this;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): self
    {
        $this->club = $club;

        return $this;
    }

    public function getOrganizer(): ?Organizer
    {
        return $this->organizer;
    }

    public function setOrganizer(?Organizer $organizer): self
    {
        $this->organizer = $organizer;

        return $this;
    }

    public function getTb(): ?Table
    {
        return $this->tb;
    }

    public function setTb(?Table $tb): self
    {
        $this->tb = $tb;

        return $this;
    }


}
